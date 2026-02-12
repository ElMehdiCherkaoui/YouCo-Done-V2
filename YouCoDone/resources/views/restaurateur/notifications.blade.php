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
                <button class="px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-lg font-semibold transition">
                    Mark all as read
                </button>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Unread</p>
                        <p class="text-3xl font-bold text-orange-600">12</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.05s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">Today</p>
                        <p class="text-3xl font-bold text-blue-600">8</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.1s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">This Week</p>
                        <p class="text-3xl font-bold text-purple-600">45</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 animate-slide-in" style="animation-delay: 0.15s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">All Time</p>
                        <p class="text-3xl font-bold text-gray-900">234</p>
                    </div>
                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-2 mb-8 inline-flex animate-slide-in" style="animation-delay: 0.2s;">
            <button class="tab-btn active px-6 py-3 rounded-lg font-semibold text-sm transition" onclick="filterNotifications('all')">
                All
            </button>
            <button class="tab-btn px-6 py-3 rounded-lg font-semibold text-sm transition" onclick="filterNotifications('unread')">
                Unread
            </button>
            <button class="tab-btn px-6 py-3 rounded-lg font-semibold text-sm transition" onclick="filterNotifications('reservations')">
                Reservations
            </button>
            <button class="tab-btn px-6 py-3 rounded-lg font-semibold text-sm transition" onclick="filterNotifications('reviews')">
                Reviews
            </button>
            <button class="tab-btn px-6 py-3 rounded-lg font-semibold text-sm transition" onclick="filterNotifications('system')">
                System
            </button>
        </div>

        <!-- Notifications List -->
        <div class="space-y-4">
            
            @php
            $notifications = [
                ['type' => 'reservation', 'unread' => true, 'icon' => 'bg-green-100 text-green-600', 'title' => 'New Reservation', 'message' => 'John Doe booked a table for 4 people on Dec 20, 2024 at 19:30', 'time' => '5 min ago', 'action' => 'View Details'],
                ['type' => 'reservation', 'unread' => true, 'icon' => 'bg-blue-100 text-blue-600', 'title' => 'Reservation Confirmed', 'message' => 'Marie Laurent\'s reservation for 2 people has been confirmed', 'time' => '15 min ago', 'action' => 'View Details'],
                ['type' => 'reservation', 'unread' => true, 'icon' => 'bg-yellow-100 text-yellow-600', 'title' => 'Special Request', 'message' => 'Pierre Martin requested a window seat for his reservation on Dec 22', 'time' => '1 hour ago', 'action' => 'View Request'],
                ['type' => 'reservation', 'unread' => false, 'icon' => 'bg-red-100 text-red-600', 'title' => 'Cancellation', 'message' => 'Sophie Dubois cancelled her reservation for tonight', 'time' => '2 hours ago', 'action' => 'View Details'],
                ['type' => 'review', 'unread' => true, 'icon' => 'bg-purple-100 text-purple-600', 'title' => 'New Review', 'message' => 'You received a 5-star review from Luc Bernard', 'time' => '3 hours ago', 'action' => 'Read Review'],
                ['type' => 'reservation', 'unread' => false, 'icon' => 'bg-orange-100 text-orange-600', 'title' => 'Reminder', 'message' => 'You have 8 reservations scheduled for tomorrow', 'time' => '5 hours ago', 'action' => 'View Schedule'],
                ['type' => 'system', 'unread' => false, 'icon' => 'bg-indigo-100 text-indigo-600', 'title' => 'Payment Received', 'message' => 'Payment of €22.50 received for reservation #BMT-00123', 'time' => '6 hours ago', 'action' => 'View Transaction'],
                ['type' => 'reservation', 'unread' => false, 'icon' => 'bg-green-100 text-green-600', 'title' => 'New Reservation', 'message' => 'Emma Wilson booked a table for 6 people on Dec 28, 2024', 'time' => '1 day ago', 'action' => 'View Details'],
                ['type' => 'review', 'unread' => false, 'icon' => 'bg-purple-100 text-purple-600', 'title' => 'New Review', 'message' => 'You received a 4-star review from Thomas Green', 'time' => '1 day ago', 'action' => 'Read Review'],
                ['type' => 'system', 'unread' => false, 'icon' => 'bg-blue-100 text-blue-600', 'title' => 'Weekly Report', 'message' => 'Your weekly performance report is ready to view', 'time' => '2 days ago', 'action' => 'View Report'],
            ];
            @endphp

            @foreach($notifications as $index => $notification)
            <div class="notification-item bg-white rounded-2xl shadow-sm border-2 {{ $notification['unread'] ? 'border-orange-200 bg-orange-50/30' : 'border-gray-100' }} overflow-hidden hover:shadow-md transition duration-300 animate-slide-in" 
                 style="animation-delay: {{ 0.05 * ($index + 1) }}s;"
                 data-type="{{ $notification['type'] }}"
                 data-read="{{ $notification['unread'] ? 'unread' : 'read' }}">
                <div class="p-6">
                    <div class="flex items-start space-x-4">
                        
                        <!-- Icon -->
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 {{ $notification['icon'] }} rounded-xl flex items-center justify-center">
                                @if($notification['type'] === 'reservation')
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                @elseif($notification['type'] === 'review')
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @else
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                @endif
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between mb-2">
                                <h3 class="text-lg font-bold text-gray-900">{{ $notification['title'] }}</h3>
                                @if($notification['unread'])
                                    <span class="ml-2 flex-shrink-0 w-3 h-3 bg-orange-500 rounded-full"></span>
                                @endif
                            </div>
                            <p class="text-gray-600 mb-3">{{ $notification['message'] }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">{{ $notification['time'] }}</span>
                                <div class="flex items-center space-x-3">
                                    <button class="text-blue-600 hover:text-blue-700 font-semibold text-sm">
                                        {{ $notification['action'] }}
                                    </button>
                                    @if($notification['unread'])
                                        <button class="text-gray-600 hover:text-gray-700 text-sm" onclick="markAsRead(this)">
                                            Mark as read
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Actions Menu -->
                        <div class="flex-shrink-0">
                            <button class="p-2 hover:bg-gray-100 rounded-lg transition">
                                <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Load More -->
        <div class="text-center mt-8">
            <button class="px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:border-orange-500 hover:bg-orange-50 transition duration-200">
                Load More Notifications
            </button>
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
function filterNotifications(type) {
    // Update active tab
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');
    
    // Filter notifications
    const items = document.querySelectorAll('.notification-item');
    
    items.forEach(item => {
        const itemType = item.dataset.type;
        const itemRead = item.dataset.read;
        
        if (type === 'all') {
            item.style.display = 'block';
        } else if (type === 'unread') {
            item.style.display = itemRead === 'unread' ? 'block' : 'none';
        } else {
            item.style.display = itemType === type ? 'block' : 'none';
        }
    });
}

function markAsRead(button) {
    const notification = button.closest('.notification-item');
    
    // Update UI
    notification.classList.remove('border-orange-200', 'bg-orange-50/30');
    notification.classList.add('border-gray-100');
    notification.dataset.read = 'read';
    
    // Remove unread indicator
    const unreadDot = notification.querySelector('.bg-orange-500');
    if (unreadDot) {
        unreadDot.remove();
    }
    
    // Remove "Mark as read" button
    button.remove();
    
    // Update unread count (in real app, this would be done via AJAX)
    const unreadCount = document.querySelector('.text-orange-600');
    if (unreadCount) {
        const currentCount = parseInt(unreadCount.textContent);
        unreadCount.textContent = Math.max(0, currentCount - 1);
    }
}
</script>

@endsection
