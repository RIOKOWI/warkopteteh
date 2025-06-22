<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#5C4033] to-[#A1866F] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
            <h1 class="text-2xl font-bold text-[#5C4033] mb-6 text-center">Tambah Produk</h1>

            <form method="POST" action="{{ route('produk.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                    <input name="nama_produk" placeholder="Nama Produk"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                    <select name="kategori"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Snack">Snack</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga Jual</label>
                    <input name="harga_jual" type="number" placeholder="Harga"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
                    <input name="stok" type="number" placeholder="Stok"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Satuan</label>
                    <select name="satuan"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]">
                        <option value="pcs">pcs</option>
                        <option value="gelas">gelas</option>
                        <option value="bungkus">bungkus</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status Produk</label>
                    <select name="status_produk"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" placeholder="Deskripsi"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]"></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-[#5C4033] hover:bg-[#3d2e24] text-white font-semibold py-2 px-4 rounded-md transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
