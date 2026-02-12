@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Lora:wght@400;500;600&display=swap');

        * {
            font-family: 'Lora', serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Playfair Display', serif;
        }

        .animate-slide-in {
            animation: slideIn 0.6s ease forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-delay-1 {
            animation-delay: 0.1s;
        }

        .animate-delay-2 {
            animation-delay: 0.2s;
        }

        .animate-delay-3 {
            animation-delay: 0.3s;
        }

        .text-accent {
            color: #d4a574;
        }

        .hover-scale {
            transition: all 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.02);
        }

        .sticky-booking {
            position: sticky;
            top: 100px;
        }

        @media (max-width: 1024px) {
            .sticky-booking {
                position: static;
                top: auto;
            }
        }

        .menu-item-card {
            transition: all 0.3s ease;
        }

        .menu-item-card:hover {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .favorite-btn {
            transition: all 0.3s ease;
        }

        .favorite-btn.is-favorite {
            color: #ef4444;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white">
        <!-- Hero Image Section -->
        <div class="relative h-96 md:h-[480px] bg-gradient-to-br from-amber-400 via-orange-500 to-red-500 overflow-hidden">

            <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>


            <div class="absolute top-6 left-6 z-20">
                <a href="{{ route('client.restaurant') }}"
                    class="inline-flex items-center px-4 py-2 bg-white/90 backdrop-blur-md rounded-lg text-gray-900 font-semibold hover:bg-white transition-all duration-200 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Restaurants
                </a>
            </div>

            <!-- Restaurant Info Overlay -->
            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-10 text-white">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-start justify-between">
                        <div class="flex-1 pr-4">

                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight">
                                {{ $restaurant->name }}
                            </h1>


                            <div class="flex flex-wrap items-center gap-3 md:gap-4 text-sm md:text-base">

                                @if ($restaurant->city)
                                    <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full">
                                        📍 {{ $restaurant->city }}
                                    </span>
                                @endif


                                @if ($restaurant->cuisine_type)
                                    <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full">
                                        🍽️ {{ $restaurant->cuisine_type }}
                                    </span>
                                @endif


                                @if ($restaurant->capacity)
                                    <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full">
                                        👥 {{ $restaurant->capacity }} seats
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center space-x-3">

                            <button
                                class="p-3 bg-white/20 backdrop-blur-sm hover:bg-white/30 rounded-full transition duration-200"
                                title="Share">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                            </button>


                            <form action="{{ route('restaurant.favorite.store', $restaurant->id) }}" method="POST"
                                class="inline">
                                @csrf
                                <button type="submit"
                                    class="p-3 bg-white/20 backdrop-blur-sm hover:bg-white/30 rounded-full transition duration-200 favorite-btn {{ $restaurant->is_favorite ? 'is-favorite' : '' }}"
                                    title="{{ $restaurant->is_favorite ? 'Remove from favorites' : 'Add to favorites' }}"
                                    {{ !auth()->check() ? 'onclick="return false;"' : '' }}>
                                    <svg class="w-6 h-6" fill="{{ $restaurant->is_favorite ? 'currentColor' : 'none' }}"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-8">

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in hover-scale">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">About {{ $restaurant->name }}</h2>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            {{ $restaurant->description ?? 'Experience exceptional dining in a welcoming atmosphere. Our carefully crafted menu features the finest ingredients, prepared by skilled chefs who are passionate about delivering an unforgettable culinary experience.' }}
                        </p>
                    </div>


                    @if ($restaurant->menus->count() > 0)
                        @foreach ($restaurant->menus as $menuIndex => $menu)
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in hover-scale"
                                style="animation-delay: {{ 0.1 + $menuIndex * 0.1 }}s;">
                                <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $menu->title }}</h2>
                                @if ($menu->description)
                                    <p class="text-gray-600 mb-6">{{ $menu->description }}</p>
                                @endif


                                @if ($menu->menuItems->count() > 0)
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        @foreach ($menu->menuItems as $item)
                                            <div
                                                class="menu-item-card p-6 rounded-xl border border-gray-100 hover:border-orange-200">
                                                <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $item->title }}</h3>
                                                <p class="text-gray-600 text-sm leading-relaxed">
                                                    {{ $item->description ?? 'Delicious dish crafted with premium ingredients' }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-500 italic text-center py-8">No items in this menu yet</p>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div
                            class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center animate-slide-in">
                            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">No Menus Available</h3>
                            <p class="text-gray-600">The restaurant hasn't added their menu yet</p>
                        </div>
                    @endif
                </div>

                <div class="lg:col-span-1 space-y-6">
                    <div
                        class="max-w-sm mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in hover:scale-105 transition-transform duration-300">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Make a Reservation</h3>

                        <p class="text-gray-600 mb-6 text-center">
                            Reserve your spot easily and quickly. Click below to proceed!
                        </p>

                        <a href="{{ route('client.reserve', $restaurant->id) }}"
                            class="block w-full text-center py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-1 transition duration-200">
                            Reserve Now
                        </a>
                    </div>


                    <!-- Contact Information -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in hover-scale"
                        style="animation-delay: 0.1s;">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h3>

                        <div class="space-y-5">

                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Address</p>
                                    <p class="text-gray-600 text-sm mt-1">
                                        {{ $restaurant->address ?? 'Not provided' }}
                                        {{ $restaurant->city ? ', ' . $restaurant->city : '' }}
                                    </p>
                                </div>
                            </div>


                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Phone</p>
                                    <a href="tel:{{ $restaurant->number }}"
                                        class="text-orange-500 hover:text-orange-600 font-medium text-sm mt-1">
                                        {{ $restaurant->number ?? 'Not provided' }}
                                    </a>
                                </div>
                            </div>


                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Email</p>
                                    <a href="mailto:{{ $restaurant->email }}"
                                        class="text-orange-500 hover:text-orange-600 font-medium text-sm mt-1">
                                        {{ $restaurant->email ?? 'Not provided' }}
                                    </a>
                                </div>
                            </div>


                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900 text-sm">Opening Hours</p>
                                    <p class="text-gray-600 text-sm mt-1">
                                        {{ $restaurant->opening_hours ?? 'Not specified' }}
                                    </p>
                                </div>
                            </div>
                        </div>


                        @if ($restaurant->address && $restaurant->city)
                            <a href="https://www.google.com/maps/search/{{ urlencode($restaurant->address . ' ' . $restaurant->city) }}"
                                target="_blank"
                                class="mt-6 w-full py-3 bg-gray-100 hover:bg-gray-200 text-gray-900 font-semibold rounded-xl transition duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                Get Directions
                            </a>
                        @endif
                    </div>

                    @if ($restaurant->isActive)
                        <div class="bg-green-50 rounded-2xl shadow-sm border border-green-200 p-6 text-center animate-slide-in"
                            style="animation-delay: 0.2s;">
                            <svg class="w-8 h-8 text-green-500 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-green-700 font-semibold">Currently Open</p>
                        </div>
                    @else
                        <div class="bg-red-50 rounded-2xl shadow-sm border border-red-200 p-6 text-center animate-slide-in"
                            style="animation-delay: 0.2s;">
                            <svg class="w-8 h-8 text-red-500 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="text-red-700 font-semibold">Currently Closed</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
