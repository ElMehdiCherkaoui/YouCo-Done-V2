<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'BookMyTable') }} - Register</title>
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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-purple-50 via-white to-pink-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-2xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="text-5xl text-purple-600 mb-4">
                    <i class="fas fa-utensils"></i>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Join BookMyTable</h1>
                <p class="text-gray-600">Create your account and start booking amazing restaurants</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                    <p class="font-semibold text-red-700 mb-2">
                        <i class="fas fa-exclamation-circle mr-2"></i>Registration Error
                    </p>
                    @foreach ($errors->all() as $error)
                        <p class="text-red-600 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Main Form -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <!-- Step 1: Personal Info -->
                        <div class="step-form" id="step1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Personal Information</h3>

                            <!-- Name -->
                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 font-semibold mb-2">
                                    <i class="fas fa-user text-purple-600 mr-2"></i>Full Name
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none transition"
                                    placeholder="John Doe">
                                @error('name')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 font-semibold mb-2">
                                    <i class="fas fa-envelope text-purple-600 mr-2"></i>Email Address
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none transition"
                                    placeholder="john@example.com">
                                @error('email')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-6">
                                <label for="phone" class="block text-gray-700 font-semibold mb-2">
                                    <i class="fas fa-phone text-purple-600 mr-2"></i>Phone Number
                                </label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none transition"
                                    placeholder="+33 6 12 34 56 78">
                            </div>

                            <!-- City -->
                            <div class="mb-6">
                                <label for="city" class="block text-gray-700 font-semibold mb-2">
                                    <i class="fas fa-map-marker-alt text-purple-600 mr-2"></i>City
                                </label>
                                <input type="text" id="city" name="city" value="{{ old('city') }}"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none transition"
                                    placeholder="Paris">
                            </div>

                            <button type="button" onclick="nextStep(1)"
                                class="w-full bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700 transition btn-hover">
                                Continue <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>

                        <!-- Step 2: Role Selection -->
                        <div class="step-form hidden" id="step2">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">What's Your Role?</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <!-- Client Card -->
                                <div class="role-card p-8 rounded-2xl border-2 border-gray-300 cursor-pointer transition-smooth hover:border-blue-500 hover:shadow-lg"
                                    onclick="selectRole('client', this)">
                                    <div class="text-center mb-4">
                                        <div class="text-6xl text-blue-500 mb-4">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <h4 class="text-2xl font-bold text-gray-900">I'm a Client</h4>
                                    </div>
                                    <ul class="space-y-3 mb-6">
                                        <li class="flex items-center text-gray-700">
                                            <i class="fas fa-check text-green-500 mr-3"></i>Reserve restaurants
                                        </li>
                                        <li class="flex items-center text-gray-700">
                                            <i class="fas fa-check text-green-500 mr-3"></i>Save favorites
                                        </li>
                                        <li class="flex items-center text-gray-700">
                                            <i class="fas fa-check text-green-500 mr-3"></i>Read reviews
                                        </li>
                                    </ul>
                                    <input type="radio" name="role" value="client" class="hidden">
                                    <p class="text-center text-sm text-gray-500">For diners looking to book</p>
                                </div>

                                <!-- Restaurant Card -->
                                <div class="role-card p-8 rounded-2xl border-2 border-gray-300 cursor-pointer transition-smooth hover:border-orange-500 hover:shadow-lg"
                                    onclick="selectRole('restaurant', this)">
                                    <div class="text-center mb-4">
                                        <div class="text-6xl text-orange-500 mb-4">
                                            <i class="fas fa-store"></i>
                                        </div>
                                        <h4 class="text-2xl font-bold text-gray-900">I'm a Restaurant</h4>
                                    </div>
                                    <ul class="space-y-3 mb-6">
                                        <li class="flex items-center text-gray-700">
                                            <i class="fas fa-check text-green-500 mr-3"></i>Manage restaurant
                                        </li>
                                        <li class="flex items-center text-gray-700">
                                            <i class="fas fa-check text-green-500 mr-3"></i>Receive bookings
                                        </li>
                                        <li class="flex items-center text-gray-700">
                                            <i class="fas fa-check text-green-500 mr-3"></i>See analytics
                                        </li>
                                    </ul>
                                    <input type="radio" name="role" value="restaurant" class="hidden">
                                    <p class="text-center text-sm text-gray-500">For restaurant owners</p>
                                </div>
                            </div>

                            <div class="flex space-x-4">
                                <button type="button" onclick="prevStep(2)"
                                    class="flex-1 border-2 border-gray-300 text-gray-700 font-bold py-3 rounded-lg hover:bg-gray-50 transition">
                                    <i class="fas fa-arrow-left mr-2"></i>Back
                                </button>
                                <button type="button" onclick="nextStep(2)"
                                    class="flex-1 bg-purple-600 text-white font-bold py-3 rounded-lg hover:bg-purple-700 transition btn-hover">
                                    Continue <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Password -->
                        <div class="step-form hidden" id="step3">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Secure Your Account</h3>

                            <!-- Password -->
                            <div class="mb-6">
                                <label for="password" class="block text-gray-700 font-semibold mb-2">
                                    <i class="fas fa-lock text-purple-600 mr-2"></i>Password
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required
                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none transition"
                                        placeholder="Minimum 8 characters" oninput="checkPasswordStrength()">
                                    <button type="button" onclick="togglePasswordVisibility()"
                                        class="absolute right-4 top-3 text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>

                                <!-- Password Strength Indicator -->
                                <div class="mt-3">
                                    <div class="flex items-center justify-between mb-2">
                                        <label class="text-sm font-medium text-gray-700">Password Strength:</label>
                                        <span id="strengthText" class="text-sm font-semibold text-gray-600">Very
                                            Weak</span>
                                    </div>
                                    <div class="flex space-x-2">
                                        <div id="strength1"
                                            class="h-2 flex-1 bg-gray-300 rounded-full transition-colors duration-300">
                                        </div>
                                        <div id="strength2"
                                            class="h-2 flex-1 bg-gray-300 rounded-full transition-colors duration-300">
                                        </div>
                                        <div id="strength3"
                                            class="h-2 flex-1 bg-gray-300 rounded-full transition-colors duration-300">
                                        </div>
                                        <div id="strength4"
                                            class="h-2 flex-1 bg-gray-300 rounded-full transition-colors duration-300">
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Requirements -->
                                <div class="mt-4 space-y-2 text-sm">
                                    <p id="req-length" class="text-gray-600">
                                        <i class="fas fa-circle text-gray-300 mr-2"></i>At least 8 characters
                                    </p>
                                    <p id="req-upper" class="text-gray-600">
                                        <i class="fas fa-circle text-gray-300 mr-2"></i>One uppercase letter (A-Z)
                                    </p>
                                    <p id="req-lower" class="text-gray-600">
                                        <i class="fas fa-circle text-gray-300 mr-2"></i>One lowercase letter (a-z)
                                    </p>
                                    <p id="req-number" class="text-gray-600">
                                        <i class="fas fa-circle text-gray-300 mr-2"></i>One number (0-9)
                                    </p>
                                    <p id="req-special" class="text-gray-600">
                                        <i class="fas fa-circle text-gray-300 mr-2"></i>One special character (!@#$%)
                                    </p>
                                </div>
                                @error('password')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-6">
                                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">
                                    <i class="fas fa-lock text-purple-600 mr-2"></i>Confirm Password
                                </label>
                                <div class="relative">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        required
                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:border-purple-600 focus:outline-none transition"
                                        placeholder="Confirm your password" oninput="checkPasswordMatch()">
                                    <button type="button" onclick="toggleConfirmPasswordVisibility()"
                                        class="absolute right-4 top-3 text-gray-500 hover:text-gray-700">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <p id="matchText" class="mt-2 text-sm text-gray-600"></p>
                                @error('password_confirmation')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Checkbox -->
                            <div class="mb-6">
                                <label class="flex items-center">
                                    <input type="checkbox" name="agree" required
                                        class="w-5 h-5 rounded border-gray-300 text-purple-600 focus:ring-purple-600">
                                    <span class="ml-2 text-gray-700">
                                        I agree to the <a href="#" class="text-purple-600 hover:underline">Terms
                                            of Service</a>
                                        and <a href="#" class="text-purple-600 hover:underline">Privacy
                                            Policy</a>
                                    </span>
                                </label>
                            </div>

                            <div class="flex space-x-4">
                                <button type="button" onclick="prevStep(3)"
                                    class="flex-1 border-2 border-gray-300 text-gray-700 font-bold py-3 rounded-lg hover:bg-gray-50 transition">
                                    <i class="fas fa-arrow-left mr-2"></i>Back
                                </button>
                                <button type="submit" id="submitBtn" disabled
                                    class="flex-1 bg-gray-400 text-white font-bold py-3 rounded-lg cursor-not-allowed transition"
                                    onclick="return validateForm()">
                                    Create Account <i class="fas fa-check ml-2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex items-center justify-center space-x-4">
                                <div id="prog1"
                                    class="w-12 h-12 rounded-full bg-purple-600 text-white flex items-center justify-center font-bold">
                                    1</div>
                                <div class="w-12 h-1 bg-gray-300"></div>
                                <div id="prog2"
                                    class="w-12 h-12 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold">
                                    2</div>
                                <div class="w-12 h-1 bg-gray-300"></div>
                                <div id="prog3"
                                    class="w-12 h-12 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold">
                                    3</div>
                            </div>
                        </div>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-8 text-center border-t border-gray-200 pt-6">
                        <p class="text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-purple-600 font-bold hover:underline">Sign
                                in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;

        function nextStep(step) {
            if (step === 1) {
                if (!document.querySelector('input[name="name"]').value ||
                    !document.querySelector('input[name="email"]').value) {
                    alert('Please fill all required fields');
                    return;
                }
                currentStep = 2;
            } else if (step === 2) {
                if (!document.querySelector('input[name="role"]:checked')) {
                    alert('Please select a role');
                    return;
                }
                currentStep = 3;
            }
            updateSteps();
        }

        function prevStep(step) {
            currentStep = step - 1;
            updateSteps();
        }

        function updateSteps() {
            document.getElementById('step1').classList.add('hidden');
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step3').classList.add('hidden');
            document.getElementById(`step${currentStep}`).classList.remove('hidden');

            document.querySelectorAll('[id^="prog"]').forEach((el, i) => {
                if (i + 1 <= currentStep) {
                    el.classList.remove('bg-gray-300', 'text-gray-600');
                    el.classList.add('bg-purple-600', 'text-white');
                } else {
                    el.classList.remove('bg-purple-600', 'text-white');
                    el.classList.add('bg-gray-300', 'text-gray-600');
                }
            });
        }

        function selectRole(role, element) {
            document.querySelectorAll('.role-card').forEach(card => {
                card.classList.remove('border-blue-500', 'border-orange-500', 'shadow-lg');
                card.classList.add('border-gray-300');
            });

            const color = role === 'client' ? 'blue' : 'orange';
            element.classList.add(`border-${color}-500`, 'shadow-lg');
            element.classList.remove('border-gray-300');
            document.querySelector(`input[value="${role}"]`).checked = true;
        }

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

        function toggleConfirmPasswordVisibility() {
            const input = document.getElementById('password_confirmation');
            const btn = event.target.closest('button');
            if (input.type === 'password') {
                input.type = 'text';
                btn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = 'password';
                btn.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }

        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBars = ['strength1', 'strength2', 'strength3', 'strength4'];
            const strengthText = document.getElementById('strengthText');
            const colors = ['red', 'yellow', 'blue', 'green'];
            const texts = ['Very Weak', 'Weak', 'Medium', 'Strong', 'Strongest'];

            let strength = 0;

            const requirements = {
                length: password.length >= 8,
                upper: /[A-Z]/.test(password),
                lower: /[a-z]/.test(password),
                number: /\d/.test(password),
                special: /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password)
            };

            updateRequirement('req-length', requirements.length);
            updateRequirement('req-upper', requirements.upper);
            updateRequirement('req-lower', requirements.lower);
            updateRequirement('req-number', requirements.number);
            updateRequirement('req-special', requirements.special);

            Object.values(requirements).forEach(met => {
                if (met) strength++;
            });

            strengthBars.forEach((bar, i) => {
                const el = document.getElementById(bar);
                if (i < strength) {
                    el.className =
                        `h-2 flex-1 bg-${colors[strength - 1]}-500 rounded-full transition-colors duration-300`;
                } else {
                    el.className = 'h-2 flex-1 bg-gray-300 rounded-full transition-colors duration-300';
                }
            });

            strengthText.textContent = texts[strength] || texts[0];
            strengthText.className = strength >= 3 ? 'text-sm font-semibold text-green-600' :
                'text-sm font-semibold text-red-600';

            checkPasswordMatch();
            updateSubmitButton();
        }

        function updateRequirement(id, met) {
            const el = document.getElementById(id);
            if (met) {
                el.classList.remove('text-gray-600');
                el.classList.add('text-green-600');
                el.querySelector('i').className = 'fas fa-check text-green-500 mr-2';
            } else {
                el.classList.remove('text-green-600');
                el.classList.add('text-gray-600');
                el.querySelector('i').className = 'fas fa-circle text-gray-300 mr-2';
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            const matchText = document.getElementById('matchText');

            if (!confirm) {
                matchText.textContent = '';
                matchText.className = 'mt-2 text-sm text-gray-600';
            } else if (password === confirm) {
                matchText.textContent = '✓ Passwords match';
                matchText.className = 'mt-2 text-sm text-green-600 font-semibold';
            } else {
                matchText.textContent = '✗ Passwords do not match';
                matchText.className = 'mt-2 text-sm text-red-600 font-semibold';
            }

            updateSubmitButton();
        }

        function updateSubmitButton() {
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            const submitBtn = document.getElementById('submitBtn');
            const strengthBars = document.querySelectorAll('[id^="strength"]');
            let strength = 0;

            Array.from(strengthBars).forEach(bar => {
                if (bar.classList.contains('bg-red-500') ||
                    bar.classList.contains('bg-yellow-500') ||
                    bar.classList.contains('bg-blue-500') ||
                    bar.classList.contains('bg-green-500')) {
                    strength++;
                }
            });

            if (password && confirm && password === confirm && strength >= 3 && document.querySelector(
                    'input[name="agree"]').checked) {
                submitBtn.disabled = false;
                submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                submitBtn.classList.add('bg-purple-600', 'hover:bg-purple-700', 'cursor-pointer');
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                submitBtn.classList.remove('bg-purple-600', 'hover:bg-purple-700', 'cursor-pointer');
            }
        }

        function validateForm() {
            if (!document.querySelector('input[name="agree"]').checked) {
                alert('Please accept the terms and conditions');
                return false;
            }
            return true;
        }

        document.getElementById('password').addEventListener('input', checkPasswordStrength);
        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);
        document.querySelector('input[name="agree"]').addEventListener('change', updateSubmitButton);
    </script>
</body>

</html>
