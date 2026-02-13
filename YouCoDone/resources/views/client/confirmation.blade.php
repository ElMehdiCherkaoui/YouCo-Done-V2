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

        @keyframes checkmark {
            0% {
                stroke-dashoffset: 100;
            }

            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .checkmark-circle {
            animation: scaleIn 0.5s ease-out;
        }

        .checkmark-path {
            stroke-dasharray: 100;
            animation: checkmark 0.5s ease-out 0.3s forwards;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-emerald-50 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Success Animation -->
            <div class="text-center mb-12 animate-slide-in">
                <div class="inline-block">
                    <svg class="checkmark-circle w-24 h-24 mx-auto mb-6" viewBox="0 0 52 52">
                        <circle class="checkmark-circle-path" cx="26" cy="26" r="25" fill="none"
                            stroke="#10B981" stroke-width="2" />
                        <path class="checkmark-path" fill="none" stroke="#10B981" stroke-width="3" stroke-linecap="round"
                            d="M14 27l7 7 16-16" />
                    </svg>
                </div>
                <h1 class="text-5xl font-bold text-gray-900 mb-3">Reservation Confirmed!</h1>
                <p class="text-xl text-gray-600">Your table has been successfully reserved</p>
            </div>

            <!-- Confirmation Number -->
            <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl shadow-lg p-8 text-white text-center mb-8 animate-slide-in"
                style="animation-delay: 0.1s;">
                <p class="text-white/90 text-sm font-semibold mb-2">CONFIRMATION NUMBER</p>
                <p class="text-4xl font-bold tracking-wider">{{ $reservation->payment_status ?? 'BMT-2024-12345' }}</p>
                <p class="text-white/90 text-sm mt-4">Please save this number for your records</p>
            </div>

            <!-- Reservation Details Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8 animate-slide-in"
                style="animation-delay: 0.2s;">
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 p-6">
                    <h2 class="text-2xl font-bold text-white">Reservation Details</h2>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Restaurant Info -->
                        <div class="flex items-start space-x-4">
                            <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-semibold">Restaurant</p>
                                <p class="text-lg font-bold text-gray-900">{{ $restaurant->name }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $restaurant->cuisine_type }}
                                </p>
                            </div>
                        </div>

                        <!-- Date & Time -->
                        <div class="flex items-start space-x-4">
                            <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-semibold">Date & Time</p>
                                <p class="text-lg font-bold text-gray-900">
                                    {{ $reservation->reservation_date }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $reservation->time_solt }}</p>
                            </div>
                        </div>

                        <!-- Party Size -->
                        <div class="flex items-start space-x-4">
                            <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-semibold">Party Size</p>
                                <p class="text-lg font-bold text-gray-900">{{ $reservation->number_of_people }} People</p>
                                <p class="text-sm text-gray-600 mt-1">Standard seating</p>
                            </div>
                        </div>

                        <!-- Payment Status -->
                        <div class="flex items-start space-x-4">
                            <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 font-semibold">Payment Status</p>
                                <p class="text-lg font-bold text-green-600">Paid</p>
                                <p class="text-sm text-gray-600 mt-1">€22.50 (Deposit)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-600 font-semibold mb-1">Location</p>
                                <p class="text-gray-900 font-medium">
                                    {{ $restaurant->address }}</p>
                                <a href="#"
                                    class="inline-flex items-center text-orange-600 hover:text-orange-700 font-semibold text-sm mt-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                    Get Directions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QR Code & Downloads -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                <!-- QR Code -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center animate-slide-in"
                    style="animation-delay: 0.3s;">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Your QR Code</h3>

                    <div class="inline-block p-6 bg-gray-50 rounded-xl mb-6">
                        <!-- QR Code placeholder - in real app, generate actual QR code -->
                        <div class="w-48 h-48 bg-white border-4 border-gray-900 flex items-center justify-center">
                            <svg class="w-40 h-40" viewBox="0 0 100 100">
                                <rect width="100" height="100" fill="white" />
                                <!-- Simplified QR pattern -->
                                <rect x="10" y="10" width="15" height="15" fill="black" />
                                <rect x="75" y="10" width="15" height="15" fill="black" />
                                <rect x="10" y="75" width="15" height="15" fill="black" />
                                <rect x="30" y="30" width="40" height="40" fill="black" />
                                <rect x="35" y="35" width="30" height="30" fill="white" />
                                <rect x="45" y="45" width="10" height="10" fill="black" />
                            </svg>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mb-4">Show this QR code at the restaurant</p>

                    <button
                        class="w-full py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-lg font-semibold hover:shadow-lg transition duration-200">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download QR Code
                    </button>
                </div>

                <!-- Download Options -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in"
                    style="animation-delay: 0.4s;">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Download & Share</h3>

                    <div class="space-y-4">
                        <a href="{{ route('reservation.invoice', $reservation->id) }}"
                            class="w-full flex items-center justify-between p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 hover:bg-orange-50 transition">

                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p class="font-semibold text-gray-900">Download PDF</p>
                                    <p class="text-xs text-gray-600">Confirmation receipt</p>
                                </div>
                            </div>

                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>


                        <button
                            class="w-full flex items-center justify-between p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p class="font-semibold text-gray-900">Email Confirmation</p>
                                    <p class="text-xs text-gray-600">Sent to your inbox</p>
                                </div>
                            </div>
                            <span
                                class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Sent</span>
                        </button>

                        <button
                            class="w-full flex items-center justify-between p-4 border-2 border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p class="font-semibold text-gray-900">Share</p>
                                    <p class="text-xs text-gray-600">Send to friends</p>
                                </div>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <button
                            class="w-full flex items-center justify-between p-4 border-2 border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p class="font-semibold text-gray-900">Add to Calendar</p>
                                    <p class="text-xs text-gray-600">Google, Apple, Outlook</p>
                                </div>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Important Information -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6 mb-8 animate-slide-in"
                style="animation-delay: 0.5s;">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-yellow-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h4 class="font-bold text-yellow-900 mb-2">Important Information</h4>
                        <ul class="space-y-1 text-sm text-yellow-800">
                            <li>• Please arrive 10 minutes before your reservation time</li>
                            <li>• Show your QR code or confirmation number to the host</li>
                            <li>• Free cancellation up to 24 hours before reservation</li>
                            <li>• Contact the restaurant directly for any special requests</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 animate-slide-in" style="animation-delay: 0.6s;">
                <a href="{{ route('client.reservation') }}"
                    class="py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl font-bold text-center hover:shadow-lg transition duration-200">
                    View My Reservations
                </a>
                <a href="{{ route('client.restaurant') }}"
                    class="py-4 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-bold text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                    Book Another Table
                </a>
                <a href="{{ route('client.restaurant.show', $restaurant->id ?? 1) }}"
                    class="py-4 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-bold text-center hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                    View Restaurant
                </a>
            </div>

        </div>


    </div>
@endsection
