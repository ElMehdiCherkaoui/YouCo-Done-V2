@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <div class="mb-8 animate-slide-in">
                <div class="flex items-center text-sm text-gray-600">
                    <a href="{{ route('dashboard') }}" class="hover:text-orange-600">Dashboard</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <a href="{{ route('restaurateur.restaurants') }}" class="hover:text-orange-600">My Restaurants</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-900 font-medium">Availability Management</span>
                </div>
            </div>

            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Availability Management</h1>
                <p class="text-xl text-gray-600">Manage time slots and prevent overbooking for
                    {{ $restaurant->name ?? 'Your Restaurant' }}</p>
            </div>

            <!-- Quick Stats -->


            <div class="grid grid-cols-1 lg:grid-cols-1 gap-8">

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in">

                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Add New Schedule</h2>

                    <form action="{{ route('availabilities.store', $restaurant) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Date -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Date
                                </label>
                                <input type="date" name="date" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg 
                           focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>

                            <!-- Availability -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Availability
                                </label>
                                <select name="is_available"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg 
                           focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option value="1">Available</option>
                                    <option value="0">Closed</option>
                                </select>
                            </div>

                            <!-- Start Time -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Start Time
                                </label>
                                <input type="time" name="start_time" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg 
                           focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>

                            <!-- End Time -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    End Time
                                </label>
                                <input type="time" name="end_time" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg 
                           focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            </div>

                        </div>

                        <!-- Hidden Restaurant ID -->
                        <input type="hidden" name="restaurants_id" value="">

                        <!-- Submit -->
                        <button type="submit"
                            class="w-full mt-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 
                   text-white rounded-lg font-semibold hover:shadow-lg transition">
                            Save Schedule
                        </button>
                    </form>
                </div>


                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-6">

                    <!-- Tips -->
                    <div class="bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl shadow-sm p-6 text-white animate-slide-in"
                        style="animation-delay: 0.5s;">
                        <h4 class="font-bold text-lg mb-3">💡 Pro Tip</h4>
                        <p class="text-white/90 text-sm">
                            Block popular time slots during holidays to prevent overbooking and ensure quality service for
                            your guests.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modals would go here -->
@endsection
