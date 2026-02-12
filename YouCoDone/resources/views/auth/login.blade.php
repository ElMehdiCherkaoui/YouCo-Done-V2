<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'BookMyTable') }} - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .btn-hover {
            transition: all 0.2s ease;
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 via-white to-pink-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="text-5xl text-purple-600 mb-4">
                    <i class="fas fa-utensils"></i>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">BookMyTable</h1>
                <p class="text-gray-600">Welcome back! Sign in to your account</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                    <p class="font-semibold text-red-700 mb-2">
                        <i class="fas fa-exclamation-circle mr-2"></i>Login Failed
                    </p>
                    @foreach ($errors->all() as $error)
                        <p class="text-red-600 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg">
                    <p class="text-green-700 text-sm">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('status') }}
                    </p>
                </div>
            @endif

            <!-- Login Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <!-- Email -->
                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 font-semibold mb-3">
                                <i class="fas fa-envelope text-purple-600 mr-2"></i>Email Address
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none transition"
                                placeholder="john@example.com">
                            @error('email')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 font-semibold mb-3">
                                <i class="fas fa-lock text-purple-600 mr-2"></i>Password
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none transition"
                                    placeholder="••••••••">
                                <button type="button" onclick="togglePasswordVisibility()" class="absolute right-4 top-3 text-gray-500 hover:text-gray-700 transition">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between mb-8">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-purple-600 focus:ring-purple-600">
                                <span class="ml-2 text-gray-700 font-medium">Remember me</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-purple-600 hover:text-purple-700 font-medium transition">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700 transition btn-hover flex items-center justify-center space-x-2 mb-4">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Sign In</span>
                        </button>

                        <!-- Alternative Login Options -->
                        <div class="relative mb-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <button type="button" class="py-2 px-4 border-2 border-gray-300 rounded-lg hover:bg-gray-50 transition flex items-center justify-center space-x-2">
                                <i class="fab fa-google text-red-500"></i>
                                <span class="text-sm font-medium text-gray-700">Google</span>
                            </button>
                            <button type="button" class="py-2 px-4 border-2 border-gray-300 rounded-lg hover:bg-gray-50 transition flex items-center justify-center space-x-2">
                                <i class="fab fa-facebook text-blue-600"></i>
                                <span class="text-sm font-medium text-gray-700">Facebook</span>
                            </button>
                        </div>
                    </form>

                    <!-- Sign Up Link -->
                    <div class="mt-8 text-center border-t border-gray-200 pt-6">
                        <p class="text-gray-600">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-purple-600 font-bold hover:underline">Create one</a>
                        </p>
                    </div>
                </div>

                <!-- Footer Info -->
                <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-center space-x-4 text-xs text-gray-500">
                        <a href="#" class="hover:text-gray-700 transition">Privacy</a>
                        <span>•</span>
                        <a href="#" class="hover:text-gray-700 transition">Terms</a>
                        <span>•</span>
                        <a href="#" class="hover:text-gray-700 transition">Support</a>
                    </div>
                </div>
            </div>

            <!-- Demo Info -->
            <div class="mt-8 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                <p class="text-blue-700 text-sm">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Demo:</strong> Use test@example.com / password
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const input = document.getElementById('password');
            const btn = event.target.closest('button');
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = 'password';
                btn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        // Add some nice keyboard interactions
        document.getElementById('loginForm').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                this.submit();
            }
        });
    </script>
</body>
</html>