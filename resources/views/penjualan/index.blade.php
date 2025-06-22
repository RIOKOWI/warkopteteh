<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-[#5C4033] to-[#A1866F] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-6">
                <h2 class="text-2xl font-bold text-[#5C4033] mb-6">Data Penjualan</h2>

                {{-- Notifikasi --}}
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tombol Tambah --}}
                <div class="mb-4">
                    <a href="{{ route('penjualan.create') }}"
                       class="inline-block bg-[#5C4033] hover:bg-[#3d2e24] text-white font-semibold py-2 px-4 rounded-md transition">
                        + Tambah Penjualan
                    </a>
                </div>

                {{-- Tabel --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-md">
                        <thead class="bg-[#A1866F] text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">Tanggal</th>
                                <th class="px-4 py-2 text-left">Produk</th>
                                <th class="px-4 py-2 text-left">Pelanggan</th>
                                <th class="px-4 py-2 text-left">Item</th>
                                <th class="px-4 py-2 text-left">Total Harga</th>
                                <th class="px-4 py-2 text-left">Metode</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @foreach($penjualans as $p)
                                <tr class="border-t border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $p->tanggal_penjualan }}</td>
                                    <td class="px-4 py-2">{{ $p->produk->nama_produk }}</td>
                                    <td class="px-4 py-2">{{ $p->nama_pelanggan ?? '-' }}</td>
                                    <td class="px-4 py-2">{{ $p->total_item }}</td>
                                    <td class="px-4 py-2">Rp{{ number_format($p->total_harga) }}</td>
                                    <td class="px-4 py-2">{{ ucfirst($p->metode_pembayaran) }}</td>
                                    <td class="px-4 py-2">{{ ucfirst($p->status_transaksi) }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        <a href="{{ route('penjualan.edit', $p->id) }}"
                                           class="text-sm bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                            Edit
                                        </a>
                                        <form action="{{ route('penjualan.destroy', $p->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Hapus data ini?')"
                                                    class="text-sm bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
