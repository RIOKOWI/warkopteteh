<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Warkop Brodie</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col items-center px-4 pt-8 space-y-6">

    {{-- Header --}}
    <header class="w-full max-w-4xl bg-[#5C4033] text-white p-4 rounded shadow-md">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-2">
            <h1 class="font-bold text-xl text-yellow-200 tracking-wide">☕ Warkop Brodie</h1>
            @if (Route::has('login'))
                <nav class="flex gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-1.5 border border-yellow-300 hover:border-yellow-100 text-yellow-100 rounded text-sm">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-1.5 border border-transparent hover:border-yellow-300 text-yellow-100 rounded text-sm">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-1.5 border border-yellow-300 hover:border-yellow-100 text-yellow-100 rounded text-sm">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    {{-- Section Welcome --}}
    <section class="w-full max-w-4xl bg-[#e4be85] text-[#3E2C23] p-6 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-2">Selamat datang di Warkop Brodie</h2>
        <p class="text-sm leading-relaxed">
            Di sini kamu bisa mengelola penjualan, stok, dan laporan warkop kamu dengan mudah. <br>
            Semangat jualan hari ini! ☕🍞
        </p>
    </section>

</body>
</html>
