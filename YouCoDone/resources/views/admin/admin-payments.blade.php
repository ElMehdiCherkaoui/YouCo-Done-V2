@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Payments Dashboard</h1>
                <p class="text-xl text-gray-600">Track and monitor all platform transactions</p>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">


                <div
                    class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg p-6 text-white animate-slide-in">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <p class="text-white/80 text-sm mb-1">Total Revenue</p>
                    <p class="text-4xl font-bold">€{{ number_format($totalRevenue, 2) }}</p>

                </div>


            </div>




            <!-- Payments Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden animate-slide-in"
                style="animation-delay: 0.35s;">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Transaction ID
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Reservation</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Client</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Restaurant</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Amount</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Method</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase">Date</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($payments as $payment)
                                <tr class="hover:bg-gray-50 transition">


                                    <td class="px-6 py-4">
                                        <span class="font-mono text-sm text-gray-900">
                                            RST-{{ $payment->id }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <a href="#" class="font-semibold text-blue-600 hover:text-blue-700">
                                            #RES-{{ $payment->reservation->id }}
                                        </a>
                                    </td>


                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $payment->reservation->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-600">{{ $payment->reservation->user->email }}</p>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-gray-900">
                                            {{ $payment->reservation->restaurant->name }}</p>
                                    </td>

                                    <td class="px-6 py-4">
                                        <p class="font-bold text-gray-900">€{{ number_format($payment->amount, 2) }}</p>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            @php
                                                $method = $payment->type;
                                            @endphp

                                            @if (strpos($method, 'Visa') !== false)
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png"
                                                    alt="Visa" class="h-4">
                                            @elseif(strpos($method, 'PayPal') !== false)
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg"
                                                    alt="PayPal" class="h-4">
                                            @elseif(strpos($method, 'Mastercard') !== false)
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg"
                                                    alt="Mastercard" class="h-4">
                                            @else
                                                <span class="text-gray-600 text-sm">{{ $method }}</span>
                                            @endif

                                            <span class="text-sm text-gray-600">{{ $method }}</span>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        @if ($payment->status === 'success')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                                Success
                                            </span>
                                        @elseif($payment->status === 'pending')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        @elseif($payment->status === 'failed')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                                Failed
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-purple-100 text-purple-800">
                                                Refunded
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4">
                                        <div>
                                            <p class="text-sm text-gray-900">
                                                {{ \Carbon\Carbon::parse($payment->created_at)->format('M d, Y') }}</p>
                                            <p class="text-xs text-gray-600">
                                                {{ \Carbon\Carbon::parse($payment->created_at)->format('H:i') }}</p>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-2">

                                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                                title="View Details">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>


                                            @if ($payment->status === 'success')
                                                <button class="p-2 text-orange-600 hover:bg-orange-50 rounded-lg transition"
                                                    title="Refund">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-4 text-center text-gray-500">
                                        No payments found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>


                <div class="border-t border-gray-200 px-6 py-4 flex items-center justify-between">
                    <div>
                        {{ $payments->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
