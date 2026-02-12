@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">My Reservations</h1>
                <p class="text-xl text-gray-600">Track and manage all your restaurant bookings</p>
            </div>



            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.05s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Total Reservations</p>
                            <p class="text-3xl font-bold text-gray-900">24</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Upcoming</p>
                            <p class="text-3xl font-bold text-green-600">3</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.15s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Completed</p>
                            <p class="text-3xl font-bold text-gray-900">19</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.2s;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Canceled</p>
                            <p class="text-3xl font-bold text-red-600">2</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservations List -->
            <div class="space-y-6">

                @if ($reservations->isEmpty())
                    <div class="text-center py-20 text-gray-500">
                        You have no reservations yet.
                    </div>
                @endif

                @foreach ($reservations as $index => $reservation)
                    <div class="reservation-card bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition duration-300 animate-slide-in"
                        style="animation-delay: {{ 0.1 * ($index + 1) }}s;" data-status="{{ $reservation->status }}">

                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                            <!-- Restaurant Image & Info -->
                            <div class="lg:col-span-2 flex items-center space-x-4 p-6">
                                <div class="relative w-24 h-24 flex-shrink-0">
                                    <img src="{{ $reservation->restaurant->image ?? 'https://via.placeholder.com/150' }}"
                                        alt="{{ $reservation->restaurant->name }}"
                                        class="w-full h-full object-cover rounded-xl">
                                </div>

                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-1">
                                        {{ $reservation->restaurant->name }}
                                    </h3>

                                    <p class="text-gray-600 text-sm mb-2">
                                        {{ $reservation->restaurant->cuisine_type }} Cuisine
                                    </p>

                   
                                </div>
                            </div>

                            <!-- Reservation Details -->
                            <div class="flex items-center px-6 lg:px-0">
                                <div class="grid grid-cols-3 gap-4 w-full">
                                    <div>
                                        <p class="text-xs text-gray-600 mb-1">Date</p>
                                        <p class="font-bold text-gray-900 text-sm">
                                            {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('M d, Y') }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-600 mb-1">Time</p>
                                        <p class="font-bold text-gray-900 text-sm">
                                            {{ $reservation->time_solt }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-600 mb-1">Guests</p>
                                        <p class="font-bold text-gray-900 text-sm">
                                            {{ $reservation->number_of_people }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Status & Actions -->
                            <div
                                class="flex items-center justify-between lg:justify-end p-6 lg:pr-6 border-t lg:border-t-0 lg:border-l border-gray-100">

                                <!-- STATUS -->
                                <div class="mr-4">

                                    @if ($reservation->status === 'confirmed')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                            Confirmed
                                        </span>
                                    @elseif($reservation->status === 'pending')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                    @elseif($reservation->status === 'completed')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                            Completed
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                            Canceled
                                        </span>
                                    @endif

                                </div>

                                <!-- ACTIONS -->
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open" class="p-2 hover:bg-gray-100 rounded-lg transition">
                                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 30 20">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>

                                    <div x-show="open" @click.away="open = false"
                                        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 py-2 z-auto"
                                        style="display: none;">

                    

                                        @if (in_array($reservation->status, ['confirmed', 'pending']))
                               

                                            <form method="POST"
                                                action="">
                                                @csrf
                                              
                                                <button type="submit"
                                                    onclick="return confirm('Cancel this reservation?')"
                                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                                    Cancel Reservation
                                                </button>
                                            </form>
                                        @endif

                                        @if ($reservation->status === 'completed')
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                Write Review
                                            </a>

                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                                Book Again
                                            </a>
                                        @endif

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>


            <!-- Empty State (hidden by default) -->
            <div id="empty-state" class="hidden bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">No Reservations Found</h3>
                <p class="text-gray-600 mb-6">You don't have any reservations in this category</p>
                <a href="{{ route('client.restaurant') }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transition duration-200">
                    Explore Restaurants
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>

        </div>
    </div>

    <style>
        .tab-btn {
            color: #6b7280;
        }

        .tab-btn:hover {
            background-color: #f3f4f6;
            color: #111827;
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #f97316 0%, #dc2626 100%);
            color: white;
        }
    </style>

    <script>
        function filterReservations(status) {
            // Update active tab
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter reservation cards
            const cards = document.querySelectorAll('.reservation-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const cardStatus = card.dataset.status;

                if (status === 'all') {
                    card.style.display = 'block';
                    visibleCount++;
                } else if (status === 'upcoming') {
                    if (cardStatus === 'confirmed' || cardStatus === 'pending') {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                } else if (status === 'past') {
                    if (cardStatus === 'completed') {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                } else if (status === 'canceled') {
                    if (cardStatus === 'canceled') {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                }
            });

            // Show/hide empty state
            const emptyState = document.getElementById('empty-state');
            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }
    </script>
@endsection
