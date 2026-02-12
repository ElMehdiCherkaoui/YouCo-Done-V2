@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Admin Dashboard</h1>
                <p class="text-xl text-gray-600">Platform overview and management</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.05s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+15%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Total Users</p>
                    <p class="text-3xl font-display font-bold text-gray-900"> 1247 </p>
                    <p class="text-xs text-gray-500 mt-2">
                        <span class="text-green-600 font-semibold">+{{ rand(20, 50) }}</span> this month
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+8%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Total Restaurants</p>
                    <p class="text-3xl font-display font-bold text-gray-900"> 523 </p>
                    <p class="text-xs text-gray-500 mt-2">
                        <span class="text-green-600 font-semibold">+{{ rand(10, 30) }}</span> this month
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.15s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+22%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Total Reservations</p>
                    <p class="text-3xl font-display font-bold text-gray-900"> 8934 </p>
                    <p class="text-xs text-gray-500 mt-2">
                        <span class="text-green-600 font-semibold">+{{ rand(100, 300) }}</span> this month
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+0.2</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Avg Platform Rating</p>
                    <p class="text-3xl font-display font-bold text-gray-900">? 4.7, 1)</p>
                    <p class="text-xs text-gray-500 mt-2">Based on {{ rand(5000, 10000) }} reviews</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in"
                        style="animation-delay: 0.25s;">
                        <h2 class="text-2xl font-display font-bold text-gray-900 mb-6">Recent Activity</h2>
                        <div class="space-y-4">
                            @for ($i = 0; $i < 8; $i++)
                                @php
                                    $activities = [
                                        [
                                            'icon' =>
                                                'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                                            'color' => 'blue',
                                            'text' => 'New user registered',
                                        ],
                                        [
                                            'icon' =>
                                                'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                                            'color' => 'orange',
                                            'text' => 'New restaurant added',
                                        ],
                                        [
                                            'icon' =>
                                                'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
                                            'color' => 'purple',
                                            'text' => 'New reservation made',
                                        ],
                                        [
                                            'icon' =>
                                                'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
                                            'color' => 'yellow',
                                            'text' => 'New review posted',
                                        ],
                                    ];
                                    $activity = $activities[array_rand($activities)];
                                @endphp
                                <div
                                    class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition duration-200">
                                    <div
                                        class="w-10 h-10 bg-{{ $activity['color'] }}-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-{{ $activity['color'] }}-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $activity['icon'] }}" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900 font-medium">{{ $activity['text'] }}</p>
                                        <p class="text-xs text-gray-500">{{ rand(1, 60) }} minutes ago</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Growth Chart -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in"
                        style="animation-delay: 0.3s;">
                        <h2 class="text-2xl font-display font-bold text-gray-900 mb-6">Platform Growth</h2>
                        <div class="h-64 flex items-end justify-between space-x-2">
                            @for ($i = 0; $i < 12; $i++)
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="w-full bg-gradient-to-t from-blue-500 to-cyan-500 rounded-t-lg transition-all duration-300 hover:opacity-80"
                                        style="height: {{ rand(40, 100) }}%"></div>
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
                            <a href="{{ route('admin.users') }}"
                                class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-xl hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                                <span class="font-semibold">Manage Users</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <a href="{{ route('admin.restaurants') }}"
                                class="flex items-center justify-between p-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition duration-200">
                                <span class="font-semibold">Manage Restaurants</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between p-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition duration-200">
                                <span class="font-semibold">View Reports</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- User Distribution -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                        style="animation-delay: 0.4s;">
                        <h3 class="text-xl font-display font-bold text-gray-900 mb-4">User Distribution</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">Clients</span>
                                    <span class="text-sm font-bold text-gray-900">{{ rand(800, 1000) }}</span>
                                </div>
                                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full"
                                        style="width: 75%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">Restaurateurs</span>
                                    <span class="text-sm font-bold text-gray-900">{{ rand(200, 300) }}</span>
                                </div>
                                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-orange-500 to-red-500 rounded-full"
                                        style="width: 20%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">Admins</span>
                                    <span class="text-sm font-bold text-gray-900">{{ rand(5, 10) }}</span>
                                </div>
                                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full"
                                        style="width: 5%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl shadow-sm p-6 text-white animate-slide-in"
                        style="animation-delay: 0.45s;">
                        <h3 class="text-xl font-display font-bold mb-3">System Status</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-white/90">Server Status</span>
                                <span
                                    class="px-2 py-1 bg-white/20 backdrop-blur-sm rounded text-xs font-semibold">Online</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-white/90">Database</span>
                                <span
                                    class="px-2 py-1 bg-white/20 backdrop-blur-sm rounded text-xs font-semibold">Healthy</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-white/90">API Response</span>
                                <span
                                    class="px-2 py-1 bg-white/20 backdrop-blur-sm rounded text-xs font-semibold">Fast</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
