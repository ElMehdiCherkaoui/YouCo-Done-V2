@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-10">
                <h1 class="text-5xl font-bold text-gray-900 mb-3">Discover Restaurants</h1>
                <p class="text-xl text-gray-600">Find your perfect dining experience</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-10">
                <form class="space-y-6" method="GET" action="{{ route('client.restaurant') }}">
                    <input value="{{ request('search') }}" name="search" type="text"
                        placeholder="Search by name, cuisine, or location..."
                        class="w-full pl-4 pr-4 py-4 border border-gray-300 rounded-xl text-lg">

                    <button type="submit" class="px-8 py-3 bg-orange-500 text-white rounded-lg font-semibold">
                        Apply Filters
                    </button>
                </form>
            </div>

            <div class="mb-6 flex items-center justify-between">
                <p class="text-gray-600">Showing {{ $totalRestaurants }} restaurants</p>
            </div>

            <div id="restaurants-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($restaurants as $restaurant)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border">
                        <div class="relative h-56 bg-gradient-to-br from-orange-400 to-pink-500">
                            <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}"
                                class="w-full h-full object-cover">
                            <div class="absolute top-4 left-4">
                                @if ($restaurant->is_favorite)
                                    <form action="{{ route('restaurant.favorite.destroy', $restaurant->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-white rounded-full p-2 shadow">
                                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 18.343l-6.828-6.829a4 4 0 010-5.656z" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('restaurant.favorite.store', $restaurant->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-white rounded-full p-2 shadow">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3.172 5.172a4 4 0 015.656 0L12 8.343l3.172-3.171a4 4 0 115.656 5.656L12 21.343l-8.828-8.829a4 4 0 010-5.656z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-1">{{ $restaurant->name }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ $restaurant->cuisine_type }}</p>
                            <p class="text-gray-600 text-sm mb-4">
                                {{ $restaurant->description }}
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-yellow-500 font-semibold">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < floor($restaurant->rating ?? 4))
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </span>
                                <a href="{{ route('client.restaurant.show', $restaurant->id) }}"
                                    class="text-orange-600 font-semibold text-sm">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="mt-10 flex justify-center">
                <div class="rounded-xl border border-gray-200 bg-white px-4 py-2 shadow-sm">
                    {{ $restaurants->links() }}
                </div>
            </div>



        </div>
    </div>
@endsection
