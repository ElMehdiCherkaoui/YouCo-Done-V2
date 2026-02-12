@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-10 animate-slide-in">
                <div class="flex items-center text-sm text-gray-600 mb-4">
                    <a href="{{ route('dashboard') }}" class="hover:text-orange-600">Dashboard</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-900 font-medium">My Restaurants</span>


                </div>

            </div>
            <!-- Header -->
            <div class="flex items-center justify-between mb-10 animate-slide-in">

                <div>
                    <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">My Restaurants</h1>
                    <p class="text-xl text-gray-600">Manage and update your restaurant listings</p>
                </div>
                <a href="{{ route('restaurateur.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New Restaurant
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div
                    class="mb-8 bg-green-50 border border-green-200 rounded-xl p-4 flex items-center space-x-3 animate-slide-in">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Restaurants List -->

            <div class="space-y-6">

                @forelse ($restaurants as $index => $restaurant)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition duration-300 animate-slide-in"
                        style="animation-delay: {{ $index * 0.05 }}s;">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-6">

                            <!-- Image -->
                            <div class="md:col-span-2">
                                <div class="relative h-64 md:h-full bg-gray-200">
                                    <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="md:col-span-3 p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex-1">
                                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                                {{ $restaurant->name }}
                                            </h3>

                                            <div class="flex items-center space-x-4 text-sm text-gray-600">
                                                <span class="inline-flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    </svg>
                                                    {{ $restaurant->city }}
                                                </span>

                                                <span>{{ $restaurant->cuisine_type }}</span>
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        @if ($restaurant->isActive)
                                            <span
                                                class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                                Inactive
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Details -->
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                                        <div class="bg-gray-50 rounded-lg p-3 text-center">
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $restaurant->capacity }}
                                            </p>
                                            <p class="text-xs text-gray-600">Capacity</p>
                                        </div>

                                        <div class="bg-gray-50 rounded-lg p-3 text-center">
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $restaurant->opening_hours }}
                                            </p>
                                            <p class="text-xs text-gray-600">Opening Hours</p>
                                        </div>

                                        <div class="bg-gray-50 rounded-lg p-3 text-center">
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $restaurant->created_at->format('d M Y') }}
                                            </p>
                                            <p class="text-xs text-gray-600">Created</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex items-center space-x-3 pt-4 border-t border-gray-100">

                                    <a href="{{ route('restaurateur.restaurant.show', $restaurant->id) }}"
                                        class="flex-1 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium text-center transition">
                                        View
                                    </a>

                                    <a href="{{ route('restaurateur.edit', $restaurant) }}"
                                        class="flex-1 px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-medium text-center hover:shadow-lg transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('restaurants.destroy', $restaurant) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this restaurant?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg font-medium transition">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <!-- Empty State -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
                        <h3 class="text-3xl font-bold text-gray-900 mb-3">No Restaurants Yet</h3>
                        <p class="text-gray-600 mb-6">
                            Start by adding your first restaurant.
                        </p>
                        <a href="{{ route('restaurateur.create') }}"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl font-bold hover:shadow-xl transition">
                            Add Restaurant
                        </a>
                    </div>
                @endforelse

            </div>
            <div class="mt-10 flex justify-center">
                <div class="rounded-xl border border-gray-200 bg-white px-4 py-2 shadow-sm">
                    {{ $restaurants->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
