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

        .time-slot {
            transition: all 0.3s ease;
        }

        .time-slot:hover:not(.disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .time-slot.selected {
            background: linear-gradient(135deg, #f97316 0%, #dc2626 100%);
            color: white;
            border-color: transparent;
        }

        .time-slot.disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .calendar-day {
            transition: all 0.3s ease;
        }

        .calendar-day:hover:not(.disabled) {
            transform: scale(1.05);
        }

        .calendar-day.selected {
            background: linear-gradient(135deg, #f97316 0%, #dc2626 100%);
            color: white;
        }

        .calendar-day.disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <div class="mb-8 animate-slide-in">
                <div class="flex items-center text-sm text-gray-600">
                    <a href="{{ route('client.restaurant') }}" class="hover:text-orange-600">Restaurants</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <a href="" class="hover:text-orange-600">{{ $restaurant->name }}</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-900 font-medium">Make Reservation</span>
                </div>
            </div>

            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-bold text-gray-900 mb-3">Reserve Your Table</h1>
                <p class="text-xl text-gray-600">{{ $restaurant->name }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">
                    <form action="{{ route('client.reservation.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                        <div class="lg:col-span-2 space-y-6">

                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in">
                                <h2 class="text-2xl font-bold mb-4">Select Date</h2>

                                <select name="reservation_date"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                    <option value="" selected disabled>Select a date</option>
                                    @for ($i = 2; $i <= 20; $i++)
                                        <option value="{{ now()->addDays($i - 1)->format('Y-m-d') }}">
                                            {{ now()->addDays($i - 1)->format('l, d M Y') }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in mt-6">
                                <h2 class="text-2xl font-bold mb-4">Select Time Slot</h2>

                                @if (!empty($timeSlots))
                                    <select name="time_solt"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                        <option value="" selected disabled>Select a time slot</option>
                                        @foreach ($timeSlots as $slot)
                                            <option value="{{ $slot }}">{{ $slot }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <p class="text-gray-500 text-center py-8">No available slots for today</p>
                                @endif

                                <p class="mt-4 text-sm text-gray-600">
                                    <span class="inline-block w-3 h-3 bg-gray-300 rounded mr-2"></span>
                                    Available slots are listed every 30 minutes from current time
                                </p>
                            </div>

                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in"
                                style="animation-delay: 0.2s;">
                                <div class="flex items-center space-x-3 mb-6">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold">
                                        3</div>
                                    <h2 class="text-2xl font-bold text-gray-900">Number of People</h2>
                                </div>


                                <div class="mt-4">

                                    <input type="number" value="1" min="1" max="{{ $restaurant->capacity }}"
                                        name="number_of_people"
                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Enter number of guests">
                                </div>
                            </div>


                            <button type="submit"
                                class="w-full py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl font-bold text-lg hover:shadow-xl transition duration-200">
                                Confirm Reservation
                            </button>

                        </div>
                    </form>
                </div>

                <!-- Reservation Summary Sidebar -->
                <div class="lg:col-span-1">
                    <div class=" top-24 space-y-6">

                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden animate-slide-in"
                            style="animation-delay: 0.4s;">
                            <div class="relative h-32 bg-gradient-to-br from-orange-400 to-pink-500">
                                <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $restaurant->name }}</h3>
                                <p class="text-gray-600 text-sm mb-3">{{ $restaurant->description }}</p>

                            </div>
                        </div>




                        <div class="bg-blue-50 rounded-2xl border border-blue-200 p-6 animate-slide-in"
                            style="animation-delay: 0.6s;">
                            <h4 class="font-bold text-blue-900 mb-3">Cancellation Policy</h4>
                            <ul class="space-y-2 text-sm text-blue-800">
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 mr-2 flex-shrink-0 text-blue-600" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Free cancellation up to 24 hours before
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 mr-2 flex-shrink-0 text-blue-600" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Full deposit refund guaranteed
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 mr-2 flex-shrink-0 text-blue-600" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Instant confirmation
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
