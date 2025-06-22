@php
    use App\Enums\UserRole;
    $userRole = Auth::user()->role;
@endphp

<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-[#5C4033] to-[#A1866F] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-6">
                <h1 class="text-2xl font-bold text-[#5C4033] mb-6">Daftar Stok Bahan Baku</h1>

                {{-- Notifikasi sukses --}}
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tombol tambah untuk admin --}}
                @if($userRole === UserRole::Admin)
                    <div class="mb-4">
                        <a href="{{ route('bahan.create') }}"
                           class="inline-block bg-[#5C4033] hover:bg-[#3d2e24] text-white font-semibold py-2 px-4 rounded-md transition">
                            + Tambah Bahan Baku
                        </a>
                    </div>
                @endif

                {{-- Filter Status --}}
                <div class="mb-6 text-sm text-gray-700">
                    <strong>Filter Status:</strong>
                    <a href="{{ route('bahan.index') }}" class="text-blue-700 hover:underline">Semua</a> |
                    <a href="{{ route('bahan.filter', 'tersedia') }}" class="text-green-700 hover:underline">Tersedia</a> |
                    <a href="{{ route('bahan.filter', 'menipis') }}" class="text-yellow-600 hover:underline">Menipis</a> |
                    <a href="{{ route('bahan.filter', 'habis') }}" class="text-red-700 hover:underline">Habis</a>
                </div>

                {{-- Tabel --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-md">
                        <thead class="bg-[#A1866F] text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Kategori</th>
                                <th class="px-4 py-2 text-left">Stok</th>
                                <th class="px-4 py-2 text-left">Satuan</th>
                                <th class="px-4 py-2 text-left">Harga</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Catatan</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @forelse ($bahan as $item)
                                @php
                                    $warna = match($item->status_bahan) {
                                        'tersedia' => 'text-green-600',
                                        'menipis' => 'text-yellow-600',
                                        'habis' => 'text-red-600',
                                    };
                                @endphp
                                <tr class="border-t border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $item->nama_bahan }}</td>
                                    <td class="px-4 py-2">{{ $item->kategori }}</td>
                                    <td class="px-4 py-2">{{ $item->stok }}</td>
                                    <td class="px-4 py-2">{{ $item->satuan }}</td>
                                    <td class="px-4 py-2">Rp{{ number_format($item->harga) }}</td>
                                    <td class="px-4 py-2 font-medium {{ $warna }}">{{ ucfirst($item->status_bahan) }}</td>
                                    <td class="px-4 py-2">{{ $item->catatan ?? '-' }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        @if($userRole === UserRole::Admin)
                                            <a href="{{ route('bahan.edit', $item->id) }}"
                                               class="text-sm bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                                Edit
                                            </a>
                                            <form action="{{ route('bahan.destroy', $item->id) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Hapus bahan ini?')"
                                                        class="text-sm bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                                    Hapus
                                                </button>
                                            </form>
                                        @else
                                            <em>-</em>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center px-4 py-6 text-gray-500">Tidak ada data bahan baku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
