<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#5C4033] to-[#A1866F] py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-6 bg-white shadow-xl rounded-2xl p-8">
            <!-- Logo di Atas -->
            <div class="flex justify-center">
                <a href="/">
                    <img src="{{ asset('images/WhatsApp Image 2025-06-22 at 20.23.34_8695b5f0.jpg') }}"
                         alt="Logo Warkop"
                         class="h-32 w-auto rounded-xl object-contain">
                </a>
            </div>

            <!-- Heading -->
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-[#5C4033]">Login ke Warkop Brodie</h2>
                <p class="mt-2 text-sm text-gray-600">Silakan masuk untuk mengelola warkop kamu</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#5C4033] focus:border-[#5C4033] sm:text-sm"
                        placeholder="you@example.com" value="{{ old('email') }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#5C4033] focus:border-[#5C4033] sm:text-sm"
                        placeholder="********" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me + Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember"
                            class="rounded border-gray-300 text-[#5C4033] shadow-sm focus:ring-[#5C4033]">
                        <span class="ml-2 text-sm text-gray-900">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-[#5C4033] hover:underline">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#5C4033] hover:bg-[#4a3326] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#A1866F]">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
