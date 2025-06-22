<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#5C4033] to-[#A1866F] py-10 px-4">
        <div class="max-w-7xl mx-auto bg-white p-8 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-[#5C4033] mb-6 text-center">Laporan Penjualan Warkop</h2>

            <form method="GET" action="{{ route('laporan.index') }}" class="space-y-4">
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Dari</label>
                        <input type="date" name="dari" value="{{ request('dari') }}"
                            class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Sampai</label>
                        <input type="date" name="sampai" value="{{ request('sampai') }}"
                            class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Produk</label>
                        <select name="produk_id"
                            class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                            <option value="">Semua Produk</option>
                            @foreach($produks as $produk)
                                <option value="{{ $produk->id }}" {{ request('produk_id') == $produk->id ? 'selected' : '' }}>
                                    {{ $produk->nama_produk }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Metode Pembayaran</label>
                        <select name="metode_pembayaran"
                            class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                            <option value="">Semua</option>
                            <option value="cash" {{ request('metode_pembayaran') == 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="transfer" {{ request('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Status Transaksi</label>
                        <select name="status_transaksi"
                            class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                            <option value="">Semua</option>
                            <option value="selesai" {{ request('status_transaksi') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="tertunda" {{ request('status_transaksi') == 'tertunda' ? 'selected' : '' }}>Tertunda</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-[#5C4033] text-white px-4 py-2 rounded-md hover:bg-[#3e2f24] transition">
                        Terapkan Filter
                    </button>
                </div>
            </form>

            <div class="mt-8 overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden text-sm">
                    <thead class="bg-[#5C4033] text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Produk</th>
                            <th class="px-4 py-2 text-left">Jumlah</th>
                            <th class="px-4 py-2 text-left">Harga</th>
                            <th class="px-4 py-2 text-left">Total</th>
                            <th class="px-4 py-2 text-left">Metode</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($penjualans as $p)
                            <tr class="hover:bg-[#f9f6f2]">
                                <td class="px-4 py-2">{{ $p->tanggal_penjualan }}</td>
                                <td class="px-4 py-2">{{ $p->produk->nama_produk }}</td>
                                <td class="px-4 py-2">{{ $p->total_item }}</td>
                                <td class="px-4 py-2">Rp{{ number_format($p->produk->harga_jual) }}</td>
                                <td class="px-4 py-2">Rp{{ number_format($p->total_harga) }}</td>
                                <td class="px-4 py-2">{{ ucfirst($p->metode_pembayaran) }}</td>
                                <td class="px-4 py-2">{{ ucfirst($p->status_transaksi) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-gray-500 py-4">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="bg-[#FAF3E0] font-semibold text-[#5C4033]">
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-right">Total Penjualan</td>
                            <td colspan="3" class="px-4 py-2">Rp{{ number_format($total) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
