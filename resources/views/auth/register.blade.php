<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#5C4033] to-[#A1866F] py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 space-y-6">

            <!-- Logo di Atas -->
            <div class="flex justify-center">
                <a href="/">
                    <img src="{{ asset('images/WhatsApp Image 2025-06-22 at 20.23.34_8695b5f0.jpg') }}"
                         alt="Logo Warkop"
                         class="h-32 w-auto rounded-xl object-contain">
                </a>
            </div>

            <div>
                <h2 class="text-center text-3xl font-extrabold text-[#5C4033]">Daftar Akun Warkop Brodie</h2>
                <p class="mt-2 text-center text-sm text-gray-600">Buat akun untuk mengakses sistem</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-700" />
                    <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-[#5C4033] focus:ring-[#5C4033]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-[#5C4033] focus:ring-[#5C4033]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-[#5C4033] focus:ring-[#5C4033]" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-[#5C4033] focus:ring-[#5C4033]" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" required class="mt-1 block w-full rounded-md border-gray-300 focus:border-[#5C4033] focus:ring-[#5C4033]">
                        <option value="kasir">Kasir</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button + Redirect -->
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-[#5C4033] hover:text-[#3d2e24] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#A1866F]" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4 bg-[#5C4033] hover:bg-[#3d2e24] text-white">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
