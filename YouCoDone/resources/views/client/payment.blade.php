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

        .payment-method {
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .payment-method.selected {
            border-color: #f97316;
            background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
        }
    </style>

    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Security Badge -->
            <div class="text-center mb-8 animate-slide-in">
                <div
                    class="inline-flex items-center px-4 py-2 bg-green-50 border border-green-200 rounded-full text-green-700 text-sm font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Secure Payment - SSL Encrypted
                </div>
            </div>

            <!-- Header -->
            <div class="text-center mb-10 animate-slide-in">
                <h1 class="text-5xl font-bold text-gray-900 mb-3">Complete Your Reservation</h1>
                <p class="text-xl text-gray-600">Just one more step to confirm your table</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Payment Form -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Reservation Details -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Reservation Details</h2>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Date</p>
                                    <p class="font-bold text-gray-900">{{ $reservation->date ?? 'Friday, Dec 15, 2024' }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Time</p>
                                    <p class="font-bold text-gray-900">{{ $reservation->time ?? '19:30' }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Party Size</p>
                                    <p class="font-bold text-gray-900">{{ $reservation->party_size ?? '4' }} people</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Restaurant</p>
                                    <p class="font-bold text-gray-900">{{ $restaurant->name ?? 'Restaurant Name' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Selection -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in"
                        style="animation-delay: 0.1s;">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Select Payment Method</h2>

                        <div class="space-y-4">


                            <!-- PayPal -->
                            <div class="payment-method border-2 border-gray-200 rounded-xl p-6 cursor-pointer"
                                onclick="selectPaymentMethod('paypal', this)">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.067 8.478c.492.88.556 2.014.3 3.327-.74 3.806-3.276 5.12-6.514 5.12h-.5a.805.805 0 00-.794.68l-.04.22-.63 3.993-.028.15a.804.804 0 01-.794.679H7.72a.483.483 0 01-.477-.558L7.418 21h1.518l.95-6.02h1.385c4.678 0 7.75-2.203 8.796-6.502z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-gray-900">PayPal</h3>
                                            <p class="text-sm text-gray-600">Fast & secure payment</p>
                                        </div>
                                    </div>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal"
                                        class="h-8">
                                </div>
                            </div>

                            <!-- Stripe -->
                            <div class="payment-method border-2 border-gray-200 rounded-xl p-6 cursor-pointer"
                                onclick="selectPaymentMethod('stripe', this)">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.976 9.15c-2.172-.806-3.356-1.426-3.356-2.409 0-.831.683-1.305 1.901-1.305 2.227 0 4.515.858 6.09 1.631l.89-5.494C18.252.975 15.697 0 12.165 0 9.667 0 7.589.654 6.104 1.872 4.56 3.147 3.757 4.992 3.757 7.218c0 4.039 2.467 5.76 6.476 7.219 2.585.92 3.445 1.574 3.445 2.583 0 .98-.84 1.545-2.354 1.545-1.875 0-4.965-.921-6.99-2.109l-.9 5.555C5.175 22.99 8.385 24 11.714 24c2.641 0 4.843-.624 6.328-1.813 1.664-1.305 2.525-3.236 2.525-5.732 0-4.128-2.524-5.851-6.594-7.305h.003z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-gray-900">Stripe</h3>
                                            <p class="text-sm text-gray-600">Secure checkout</p>
                                        </div>
                                    </div>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Stripe_Logo%2C_revised_2016.svg"
                                        alt="Stripe" class="h-8">
                                </div>
                            </div>
                        </div>
                    </div>

      

                    <!-- Terms & Conditions -->
                    <div class="bg-gray-50 rounded-2xl border border-gray-200 p-6 animate-slide-in"
                        style="animation-delay: 0.3s;">
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox"
                                class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500 mt-0.5"
                                required>
                            <span class="ml-3 text-sm text-gray-700">
                                I agree to the <a href="#" class="text-orange-600 font-semibold hover:underline">Terms
                                    & Conditions</a> and <a href="#"
                                    class="text-orange-600 font-semibold hover:underline">Cancellation
                                    Policy</a>. I understand that a deposit of €20.00 is required to confirm this
                                reservation.
                            </span>
                        </label>
                    </div>

                </div>

                <!-- Payment Summary Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">

                        <!-- Order Summary -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in"
                            style="animation-delay: 0.4s;">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Payment Summary</h3>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Reservation Deposit</span>
                                    <span class="font-semibold text-gray-900">€20.00</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Service Fee</span>
                                    <span class="font-semibold text-gray-900">€2.00</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-600">Processing Fee</span>
                                    <span class="font-semibold text-gray-900">€0.50</span>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <div class="flex items-center justify-between">
                                    <span class="text-lg font-bold text-gray-900">Total Amount</span>
                                    <span class="text-2xl font-bold text-orange-600">€22.50</span>
                                </div>
                            </div>

                            <div class="mt-6 bg-green-50 border border-green-200 rounded-lg p-4">
                                <p class="text-sm text-green-800">
                                    <strong>Refundable:</strong> Full refund if canceled 24 hours before reservation time.
                                </p>
                            </div>
                        </div>

                        <!-- Pay Button -->
                        <form action="{{ route('client-paymentSuccess') }}" method="GET">
                            <button type="submit"
                                class="w-full py-4 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl font-bold text-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-200 animate-slide-in"
                                style="animation-delay: 0.5s;">
                                Pay €22.50
                            </button>
                        </form>


                        <!-- Security Badges -->
                        <div class="bg-gray-50 rounded-2xl border border-gray-200 p-6 animate-slide-in"
                            style="animation-delay: 0.6s;">
                            <h4 class="font-bold text-gray-900 mb-4">Secure Payment</h4>
                            <div class="space-y-3 text-sm text-gray-700">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    256-bit SSL encryption
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    PCI DSS compliant
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Your data is protected
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        let selectedPaymentMethod = 'card';

        function selectPaymentMethod(method, element) {
            // Remove previous selection
            document.querySelectorAll('.payment-method').forEach(pm => {
                pm.classList.remove('selected');
            });

            // Add selection
            element.classList.add('selected');
            selectedPaymentMethod = method;

            // Show/hide card form
            const cardForm = document.getElementById('card-form');
            if (method === 'card') {
                cardForm.style.display = 'block';
            } else {
                cardForm.style.display = 'none';
            }
        }

        function processPayment() {
            // Show loading state
            event.target.disabled = true;
            event.target.innerHTML =
                '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

            // Simulate payment processing
            setTimeout(() => {
                // In real app, this would process payment and redirect to confirmation
                // window.location.href = `/reservations/${reservationId}/confirmation`;
                alert('Payment processed successfully! Redirecting to confirmation page...');

                event.target.disabled = false;
                event.target.innerHTML = 'Pay €22.50';
            }, 2000);
        }
    </script>
@endsection
