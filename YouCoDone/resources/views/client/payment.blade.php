@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-4xl mx-auto px-4">

            <h1 class="text-3xl font-bold text-center mb-10">Complete Your Reservation</h1>

            <!-- Reservation Details -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h2 class="text-xl font-semibold mb-4">Reservation Details</h2>
                <div class="grid grid-cols-2 gap-4 text-gray-700">
                    <div><strong>Date:</strong> {{ $reservation->reservation_date }}</div>
                    <div><strong>Time:</strong> {{ $reservation->time_solt }}</div>
                    <div><strong>Party Size:</strong> {{ $reservation->number_of_people }}</div>
                    <div><strong>Restaurant:</strong> {{ $restaurant->name }}</div>
                </div>
            </div>

            <!-- Payment Summary -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h2 class="text-xl font-semibold mb-4">Payment Summary</h2>
                <div class="flex justify-between mb-2"><span>Reservation
                        Deposit</span><span>€20.00 x {{ $reservation->number_of_people }} =
                        €{{ $reservation->number_of_people * 20 }}</span></div>
                <div class="flex justify-between mb-2"><span>Service Fee</span><span>€2.00</span></div>
                <div class="flex justify-between mb-4"><span>Processing Fee</span><span>€0.50</span></div>
                <div class="flex justify-between font-bold text-lg border-t pt-4">
                    <span>Total</span><span>€{{ $reservation->number_of_people * 20 + 2 + 0.55 }}</span>
                </div>
            </div>

            <!-- Terms -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <label class="flex items-center">
                    <input type="checkbox" id="terms" class="mr-2" required>
                    <span>I agree to the Terms & Conditions</span>
                </label>
            </div>

            <!-- PayPal -->
            <div class="bg-white shadow rounded-lg p-6">
                <div id="paypal-button-container"></div>
            </div>

        </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=EUR"></script>



    <script>
        paypal.Buttons({
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $reservation->number_of_people * 20 + 2 + 0.5 }}'
                        }
                    }]
                });
            },

            onApprove: (data, actions) => {
                return actions.order.capture().then(function() {
                    window.location.href =
                        "{{ route('client-paymentSuccess') }}?reservation={{ $reservation->id }}";

                });
            },

            onCancel: () => {
                window.location.href = "{{ route('client-paymentCancel') }}";
            }
        }).render('#paypal-button-container');
    </script>
@endsection
