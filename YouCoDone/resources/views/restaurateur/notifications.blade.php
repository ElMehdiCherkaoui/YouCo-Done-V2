@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-10 animate-slide-in">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Notifications</h1>
                        <p class="text-xl text-gray-600">Stay updated on all your restaurant activities</p>
                    </div>

                </div>
            </div>



            <!-- Notifications List -->
            <div class="space-y-4">

                @foreach ($notifications as $index => $notification)
                    <div
                        class="notification-item bg-white rounded-2xl shadow-sm border-2  overflow-hidden hover:shadow-md transition duration-300 animate-slide-in">

                        <div class="p-6">
                            <div class="flex items-start space-x-4">

                                <!-- Icon -->
                                <div class="flex-shrink-0">


                                    <div
                                        class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">

                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between mb-2">


                                    </div>

                                    <p class="text-gray-600 mb-3">
                                        {{ $notification->message }}
                                    </p>

                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </span>

                                        <div class="flex items-center space-x-3">

                                            @if ($notification->reservation_id)
                                                <a href=""
                                                    class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                                                    View Details
                                                </a>
                                            @endif


                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                @endforeach

            </div>


            <!-- Load More -->
            <div class="text-center mt-8">
                <button
                    class="px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                    Load More Notifications
                </button>
            </div>

        </div>
    </div>


@endsection
