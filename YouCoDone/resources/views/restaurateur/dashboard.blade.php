@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Dashboard</h1>
                <p class="text-xl text-gray-600">Welcome back, {{ auth()->user()->name }}! Here's your restaurant overview
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.05s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+12%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Total Restaurants</p>
                    <p class="text-3xl font-display font-bold text-gray-900"> 3</p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+24%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Total Reservations</p>
                    <p class="text-3xl font-display font-bold text-gray-900"> 142 </p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.15s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+0.3</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Average Rating</p>
                    <p class="text-3xl font-display font-bold text-gray-900">4.6, 1</p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+18%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Profile Views</p>
                    <p class="text-3xl font-display font-bold text-gray-900">3847</p>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Recent Reservations -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in"
                        style="animation-delay: 0.25s;">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-display font-bold text-gray-900">Recent Reservations</h2>
                            <a href="#" class="text-orange-600 hover:text-orange-700 font-semibold text-sm">View All
                                →</a>
                        </div>

                        <div class="space-y-4">
                            @for ($i = 0; $i < 5; $i++)
                                <div
                                    class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 transition duration-200">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center text-white font-bold">
                                            {{ chr(65 + $i) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Customer Name {{ $i + 1 }}</p>
                                            <p class="text-sm text-gray-600">Restaurant {{ ($i % 3) + 1 }} ·
                                                {{ rand(2, 6) }} people</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-gray-900">
                                            {{ date('M d, Y', strtotime('+' . $i . ' days')) }}</p>
                                        <p class="text-sm text-gray-600">
                                            {{ ['5:00 PM', '6:00 PM', '7:00 PM', '8:00 PM'][rand(0, 3)] }}</p>
                                    </div>
                                    <div>
                                        <span
                                            class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ ['bg-green-100 text-green-800', 'bg-yellow-100 text-yellow-800', 'bg-blue-100 text-blue-800'][rand(0, 2)] }}">
                                            {{ ['Confirmed', 'Pending', 'Completed'][rand(0, 2)] }}
                                        </span>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Performance Chart -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in"
                        style="animation-delay: 0.3s;">
                        <h2 class="text-2xl font-display font-bold text-gray-900 mb-6">Monthly Performance</h2>
                        <div class="h-64 flex items-end justify-between space-x-2">
                            @for ($i = 0; $i < 12; $i++)
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="w-full bg-gradient-to-t from-orange-500 to-red-500 rounded-t-lg transition-all duration-300 hover:opacity-80"
                                        style="height: {{ rand(30, 100) }}%"></div>
                                    <p class="text-xs text-gray-600 mt-2">{{ date('M', mktime(0, 0, 0, $i + 1, 1)) }}</p>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                        style="animation-delay: 0.35s;">
                        <h3 class="text-xl font-display font-bold text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('restaurateur.create') }}"
                                class="flex items-center justify-between p-4 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                                <span class="font-semibold">Add New Restaurant</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </a>
                            <a href="{{ route('restaurateur.restaurants') }}"
                                class="flex items-center justify-between p-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition duration-200">
                                <span class="font-semibold">Manage Restaurants</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between p-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition duration-200">
                                <span class="font-semibold">View Reviews</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Reviews -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                        style="animation-delay: 0.4s;">
                        <h3 class="text-xl font-display font-bold text-gray-900 mb-4">Recent Reviews</h3>
                        <div class="space-y-4">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                                    <div class="flex items-center space-x-2 mb-2">
                                        @for ($j = 0; $j < 5; $j++)
                                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <p class="text-sm text-gray-600 mb-1">Great food and service! Highly recommend.</p>
                                    <p class="text-xs text-gray-500">{{ rand(1, 30) }} days ago</p>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Tips -->
                    <div class="bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl shadow-sm p-6 text-white animate-slide-in"
                        style="animation-delay: 0.45s;">
                        <h3 class="text-xl font-display font-bold mb-3">💡 Pro Tip</h3>
                        <p class="text-white/90 text-sm">
                            Restaurants with updated menus and photos get 40% more reservations. Keep your listings fresh!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
