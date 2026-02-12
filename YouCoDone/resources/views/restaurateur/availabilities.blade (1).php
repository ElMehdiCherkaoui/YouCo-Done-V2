@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <div class="mb-8 animate-slide-in">
            <div class="flex items-center text-sm text-gray-600">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-600">Dashboard</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('restaurateur.restaurants') }}" class="hover:text-orange-600">My Restaurants</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900 font-medium">Availability Management</span>
            </div>
        </div>

        <!-- Header -->
        <div class="mb-10 animate-slide-in">
            <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Availability Management</h1>
            <p class="text-xl text-gray-600">Manage time slots and prevent overbooking for {{ $restaurant->name ?? 'Your Restaurant' }}</p>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.05s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Total Slots Today</p>
                        <p class="text-3xl font-bold text-gray-900">48</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.1s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Available</p>
                        <p class="text-3xl font-bold text-green-600">32</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.15s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Booked</p>
                        <p class="text-3xl font-bold text-orange-600">12</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.2s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Blocked</p>
                        <p class="text-3xl font-bold text-red-600">4</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Weekly Schedule -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.25s;">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Weekly Schedule</h2>
                        <button class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transition" onclick="document.getElementById('add-schedule-modal').classList.remove('hidden')">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Add Schedule
                        </button>
                    </div>

                    <div class="space-y-4">
                        @php
                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        $schedules = [
                            'Monday' => ['11:00 - 14:30', '18:00 - 22:30'],
                            'Tuesday' => ['11:00 - 14:30', '18:00 - 22:30'],
                            'Wednesday' => ['11:00 - 14:30', '18:00 - 22:30'],
                            'Thursday' => ['11:00 - 14:30', '18:00 - 23:00'],
                            'Friday' => ['11:00 - 14:30', '18:00 - 23:30'],
                            'Saturday' => ['11:00 - 15:00', '18:00 - 23:30'],
                            'Sunday' => ['Closed'],
                        ];
                        @endphp

                        @foreach($days as $day)
                        <div class="flex items-center justify-between p-4 border-2 border-gray-100 rounded-xl hover:border-orange-200 transition">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <span class="font-bold text-purple-600">{{ substr($day, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">{{ $day }}</p>
                                    <div class="flex items-center space-x-2 text-sm text-gray-600">
                                        @foreach($schedules[$day] as $schedule)
                                            <span class="px-2 py-1 bg-gray-100 rounded">{{ $schedule }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                @if($schedules[$day][0] !== 'Closed')
                                <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Time Slot Configuration -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.3s;">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Time Slot Configuration</h2>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Slot Duration (minutes)</label>
                            <select class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                <option value="15">15 minutes</option>
                                <option value="30" selected>30 minutes</option>
                                <option value="45">45 minutes</option>
                                <option value="60">60 minutes</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tables per Slot</label>
                            <input type="number" value="10" min="1" max="50" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Max Party Size</label>
                            <input type="number" value="8" min="1" max="20" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Booking Window (days)</label>
                            <input type="number" value="30" min="1" max="90" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                        </div>
                    </div>

                    <button class="w-full mt-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transition">
                        Save Configuration
                    </button>
                </div>

                <!-- Blocked Dates -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.35s;">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Blocked Dates</h2>
                        <button class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition" onclick="document.getElementById('block-date-modal').classList.remove('hidden')">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                            </svg>
                            Block Date
                        </button>
                    </div>

                    <div class="space-y-3">
                        @foreach(['Dec 25, 2024 - Christmas Day', 'Jan 1, 2025 - New Year', 'Feb 14, 2025 - Private Event'] as $blockedDate)
                        <div class="flex items-center justify-between p-4 bg-red-50 border border-red-200 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                </svg>
                                <span class="font-semibold text-red-900">{{ $blockedDate }}</span>
                            </div>
                            <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- Today's Availability -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.4s;">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Today's Availability</h3>
                    <div class="text-center mb-6">
                        <div class="inline-block">
                            <svg class="w-32 h-32" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="40" fill="none" stroke="#e5e7eb" stroke-width="8"/>
                                <circle cx="50" cy="50" r="40" fill="none" stroke="#10b981" stroke-width="8" stroke-dasharray="251.2" stroke-dashoffset="83.7" transform="rotate(-90 50 50)"/>
                                <text x="50" y="55" text-anchor="middle" font-size="20" font-weight="bold" fill="#111827">67%</text>
                            </svg>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">32 of 48 slots available</p>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Lunch (11:00-15:00)</span>
                            <span class="font-bold text-green-600">18/24</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Dinner (18:00-23:00)</span>
                            <span class="font-bold text-orange-600">14/24</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.45s;">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <button class="w-full flex items-center p-3 bg-orange-50 hover:bg-orange-100 rounded-lg transition">
                            <svg class="w-5 h-5 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="font-semibold text-orange-900">Add Time Slot</span>
                        </button>
                        <button class="w-full flex items-center p-3 bg-red-50 hover:bg-red-100 rounded-lg transition">
                            <svg class="w-5 h-5 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                            </svg>
                            <span class="font-semibold text-red-900">Block Time</span>
                        </button>
                        <button class="w-full flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                            <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="font-semibold text-blue-900">View Calendar</span>
                        </button>
                    </div>
                </div>

                <!-- Tips -->
                <div class="bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl shadow-sm p-6 text-white animate-slide-in" style="animation-delay: 0.5s;">
                    <h4 class="font-bold text-lg mb-3">💡 Pro Tip</h4>
                    <p class="text-white/90 text-sm">
                        Block popular time slots during holidays to prevent overbooking and ensure quality service for your guests.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modals would go here -->

@endsection
