<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-[#5C4033] to-[#A1866F] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-6">
                <h2 class="text-2xl font-bold text-[#5C4033] mb-6">Tambah Penjualan</h2>

                <form action="{{ route('penjualan.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Tanggal</label>
                        <input type="datetime-local" name="tanggal_penjualan" required
                               class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Produk</label>
                        <select name="produk_id" required
                                class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                            @foreach($produks as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan"
                               class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Total Item</label>
                        <input type="number" name="total_item" min="1" required
                               class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Metode Pembayaran</label>
                        <select name="metode_pembayaran" required
                                class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Status Transaksi</label>
                        <select name="status_transaksi" required
                                class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                            <option value="selesai">Selesai</option>
                            <option value="tertunda">Tertunda</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Catatan</label>
                        <textarea name="catatan_transaksi"
                                  class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]"></textarea>
                    </div>

                    <div class="flex items-center">
                        <button type="submit"
                                class="bg-[#5C4033] hover:bg-[#3d2e24] text-white font-semibold px-5 py-2 rounded-md transition">
                            Simpan
                        </button>
                        <a href="{{ route('penjualan.index') }}"
                           class="ml-4 text-[#5C4033] hover:underline font-medium">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
