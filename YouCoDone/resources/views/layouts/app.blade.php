<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RestaurantHub') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,700|playfair-display:700,900" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primary: #FF6B35;
            --color-primary-dark: #E85A2A;
            --color-secondary: #2C3E50;
            --color-accent: #F7B731;
            --color-bg: #FAFBFC;
            --color-card: #FFFFFF;
            --color-text: #1A202C;
            --color-text-light: #64748B;
            --color-border: #E2E8F0;
            --color-success: #10B981;
            --color-error: #EF4444;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--color-bg);
            color: var(--color-text);
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-primary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideInUp 0.6s ease-out forwards;
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 backdrop-blur-sm bg-white/95">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <a href="" class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <span class="font-display text-2xl font-bold text-gray-900">RestaurantHub</span>
                        </a>

                        <!-- Navigation Links -->
                        <div class="hidden md:flex space-x-8 ml-12">
                            @auth
                                @if (auth()->user()->role === 'client')
                                    <a href="{{ route('dashboard') }}"
                                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Home
                                    </a>
                                    <a href="{{ route('client.restaurant') }}"
                                        class="nav-link {{ request()->routeIs('client.restaurant') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Restaurants
                                    </a>
                                    <a href="{{ route('client.reservation') }}"
                                        class="nav-link {{ request()->routeIs('client.reservation') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        My Reservation
                                    </a>
                                @elseif(auth()->user()->role === 'restaurant')
                                    <a href="{{ route('dashboard') }}"
                                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Dashboard
                                    </a>
                                    <a href="{{ route('restaurateur.restaurants') }}"
                                        class="nav-link {{ request()->routeIs('restaurateur.restaurants') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        My Restaurants
                                    </a>
                                    <a href="{{ route('restaurateur.reservations') }}"
                                        class="nav-link {{ request()->routeIs('restaurateur.reservations') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Reservations
                                    </a>
                                    <a href="{{ route('restaurateur.notification') }}"
                                        class="nav-link {{ request()->routeIs('restaurateur.notification') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Notification
                                    </a>
                                @elseif(auth()->user()->role === 'admin')
                                    <a href="{{ route('dashboard') }}"
                                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Dashboard
                                    </a>
                                    <a href="{{ route('admin.users') }}"
                                        class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Users
                                    </a>
                                    <a href="{{ route('admin.restaurants') }}"
                                        class="nav-link {{ request()->routeIs('admin.restaurants') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Restaurants
                                    </a>
                                    <a href="{{ route('admin.reservation') }}"
                                        class="nav-link {{ request()->routeIs('admin.reservation') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Reservation
                                    </a>
                                    <a href="{{ route('admin.payments') }}"
                                        class="nav-link {{ request()->routeIs('admin.payments') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Payments
                                    </a>
                                    <a href="{{ route('admin.statistics') }}"
                                        class="nav-link {{ request()->routeIs('admin.statistics') ? 'active' : '' }} text-gray-700 hover:text-orange-600 px-3 py-2 text-sm font-medium">
                                        Statistics
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="flex items-center space-x-4">
                        @auth
                            <!-- Profile Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="flex items-center space-x-3 text-sm focus:outline-none">
                                    <div
                                        class="w-9 h-9 rounded-full bg-gradient-to-br from-orange-400 to-pink-500 flex items-center justify-center text-white font-semibold">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <span
                                        class="hidden md:block text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="open" @click.away="open = false" x-transition
                                    class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-lg border border-gray-100 py-2"
                                    style="display: none;">
                                    <div class="px-4 py-3 border-b border-gray-100">
                                        <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                                        <span
                                            class="inline-block mt-1 px-2 py-1 text-xs font-medium rounded-full bg-orange-100 text-orange-700">
                                            {{ ucfirst(auth()->user()->role) }}
                                        </span>
                                    </div>
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        Profile Settings
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                            Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-700 hover:text-orange-600 px-4 py-2 text-sm font-medium">
                                Sign In
                            </a>
                            <a href="{{ route('register') }}"
                                class="btn-primary text-white px-5 py-2 rounded-lg text-sm font-medium">
                                Get Started
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center space-x-3 mb-4">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <span class="font-display text-2xl font-bold">RestaurantHub</span>
                        </div>
                        <p class="text-gray-400 text-sm max-w-md">
                            Discover and manage the best dining experiences. Your gateway to exceptional culinary
                            journeys.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-4">Quick Links</h3>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="#" class="hover:text-white">About Us</a></li>
                            <li><a href="#" class="hover:text-white">Contact</a></li>
                            <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-4">Connect</h3>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="#" class="hover:text-white">Facebook</a></li>
                            <li><a href="#" class="hover:text-white">Instagram</a></li>
                            <li><a href="#" class="hover:text-white">Twitter</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
                    <p>&copy; {{ date('Y') }} RestaurantHub. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>

</html>
