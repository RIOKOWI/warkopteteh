<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#5C4033] to-[#A1866F] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
            <h1 class="text-2xl font-bold text-[#5C4033] mb-6 text-center">Edit Produk</h1>

            <form method="POST" action="{{ route('produk.update', $produk->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                    <input name="nama_produk" value="{{ $produk->nama_produk }}"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                    <select name="kategori"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]">
                        <option {{ $produk->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                        <option {{ $produk->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option {{ $produk->kategori == 'Snack' ? 'selected' : '' }}>Snack</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga Jual</label>
                    <input name="harga_jual" type="number" value="{{ $produk->harga_jual }}"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
                    <input name="stok" type="number" value="{{ $produk->stok }}"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]" />
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Satuan</label>
                    <select name="satuan"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]">
                        <option {{ $produk->satuan == 'pcs' ? 'selected' : '' }}>pcs</option>
                        <option {{ $produk->satuan == 'gelas' ? 'selected' : '' }}>gelas</option>
                        <option {{ $produk->satuan == 'bungkus' ? 'selected' : '' }}>bungkus</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status Produk</label>
                    <select name="status_produk"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]">
                        <option {{ $produk->status_produk == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option {{ $produk->status_produk == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#5C4033] focus:ring-[#5C4033]">{{ $produk->deskripsi }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-2 px-4 rounded-md transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
