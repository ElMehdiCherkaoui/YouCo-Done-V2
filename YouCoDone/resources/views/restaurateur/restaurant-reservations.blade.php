@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Restaurant Reservations</h1>
                <p class="text-xl text-gray-600">{{ $restaurant->name ?? 'Your Restaurant' }} - Manage all bookings</p>
            </div>



            <!-- Reservations Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden animate-slide-in"
                style="animation-delay: 0.3s;">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Client</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">restaurant</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Date & Time</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Guests</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                                </th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($reservations as $reservation)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $reservation->user->name }}</p>
                                            <p class="text-sm text-gray-600">{{ $reservation->user->email }}</p>
                                            <p class="text-sm text-gray-600">{{ $reservation->user->phone }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $reservation->reservation->restaurant->name }}</p>
                                       
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="text-sm text-gray-600">
                                                {{ $reservation->reservation->reservation_date }}</p>
                                            <p class="text-sm text-gray-600">{{ $reservation->reservation->time_solt }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            {{ $reservation->reservation->number_of_people }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($reservation->reservation->status === 'confirmed')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                                ✓ Confirmed
                                            </span>
                                        @elseif($reservation->reservation->status === 'pending')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                                ⏱ Pending
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            @if ($reservation->status === 'pending')
                                                <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition"
                                                    title="Approve">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </button>
                                            @endif
                                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                                title="Contact">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </button>
                                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"
                                                title="Cancel">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection
