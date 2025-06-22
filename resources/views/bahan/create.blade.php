<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#5C4033] to-[#A1866F] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
            <h1 class="text-2xl font-bold text-[#5C4033] mb-6 text-center">Tambah Bahan Baku</h1>

            <form method="POST" action="{{ route('bahan.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Bahan</label>
                    <input name="nama_bahan" placeholder="Nama Bahan"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                    <input name="kategori" placeholder="Kategori"
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
                        <option value="gram">gram</option>
                        <option value="liter">liter</option>
                        <option value="bungkus">bungkus</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga Beli</label>
                    <input name="harga" type="number" placeholder="Harga Beli"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status Bahan</label>
                    <select name="status_bahan"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]">
                        <option value="tersedia">Tersedia</option>
                        <option value="menipis">Menipis</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Catatan (opsional)</label>
                    <textarea name="catatan" placeholder="Catatan"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]"></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-green-700 hover:bg-green-800 text-white font-semibold py-2 px-4 rounded-md transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
