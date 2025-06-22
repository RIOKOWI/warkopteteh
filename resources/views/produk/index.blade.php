@php
    use App\Enums\UserRole;
    $userRole = Auth::user()->role;
@endphp

<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-[#5C4033] to-[#A1866F] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-6">
                <h1 class="text-2xl font-bold text-[#5C4033] mb-6">Daftar Produk</h1>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($userRole === UserRole::Admin)
                    <div class="mb-4">
                        <a href="{{ route('produk.create') }}"
                           class="inline-block bg-[#5C4033] hover:bg-[#3d2e24] text-white font-semibold py-2 px-4 rounded-md transition">
                            + Tambah Produk
                        </a>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-md">
                        <thead class="bg-[#A1866F] text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Kategori</th>
                                <th class="px-4 py-2 text-left">Harga</th>
                                <th class="px-4 py-2 text-left">Stok</th>
                                <th class="px-4 py-2 text-left">Satuan</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Catatan</th> 
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @forelse ($produk as $item)
                                <tr class="border-t border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $item->nama_produk }}</td>
                                    <td class="px-4 py-2">{{ $item->kategori }}</td>
                                    <td class="px-4 py-2">Rp{{ number_format($item->harga_jual) }}</td>
                                    <td class="px-4 py-2">{{ $item->stok }}</td>
                                    <td class="px-4 py-2">{{ $item->satuan }}</td>
                                    <td class="px-4 py-2">{{ $item->status_produk }}</td>
                                    <td class="px-4 py-2 max-w-xs overflow-hidden text-ellipsis whitespace-nowrap" title="{{ $item->deskripsi }}">
                                        {{ \Illuminate\Support\Str::limit($item->deskripsi, 50) }}
                                    </td>
                                    <td class="px-4 py-2 space-x-2">
                                        @if($userRole === UserRole::Admin)
                                            <a href="{{ route('produk.edit', $item->id) }}"
                                               class="text-sm bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                                Edit
                                            </a>
                                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('Yakin ingin hapus?')"
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
                                    <td colspan="8" class="text-center px-4 py-6 text-gray-500">Belum ada data produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
