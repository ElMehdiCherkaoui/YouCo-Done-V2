@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Lora:wght@400;500;600&display=swap');
</style>

<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-10 animate-slide-in">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Statistics & Analytics</h1>
                    <p class="text-xl text-gray-600">Platform insights and performance metrics</p>
                </div>
                <div class="flex items-center space-x-3">
                    <select class="px-4 py-2 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 3 months</option>
                        <option>Last year</option>
                    </select>
                    <button class="px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg font-semibold hover:shadow-lg transition">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Export Report
                    </button>
                </div>
            </div>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl shadow-lg p-6 text-white animate-slide-in">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold">↑ 24%</span>
                </div>
                <p class="text-white/80 text-sm mb-1">Total Reservations</p>
                <p class="text-4xl font-display font-bold">12,456</p>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg p-6 text-white animate-slide-in" style="animation-delay: 0.05s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold">↑ 18%</span>
                </div>
                <p class="text-white/80 text-sm mb-1">Active Restaurants</p>
                <p class="text-4xl font-display font-bold">342</p>
            </div>

            <div class="bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl shadow-lg p-6 text-white animate-slide-in" style="animation-delay: 0.1s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold">↑ 32%</span>
                </div>
                <p class="text-white/80 text-sm mb-1">Total Clients</p>
                <p class="text-4xl font-display font-bold">8,923</p>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-lg p-6 text-white animate-slide-in" style="animation-delay: 0.15s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold">↑ 28%</span>
                </div>
                <p class="text-white/80 text-sm mb-1">Revenue</p>
                <p class="text-4xl font-display font-bold">€245K</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            
            <!-- Reservations Chart -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.2s;">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Reservations Trend</h2>
                
                <!-- Simple bar chart using CSS -->
                <div class="space-y-4">
                    @foreach(['Mon' => 85, 'Tue' => 92, 'Wed' => 78, 'Thu' => 95, 'Fri' => 100, 'Sat' => 98, 'Sun' => 65] as $day => $value)
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">{{ $day }}</span>
                            <span class="text-sm font-bold text-gray-900">{{ $value }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-full rounded-full transition-all duration-500" style="width: {{ $value }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Peak Hours -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.25s;">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Peak Hours</h2>
                
                <div class="grid grid-cols-6 gap-2 mb-6">
                    @foreach(['11:00', '12:00', '13:00', '14:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'] as $index => $hour)
                    @php
                        $heights = [40, 60, 85, 70, 55, 90, 100, 95, 75, 50];
                        $height = $heights[$index % 10];
                    @endphp
                    <div class="text-center">
                        <div class="h-32 flex items-end justify-center mb-2">
                            <div class="w-full bg-gradient-to-t from-orange-500 to-red-500 rounded-t-lg transition-all duration-500 hover:opacity-80" 
                                 style="height: {{ $height }}%"
                                 title="{{ $hour }}: {{ $height }}% capacity"></div>
                        </div>
                        <span class="text-xs text-gray-600 font-semibold">{{ $hour }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="bg-orange-50 border border-orange-200 rounded-lg p-4">
                    <p class="text-sm text-orange-800">
                        <strong>Peak Period:</strong> 19:00 - 21:00 (100% average capacity)
                    </p>
                </div>
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            
            <!-- Top Restaurants -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.3s;">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Top Performing Restaurants</h2>
                
                <div class="space-y-4">
                    @php
                    $restaurants = [
                        ['name' => 'La Belle Époque', 'city' => 'Paris', 'reservations' => 456, 'revenue' => 12850, 'rating' => 4.9],
                        ['name' => 'Sushi Zen', 'city' => 'Lyon', 'reservations' => 389, 'revenue' => 10240, 'rating' => 4.8],
                        ['name' => 'Trattoria Roma', 'city' => 'Marseille', 'reservations' => 367, 'revenue' => 9876, 'rating' => 4.7],
                        ['name' => 'Le Bistro Parisien', 'city' => 'Paris', 'reservations' => 342, 'revenue' => 9120, 'rating' => 4.8],
                        ['name' => 'The Steakhouse', 'city' => 'Nice', 'reservations' => 298, 'revenue' => 8540, 'rating' => 4.6],
                    ];
                    @endphp

                    @foreach($restaurants as $index => $restaurant)
                    <div class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-purple-200 transition">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white font-bold text-lg">
                                #{{ $index + 1 }}
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">{{ $restaurant['name'] }}</p>
                                <p class="text-sm text-gray-600">{{ $restaurant['city'] }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="flex items-center space-x-4">
                                <div>
                                    <p class="text-sm text-gray-600">Reservations</p>
                                    <p class="font-bold text-gray-900">{{ $restaurant['reservations'] }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Revenue</p>
                                    <p class="font-bold text-green-600">€{{ number_format($restaurant['revenue']) }}</p>
                                </div>
                                <div class="flex items-center text-yellow-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="ml-1 font-bold text-gray-900">{{ $restaurant['rating'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Reservations by City -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.35s;">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Reservations by City</h2>
                
                <!-- Pie Chart Representation -->
                <div class="flex items-center justify-center mb-6">
                    <div class="relative w-48 h-48">
                        <svg viewBox="0 0 100 100" class="transform -rotate-90">
                            <!-- Paris - 45% -->
                            <circle cx="50" cy="50" r="40" fill="none" stroke="#8b5cf6" stroke-width="20" 
                                    stroke-dasharray="113 251" stroke-dashoffset="0"/>
                            <!-- Lyon - 25% -->
                            <circle cx="50" cy="50" r="40" fill="none" stroke="#3b82f6" stroke-width="20" 
                                    stroke-dasharray="62.8 251" stroke-dashoffset="-113"/>
                            <!-- Marseille - 20% -->
                            <circle cx="50" cy="50" r="40" fill="none" stroke="#10b981" stroke-width="20" 
                                    stroke-dasharray="50.2 251" stroke-dashoffset="-175.8"/>
                            <!-- Other - 10% -->
                            <circle cx="50" cy="50" r="40" fill="none" stroke="#f59e0b" stroke-width="20" 
                                    stroke-dasharray="25.1 251" stroke-dashoffset="-226"/>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <p class="text-3xl font-bold text-gray-900">12.4K</p>
                                <p class="text-sm text-gray-600">Total</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    @php
                    $cities = [
                        ['name' => 'Paris', 'count' => 5580, 'percent' => 45, 'color' => 'bg-purple-500'],
                        ['name' => 'Lyon', 'count' => 3100, 'percent' => 25, 'color' => 'bg-blue-500'],
                        ['name' => 'Marseille', 'count' => 2480, 'percent' => 20, 'color' => 'bg-green-500'],
                        ['name' => 'Other Cities', 'count' => 1240, 'percent' => 10, 'color' => 'bg-orange-500'],
                    ];
                    @endphp

                    @foreach($cities as $city)
                    <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-4 h-4 rounded {{ $city['color'] }}"></div>
                            <span class="font-semibold text-gray-900">{{ $city['name'] }}</span>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-gray-900">{{ number_format($city['count']) }}</p>
                            <p class="text-xs text-gray-600">{{ $city['percent'] }}%</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Additional Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Cuisine Types -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.4s;">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Popular Cuisines</h3>
                <div class="space-y-4">
                    @foreach([
                        ['name' => 'French', 'count' => 3420, 'color' => 'from-red-500 to-pink-500'],
                        ['name' => 'Italian', 'count' => 2890, 'color' => 'from-green-500 to-emerald-500'],
                        ['name' => 'Japanese', 'count' => 2340, 'color' => 'from-purple-500 to-indigo-500'],
                        ['name' => 'American', 'count' => 1980, 'color' => 'from-blue-500 to-cyan-500'],
                        ['name' => 'Mediterranean', 'count' => 1826, 'color' => 'from-orange-500 to-amber-500'],
                    ] as $cuisine)
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">{{ $cuisine['name'] }}</span>
                            <span class="text-sm font-bold text-gray-900">{{ number_format($cuisine['count']) }}</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r {{ $cuisine['color'] }} h-full rounded-full" style="width: {{ ($cuisine['count'] / 3420) * 100 }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Booking Trends -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.45s;">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Booking Trends</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-green-900">Same Day</span>
                        </div>
                        <span class="text-2xl font-bold text-green-600">↑ 34%</span>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-blue-900">Advance (7d+)</span>
                        </div>
                        <span class="text-2xl font-bold text-blue-600">↑ 18%</span>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-purple-50 border border-purple-200 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-purple-900">Repeat Clients</span>
                        </div>
                        <span class="text-2xl font-bold text-purple-600">↑ 42%</span>
                    </div>
                </div>
            </div>

            <!-- Quick Insights -->
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl shadow-lg p-8 text-white animate-slide-in" style="animation-delay: 0.5s;">
                <h3 class="text-xl font-bold mb-6">Quick Insights</h3>
                <div class="space-y-4">
                    <div class="pb-4 border-b border-white/20">
                        <p class="text-white/80 text-sm mb-1">Average Party Size</p>
                        <p class="text-3xl font-bold">3.8 people</p>
                    </div>
                    <div class="pb-4 border-b border-white/20">
                        <p class="text-white/80 text-sm mb-1">Avg. Booking Value</p>
                        <p class="text-3xl font-bold">€24.50</p>
                    </div>
                    <div class="pb-4 border-b border-white/20">
                        <p class="text-white/80 text-sm mb-1">Cancellation Rate</p>
                        <p class="text-3xl font-bold">4.2%</p>
                    </div>
                    <div>
                        <p class="text-white/80 text-sm mb-1">Customer Satisfaction</p>
                        <div class="flex items-center">
                            <p class="text-3xl font-bold mr-2">4.7</p>
                            <div class="flex text-yellow-300">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
