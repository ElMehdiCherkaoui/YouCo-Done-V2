@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <form method="POST"
            action="{{ isset($restaurant) && $restaurant->exists ? route('restaurateur.restaurant.update', $restaurant->id) : route('restaurateur.store') }}"
            enctype="multipart/form-data" class="max-w-6xl mx-auto">

            @csrf

            <!-- Basic Information Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                <div class="flex items-center space-x-4 mb-6">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Restaurant Information</h2>
                        <p class="text-sm text-gray-600">Basic details about your restaurant</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Restaurant Name -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Restaurant Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', $restaurant->name ?? '') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                            placeholder="e.g., The Golden Fork">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Cuisine Type -->
                    <div class="md:col-span-2">
                        <label for="cuisine_type" class="block text-sm font-semibold text-gray-700 mb-2">
                            Cuisine Type <span class="text-red-500">*</span>
                        </label>
                        <select id="cuisine_type" name="cuisine_type" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200">
                            <option value="">Select cuisine type</option>
                            <option value="Italian"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'italian' ? 'selected' : '' }}>
                                Italian</option>
                            <option value="Japanese"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'japanese' ? 'selected' : '' }}>
                                Japanese</option>
                            <option value="Mexican"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'mexican' ? 'selected' : '' }}>
                                Mexican</option>
                            <option value="Chinese"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'chinese' ? 'selected' : '' }}>
                                Chinese</option>
                            <option value="American"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'american' ? 'selected' : '' }}>
                                American</option>
                            <option value="French"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'french' ? 'selected' : '' }}>
                                French</option>
                            <option value="Indian"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'indian' ? 'selected' : '' }}>
                                Indian</option>
                            <option value="Thai"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'thai' ? 'selected' : '' }}>
                                Thai
                            </option>
                            <option value="Mediterranean"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'mediterranean' ? 'selected' : '' }}>
                                Mediterranean</option>
                            <option value="International"
                                {{ old('cuisine_type', $restaurant->cuisine_type ?? '') === 'international' ? 'selected' : '' }}>
                                International</option>
                        </select>
                        @error('cuisine_type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200"
                            placeholder="Describe your restaurant, ambiance, signature dishes, and what makes it special...">{{ old('description', $restaurant->description ?? '') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Location & Contact Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                <div class="flex items-center space-x-4 mb-6">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Location & Contact</h2>
                        <p class="text-sm text-gray-600">Help customers find and reach you</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Address -->
                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                            Full Address <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="address" name="address"
                            value="{{ old('address', $restaurant->address ?? '') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                            placeholder="123 Main Street, City, State, ZIP">
                        @error('address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city" class="block text-sm font-semibold text-gray-700 mb-2">
                            City <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="city" name="city"
                            value="{{ old('city', $restaurant->city ?? '') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                            placeholder="e.g., New York">
                        @error('city')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="number" class="block text-sm font-semibold text-gray-700 mb-2">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="number" name="number"
                            value="{{ old('number', $restaurant->number ?? '') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                            placeholder="(555) 123-4567">
                        @error('number')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address
                        </label>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', $restaurant->email ?? '') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                            placeholder="info@restaurant.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Opening Hours -->
                    <div>
                        <label for="opening_hours" class="block text-sm font-semibold text-gray-700 mb-2">
                            Opening Hours <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="opening_hours" name="opening_hours"
                            value="{{ old('opening_hours', $restaurant->opening_hours ?? '') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                            placeholder="e.g., 10:00 AM - 10:00 PM">
                        @error('opening_hours')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Capacity -->
                    <div>
                        <label for="capacity" class="block text-sm font-semibold text-gray-700 mb-2">
                            Capacity <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="capacity" name="capacity"
                            value="{{ old('capacity', $restaurant->capacity ?? '') }}" required min="1"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                            placeholder="e.g., 50">
                        @error('capacity')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Restaurant Image -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                <div class="flex items-center space-x-4 mb-6">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Restaurant Image URL</h2>
                        <p class="text-sm text-gray-600">Paste the URL of a beautiful photo of your restaurant</p>
                    </div>
                </div>

                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                        Image URL
                    </label>
                    <input type="url" id="image" name="image"
                        value="{{ old('image', $restaurant->image ?? '') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                        placeholder="https://example.com/restaurant.jpg">
                    <p class="mt-2 text-sm text-gray-600">Recommended: JPG or PNG image, accessible via a valid URL</p>
                    @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>







            <!-- Additional Settings -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-8">
                <div class="flex items-center space-x-4 mb-6">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Status</h2>
                        <p class="text-sm text-gray-600">Configure restaurant visibility</p>
                    </div>
                </div>

                <div>
                    <label for="isActive" class="block text-sm font-semibold text-gray-700 mb-2">
                        Restaurant Status <span class="text-red-500">*</span>
                    </label>
                    <select id="isActive" name="isActive" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200">
                        <option value="1" {{ old('isActive', $restaurant->isActive ?? 1) == 1 ? 'selected' : '' }}>
                            Active - Visible to customers</option>
                        <option value="0" {{ old('isActive', $restaurant->isActive ?? 1) == 0 ? 'selected' : '' }}>
                            Inactive - Hidden from customers</option>
                    </select>
                    @error('isActive')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200 bg-white rounded-2xl p-8">
                <a href="#"
                    class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="px-8 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                    {{ isset($restaurant) && $restaurant->exists ? 'Update Restaurant' : 'Create Restaurant' }}
                </button>
            </div>
        </form>
    </div>
@endsection
