@extends('layouts.app')

@section('content')
<div class="py-12 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8 animate-slide-in">
            <h1 class="text-4xl font-display font-bold text-gray-900 mb-2">Profile Settings</h1>
            <p class="text-gray-600">Manage your account information and preferences</p>
        </div>

        <div class="space-y-6">
            <!-- Profile Information -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.1s;">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-display font-bold text-gray-900">Profile Information</h2>
                        <p class="text-sm text-gray-600">Update your account's profile information and email address</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-sm font-semibold text-gray-700 mb-2" />
                        <x-text-input id="name" 
                            name="name" 
                            type="text" 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200" 
                            :value="old('name', $user->name)" 
                            required 
                            autofocus 
                            autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700 mb-2" />
                        <x-text-input id="email" 
                            name="email" 
                            type="email" 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent transition duration-200" 
                            :value="old('email', $user->email)" 
                            required 
                            autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-3">
                                <p class="text-sm text-gray-700">
                                    Your email address is unverified.
                                    <button form="send-verification" class="text-orange-600 hover:text-orange-700 font-semibold">
                                        Click here to re-send the verification email.
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-sm text-green-600 font-medium">
                                        A new verification link has been sent to your email address.
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Role Display -->
                    <div>
                        <x-input-label for="role" :value="__('Role')" class="text-sm font-semibold text-gray-700 mb-2" />
                        <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                            <span class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-full bg-orange-100 text-orange-700">
                                {{ ucfirst($user->role) }}
                            </span>
                            <p class="text-xs text-gray-500 mt-2">Your role cannot be changed. Contact support if needed.</p>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                            Save Changes
                        </button>

                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-medium">
                                Saved successfully!
                            </p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Update Password -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 animate-slide-in" style="animation-delay: 0.2s;">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-display font-bold text-gray-900">Update Password</h2>
                        <p class="text-sm text-gray-600">Ensure your account is using a long, random password to stay secure</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div>
                        <x-input-label for="current_password" :value="__('Current Password')" class="text-sm font-semibold text-gray-700 mb-2" />
                        <x-text-input id="current_password" 
                            name="current_password" 
                            type="password" 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <!-- New Password -->
                    <div>
                        <x-input-label for="password" :value="__('New Password')" class="text-sm font-semibold text-gray-700 mb-2" />
                        <x-text-input id="password" 
                            name="password" 
                            type="password" 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-semibold text-gray-700 mb-2" />
                        <x-text-input id="password_confirmation" 
                            name="password_confirmation" 
                            type="password" 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Save Button -->
                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-indigo-500 text-white rounded-lg font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition duration-200">
                            Update Password
                        </button>

                        @if (session('status') === 'password-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-medium">
                                Password updated successfully!
                            </p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Delete Account -->
            <div class="bg-white rounded-2xl shadow-sm border border-red-100 p-8 animate-slide-in" style="animation-delay: 0.3s;">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-500 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-display font-bold text-gray-900">Delete Account</h2>
                        <p class="text-sm text-gray-600">Permanently delete your account and all associated data</p>
                    </div>
                </div>

                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <p class="text-sm text-red-800">
                        <strong>Warning:</strong> Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                    </p>
                </div>

                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition duration-200">
                    Delete Account
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('DELETE')

        <h2 class="text-2xl font-display font-bold text-gray-900 mb-4">
            Are you sure you want to delete your account?
        </h2>

        <p class="text-gray-600 mb-6">
            Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
        </p>

        <div class="mb-6">
            <x-input-label for="password" value="Password" class="sr-only" />
            <x-text-input
                id="password"
                name="password"
                type="password"
                class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                placeholder="Enter your password"
            />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end gap-3">
            <button type="button" x-on:click="$dispatch('close')" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition duration-200">
                Cancel
            </button>
            <button type="submit" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition duration-200">
                Delete Account
            </button>
        </div>
    </form>
</x-modal>
@endsection