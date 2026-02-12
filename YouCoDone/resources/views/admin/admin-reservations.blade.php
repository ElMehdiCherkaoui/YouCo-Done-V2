@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Reservations Dashboard</h1>
                <p class="text-xl text-gray-600">Monitor all platform reservations in real-time</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

                {{-- Total Reservations --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+100%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Total Reservations</p>
                    <p class="text-3xl font-display font-bold text-gray-900">{{ $totalReservations }}</p>
                </div>

                {{-- Active Today --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.05s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-green-600 text-sm font-semibold">+{{ (int)($confirmed/$totalReservations*100) }}%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Confirmed</p>
                    <p class="text-3xl font-display font-bold text-green-600">{{ $confirmed }}</p>
                </div>

                {{-- Pending --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.1s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-yellow-600 text-sm font-semibold">+{{ (int)($pending/$totalReservations*100) }}%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Pending</p>
                    <p class="text-3xl font-display font-bold text-yellow-600">{{ $pending }}</p>
                </div>

                {{-- Canceled --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                    style="animation-delay: 0.15s;">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <span class="text-red-600 text-sm font-semibold">+{{ (int)($canceled/$totalReservations*100) }}%</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-1">Canceled</p>
                    <p class="text-3xl font-display font-bold text-red-600">{{ $canceled }}</p>
                </div>

            </div>


            <!-- Filters -->


            <!-- Reservations Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden animate-slide-in"
                style="animation-delay: 0.25s;">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Client</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Restaurant</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Date & Time</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Guests</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Payment</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($reservations as $reservation)
                                <tr class="hover:bg-gray-50 transition">

                                    {{-- Reservation ID --}}
                                    <td class="px-6 py-4">
                                        <span class="font-mono text-sm text-gray-600">
                                            #RES-{{ str_pad($reservation->id, 5, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </td>

                                    {{-- Client --}}
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="font-semibold text-gray-900">
                                                {{ $reservation->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                {{ $reservation->user->email }}
                                            </p>
                                        </div>
                                    </td>

                                    {{-- Restaurant --}}
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="font-semibold text-gray-900">
                                                {{ $reservation->restaurant->name }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                {{ $reservation->restaurant->city }}
                                            </p>
                                        </div>
                                    </td>

                                    {{-- Date & Time --}}
                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="font-semibold text-gray-900">
                                                {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('M d, Y') }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                {{ $reservation->time_solt }}
                                            </p>
                                        </div>
                                    </td>

                                    {{-- Number of people --}}
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                                            {{ $reservation->number_of_people }}
                                        </span>
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4">
                                        @if ($reservation->status === 'confirmed')
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                                Confirmed
                                            </span>
                                        @elseif($reservation->status === 'pending')
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        @elseif($reservation->status === 'completed')
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                                                Completed
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                                Canceled
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($reservation->payment)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                                €{{ number_format($reservation->payment->amount, 2) }}
                                            </span>
                                        @else
                                            <span class="text-sm text-gray-400">
                                                No payment
                                            </span>
                                        @endif
                                    </td>


                                    {{-- Actions --}}
                                    <td class="px-6 py-4 text-right">
                                        <a href="" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                            title="View Details">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7
                                                                  -1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-6 text-center text-gray-500">
                                        No reservations found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <!-- Pagination -->



                <div class="border-t border-gray-200 px-6 py-4 flex items-center justify-between">
                    <div>
                        {{ $reservations->links() }}
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
