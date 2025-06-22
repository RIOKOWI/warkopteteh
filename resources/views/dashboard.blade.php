<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#5C4033] leading-tight">
            {{ __('Dashboard') }}
            {{ Auth::check() ? Auth::user()->role : 'Tidak ada' }}
            {{ __('Warkop Brodie') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-[#5C4033] to-[#A1866F] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-6 text-gray-800">
                    <h3 class="text-lg font-bold mb-4 text-[#5C4033]">Selamat datang di Warkop Brodie!</h3>

                    <div class="space-y-2">
                        <p><span class="font-semibold text-gray-700">Login sebagai:</span> {{ Auth::check() ? Auth::user()->name : 'Guest' }}</p>
                        <p><span class="font-semibold text-gray-700">Role:</span> {{ Auth::check() ? Auth::user()->role : 'Tidak ada' }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="inline-block bg-[#5C4033] hover:bg-[#3d2e24] text-white font-medium py-2 px-4 rounded-md transition duration-200">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
