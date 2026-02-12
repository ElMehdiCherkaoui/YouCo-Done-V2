@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-orange-500 via-red-500 to-pink-600 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center text-white animate-slide-in">
            <h1 class="text-6xl md:text-7xl font-display font-bold mb-6 leading-tight">
                Discover Your Next<br/>
                <span class="text-yellow-300">Culinary Adventure</span>
            </h1>
            <p class="text-xl md:text-2xl text-white/90 mb-10 max-w-3xl mx-auto leading-relaxed">
                Explore exceptional dining experiences, from cozy cafes to fine dining establishments. Your perfect meal awaits.
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-3xl mx-auto">
                <form action="" method="GET" class="relative">
                    <div class="flex items-center bg-white rounded-2xl shadow-2xl overflow-hidden">
                        <div class="flex-1 flex items-center px-6 py-5">
                            <svg class="w-6 h-6 text-gray-400 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" 
                                name="search" 
                                placeholder="Search restaurants, cuisines, or locations..." 
                                class="w-full text-lg text-gray-900 placeholder-gray-400 focus:outline-none border-0 p-0">
                        </div>
                        <button type="submit" class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-5 font-semibold hover:shadow-lg transition duration-200">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Quick Stats -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="text-5xl font-display font-bold mb-2">500+</div>
                    <div class="text-white/90">Restaurants</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="text-5xl font-display font-bold mb-2">50K+</div>
                    <div class="text-white/90">Happy Customers</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="text-5xl font-display font-bold mb-2">4.8★</div>
                    <div class="text-white/90">Average Rating</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Categories -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-slide-in">
            <h2 class="text-4xl font-display font-bold text-gray-900 mb-4">Browse by Cuisine</h2>
            <p class="text-xl text-gray-600">Explore diverse flavors from around the world</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @php
            $cuisines = [
                ['name' => 'Italian', 'icon' => '🍝', 'color' => 'from-green-500 to-emerald-600'],
                ['name' => 'Japanese', 'icon' => '🍱', 'color' => 'from-red-500 to-pink-600'],
                ['name' => 'Mexican', 'icon' => '🌮', 'color' => 'from-yellow-500 to-orange-600'],
                ['name' => 'Chinese', 'icon' => '🥡', 'color' => 'from-red-600 to-rose-700'],
                ['name' => 'American', 'icon' => '🍔', 'color' => 'from-blue-500 to-indigo-600'],
                ['name' => 'French', 'icon' => '🥐', 'color' => 'from-purple-500 to-violet-600'],
            ];
            @endphp

            @foreach($cuisines as $index => $cuisine)
            <a href="" 
               class="card-hover bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100 animate-slide-in" 
               style="animation-delay: {{ $index * 0.05 }}s;">
                <div class="w-16 h-16 bg-gradient-to-br {{ $cuisine['color'] }} rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                    {{ $cuisine['icon'] }}
                </div>
                <h3 class="font-semibold text-gray-900">{{ $cuisine['name'] }}</h3>
            </a>
            @endforeach
        </div>
    </div>
</div>

<!-- Featured Restaurants -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-12">
            <div class="animate-slide-in">
                <h2 class="text-4xl font-display font-bold text-gray-900 mb-2">Featured Restaurants</h2>
                <p class="text-xl text-gray-600">Handpicked by our culinary experts</p>
            </div>
            <a href="" class="hidden md:inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                View All
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @for($i = 0; $i < 6; $i++)
            <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 animate-slide-in" style="animation-delay: {{ $i * 0.1 }}s;">
                <div class="relative h-56 bg-gradient-to-br from-orange-400 to-pink-500">
                    <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full text-sm font-semibold text-gray-900">
                        4.{{ 5 + $i }}★
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">Restaurant Name {{ $i + 1 }}</h3>
                            <p class="text-sm text-gray-600">Italian Cuisine</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">
                        Experience authentic Italian flavors in a cozy, elegant atmosphere perfect for any occasion.
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Downtown
                        </div>
                        <a href="#" class="text-orange-600 hover:text-orange-700 font-semibold text-sm">
                            View Details →
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <div class="text-center mt-12 md:hidden">
            <a href="" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                View All Restaurants
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Why Choose Us -->
<div class="py-20 bg-gradient-to-br from-gray-900 to-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-slide-in">
            <h2 class="text-4xl font-display font-bold mb-4">Why Choose RestaurantHub</h2>
            <p class="text-xl text-gray-300">Your trusted partner in discovering exceptional dining</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 animate-slide-in" style="animation-delay: 0.1s;">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-display font-bold mb-3">Verified Reviews</h3>
                <p class="text-gray-300">
                    Real reviews from real diners. Make informed decisions with authentic feedback from our community.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 animate-slide-in" style="animation-delay: 0.2s;">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-display font-bold mb-3">Easy Discovery</h3>
                <p class="text-gray-300">
                    Find your perfect dining spot with powerful search, filters, and personalized recommendations.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 animate-slide-in" style="animation-delay: 0.3s;">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-display font-bold mb-3">Always Updated</h3>
                <p class="text-gray-300">
                    Fresh information on menus, hours, and special offers. Stay in the know with real-time updates.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-20 bg-gradient-to-r from-orange-500 to-red-500">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h2 class="text-5xl font-display font-bold mb-6">Ready to Start Exploring?</h2>
        <p class="text-xl mb-10 text-white/90">
            Join thousands of food lovers discovering amazing restaurants every day
        </p>
        <a href="{{ route('client.restaurant') }}" class="inline-flex items-center px-8 py-4 bg-white text-orange-600 rounded-xl font-bold text-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-200">
            Explore Restaurants Now
            <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>
    </div>
</div>
@endsection