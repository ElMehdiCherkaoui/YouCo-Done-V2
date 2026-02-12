@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Restaurant Management</h1>
                <p class="text-xl text-gray-600">Manage all restaurants on the platform</p>
            </div>

            <!-- Filters & Search -->


            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.15s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Total Restaurants</p>
                            <p class="text-3xl font-display font-bold text-gray-900">{{ $totalRestaurants }}</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Active</p>
                            <p class="text-3xl font-display font-bold text-green-600">{{ $activeRestaurants }}</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Restaurants List -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mt-10">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">City</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Cuisine</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Capacity</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Opening Hours</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Created</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($restaurants as $restaurant)
                    <tr class="hover:bg-gray-50">

                        <!-- Image -->
                        <td class="px-6 py-4">
                            <img
                                src="{{ asset('storage/' . $restaurant->image) }}"
                                alt="{{ $restaurant->name }}"
                                class="w-16 h-12 object-cover rounded-lg"
                            >
                        </td>

                        <!-- Name -->
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $restaurant->name }}
                        </td>

                        <!-- City -->
                        <td class="px-6 py-4 text-gray-700">
                            {{ $restaurant->city }}
                        </td>

                        <!-- Cuisine -->
                        <td class="px-6 py-4 text-gray-700">
                            {{ $restaurant->cuisine_type }}
                        </td>

                        <!-- Capacity -->
                        <td class="px-6 py-4 text-gray-700">
                            {{ $restaurant->capacity }}
                        </td>

                        <!-- Opening hours -->
                        <td class="px-6 py-4 text-gray-700">
                            {{ $restaurant->opening_hours }}
                        </td>

                        <!-- Status -->
                        <td class="px-6 py-4">
                            @if ($restaurant->isActive)
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <!-- Created -->
                        <td class="px-6 py-4 text-gray-600 text-sm">
                            {{ $restaurant->created_at->format('d M Y') }}
                        </td>

                        <!-- Actions -->
                        <td class="flex content-between px-6 py-4 text-center space-x-2">

                            @if ($restaurant->isActive)
                                <button
                                    class="px-3 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded-md text-sm font-medium">
                                    Deactivate
                                </button>
                            @else
                                <button
                                    class="px-3 py-1 bg-green-100 hover:bg-green-200 text-green-700 rounded-md text-sm font-medium">
                                    Activate
                                </button>
                            @endif

                            <form
                                action="{{ route('restaurants.destroy', $restaurant) }}"
                                method="POST"
                                class="inline"
                                onsubmit="return confirm('Are you sure you want to delete this restaurant?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 rounded-md text-sm font-medium"
                                >
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-10 text-center text-gray-500">
                            No restaurants found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>
                    <div class="mt-10 flex justify-center">
                <div class="rounded-xl border border-gray-200 bg-white px-4 py-2 shadow-sm">
                    {{ $restaurants->links() }}
                </div>
            </div>
    </div>
</div>



        </div>
    </div>
@endsection
