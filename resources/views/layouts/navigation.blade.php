<nav x-data="{ open: false }" class="bg-[#5C4033] border-b border-[#A1866F] text-white shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto text-white" />
                    </a>
                </div>

                @php
                    $role = Auth::user()->role->value ?? null;
                @endphp

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    {{-- Menu admin --}}
                    @if ($role === 'admin')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('produk.index')" :active="request()->routeIs('produk.index')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Manajemen Produk') }}
                        </x-nav-link>
                        <x-nav-link :href="route('bahan.index')" :active="request()->routeIs('bahan.index')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Manajemen Stok Bahan Baku') }}
                        </x-nav-link>
                        <x-nav-link :href="route('laporan.index')" :active="request()->routeIs('laporan.index')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Laporan Penjualan') }}
                        </x-nav-link>
                    @endif

                    {{-- Menu kasir --}}
                    @if ($role === 'kasir')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('produk.index')" :active="request()->routeIs('produk.index')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Lihat Produk') }}
                        </x-nav-link>
                        <x-nav-link :href="route('bahan.index')" :active="request()->routeIs('bahan.index')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Lihat Stok Bahan Baku') }}
                        </x-nav-link>
                        <x-nav-link :href="route('pelanggan.index')" :active="request()->routeIs('pelanggan.index')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Manajemen Data Pelanggan') }}
                        </x-nav-link>
                        <x-nav-link :href="route('penjualan.index')" :active="request()->routeIs('penjualan.index')" class="text-white hover:text-[#F4EBD0]">
                            {{ __('Pencatatan Penjualan') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#5C4033] hover:bg-[#3d2e24] transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#F4EBD0] hover:bg-[#3d2e24] focus:bg-[#3d2e24] focus:text-white transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden bg-[#5C4033] text-white">
        <div class="pt-2 pb-3 space-y-1">
            @if ($role === 'admin')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('produk.index')" :active="request()->routeIs('produk.index')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Manajemen Produk') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('bahan.index')" :active="request()->routeIs('bahan.index')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Manajemen Stok Bahan Baku') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('laporan.index')" :active="request()->routeIs('laporan.index')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Laporan Penjualan') }}
                </x-responsive-nav-link>
            @endif

            @if ($role === 'kasir')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('produk.index')" :active="request()->routeIs('produk.index')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Lihat Produk') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('bahan.index')" :active="request()->routeIs('bahan.index')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Lihat Stok Bahan Baku') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pelanggan.index')" :active="request()->routeIs('pelanggan.index')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Manajemen Data Pelanggan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('penjualan.index')" :active="request()->routeIs('penjualan.index')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Pencatatan Penjualan') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- User Info -->
        <div class="pt-4 pb-1 border-t border-[#A1866F]">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-[#D4BFAA]">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-[#F4EBD0]">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-white hover:text-[#F4EBD0]"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
