<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    {{ __('Create your account') }}
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    {{ __('Join us today! Please fill in your information.') }}
                </p>
            </div>

            <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Full Name')" class="block text-sm font-medium text-gray-700" />
                        <div class="mt-1">
                            <x-text-input 
                                id="name" 
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#f5a25d] focus:border-[#b37643] focus:z-10 sm:text-sm" 
                                type="text" 
                                name="name" 
                                :value="old('name')" 
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="Enter your full name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="block text-sm font-medium text-gray-700" />
                        <div class="mt-1">
                            <x-text-input 
                                id="email" 
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#f5a25d] focus:border-[#b37643] focus:z-10 sm:text-sm" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autocomplete="username"
                                placeholder="Enter your email address" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
                        <div class="mt-1 relative">
                            <x-text-input 
                                id="password" 
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#f5a25d] focus:border-[#b37643] focus:z-10 sm:text-sm"
                                type="password"
                                name="password"
                                required 
                                autocomplete="new-password"
                                placeholder="Create a strong password" />
                            <!-- Password Strength Indicator -->
                            <div id="password-strength" class="mt-1 hidden">
                                <div class="flex space-x-1">
                                    <div class="h-1 w-1/4 bg-gray-200 rounded"></div>
                                    <div class="h-1 w-1/4 bg-gray-200 rounded"></div>
                                    <div class="h-1 w-1/4 bg-gray-200 rounded"></div>
                                    <div class="h-1 w-1/4 bg-gray-200 rounded"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1" id="password-strength-text">Password strength</p>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                        <p class="mt-1 text-xs text-gray-500">
                            {{ __('Password must be at least 8 characters long') }}
                        </p>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-700" />
                        <div class="mt-1">
                            <x-text-input 
                                id="password_confirmation" 
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#f5a25d] focus:border-[#b37643] focus:z-10 sm:text-sm"
                                type="password"
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="Confirm your password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                        <div id="password-match" class="mt-1 text-xs hidden">
                            <span id="password-match-text"></span>
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input 
                            id="terms" 
                            name="terms" 
                            type="checkbox" 
                            required
                            class="h-4 w-4 focus:ring-[#f5a25d] focus:border-[#b37643] border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="text-gray-700">
                            {{ __('I agree to the') }}
                            <a href="#" class="font-medium text-[#f5a25d] hover:text-[#bd7c47] focus:outline-none focus:underline">
                                {{ __('Terms and Conditions') }}
                            </a>
                            {{ __('and') }}
                            <a href="#" class="font-medium text-[#f5a25d] hover:text-[#bd7c47] focus:outline-none focus:underline">
                                {{ __('Privacy Policy') }}
                            </a>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#f5a25d] hover:bg-[#bd7c47] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f5a25d] transition duration-150 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed" id="register-btn">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-white group-hover:text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                            </svg>
                        </span>
                        <span id="register-text">{{ __('Create Account') }}</span>
                        <svg id="loading-spinner" class="hidden animate-spin -mr-1 ml-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="font-medium text-[#f5a25d] hover:text-[#bd7c47] focus:outline-none focus:underline transition ease-in-out duration-150">
                            {{ __('Sign in') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript for form enhancements -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const passwordStrength = document.getElementById('password-strength');
            const passwordStrengthText = document.getElementById('password-strength-text');
            const passwordMatch = document.getElementById('password-match');
            const passwordMatchText = document.getElementById('password-match-text');
            const registerBtn = document.getElementById('register-btn');
            const registerText = document.getElementById('register-text');
            const loadingSpinner = document.getElementById('loading-spinner');
            const termsCheckbox = document.getElementById('terms');

            // Password strength checker
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const strength = checkPasswordStrength(password);
                
                if (password.length > 0) {
                    passwordStrength.classList.remove('hidden');
                    updatePasswordStrengthUI(strength);
                } else {
                    passwordStrength.classList.add('hidden');
                }
                
                checkFormValidity();
            });

            // Password confirmation checker
            confirmPasswordInput.addEventListener('input', function() {
                const password = passwordInput.value;
                const confirmPassword = this.value;
                
                if (confirmPassword.length > 0) {
                    passwordMatch.classList.remove('hidden');
                    if (password === confirmPassword) {
                        passwordMatchText.textContent = '✓ Passwords match';
                        passwordMatchText.className = 'text-green-600';
                    } else {
                        passwordMatchText.textContent = '✗ Passwords do not match';
                        passwordMatchText.className = 'text-red-600';
                    }
                } else {
                    passwordMatch.classList.add('hidden');
                }
                
                checkFormValidity();
            });

            // Terms checkbox
            termsCheckbox.addEventListener('change', checkFormValidity);

            function checkPasswordStrength(password) {
                let score = 0;
                if (password.length >= 8) score++;
                if (/[a-z]/.test(password)) score++;
                if (/[A-Z]/.test(password)) score++;
                if (/[0-9]/.test(password)) score++;
                if (/[^A-Za-z0-9]/.test(password)) score++;
                return score;
            }

            function updatePasswordStrengthUI(strength) {
                const bars = passwordStrength.querySelectorAll('.h-1');
                const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500'];
                const texts = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong'];
                
                bars.forEach((bar, index) => {
                    bar.className = 'h-1 w-1/4 rounded ' + (index < strength ? colors[Math.min(strength - 1, 3)] : 'bg-gray-200');
                });
                
                passwordStrengthText.textContent = texts[Math.min(strength, 4)];
                passwordStrengthText.className = 'text-xs mt-1 ' + (strength < 2 ? 'text-red-600' : strength < 4 ? 'text-yellow-600' : 'text-green-600');
            }

            function checkFormValidity() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                const termsAccepted = termsCheckbox.checked;
                
                const isValid = password.length >= 8 && 
                               password === confirmPassword && 
                               termsAccepted;
                
                registerBtn.disabled = !isValid;
            }

            // Form submission with loading state
            document.querySelector('form').addEventListener('submit', function() {
                registerBtn.disabled = true;
                registerText.textContent = 'Creating Account...';
                loadingSpinner.classList.remove('hidden');
            });
        });
    </script>
</x-guest-layout>
