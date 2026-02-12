@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-10 animate-slide-in">
            <div class="flex items-center text-sm text-gray-600 mb-4">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-600">Dashboard</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('restaurateur.restaurants') }}" class="hover:text-orange-600">My Restaurants</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900 font-medium">Add New Restaurant</span>
            </div>
            <h1 class="text-5xl font-display font-bold text-gray-900 mb-3">Add New Restaurant</h1>
            <p class="text-xl text-gray-600">Fill in the details to list your restaurant on our platform</p>
        </div>

        <!-- Form -->
        <form action="" method="POST" enctype="multipart/form-data" class="animate-slide-in" style="animation-delay: 0.1s;">
            @csrf
            @include('restaurateur.form')
        </form>

        <!-- Tips Section -->
        <div class="mt-10 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl shadow-sm p-8 text-white animate-slide-in" style="animation-delay: 0.2s;">
            <h3 class="text-2xl font-display font-bold mb-4">💡 Tips for a Great Listing</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold mb-1">High-Quality Photos</h4>
                        <p class="text-white/80 text-sm">Use professional, well-lit images that showcase your restaurant's best features</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold mb-1">Detailed Description</h4>
                        <p class="text-white/80 text-sm">Tell your story, highlight specialties, and mention unique features</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold mb-1">Accurate Information</h4>
                        <p class="text-white/80 text-sm">Keep contact details and location information up to date</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold mb-1">Regular Updates</h4>
                        <p class="text-white/80 text-sm">Update your listing regularly to stay relevant and attract more customers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection