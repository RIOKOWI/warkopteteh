<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-[#5C4033] to-[#A1866F] flex items-center justify-center py-10 px-4">
        <div class="w-full max-w-xl bg-white shadow-lg rounded-xl p-8">
            <h2 class="text-2xl font-bold text-[#5C4033] mb-6 text-center">Edit Bahan Baku</h2>

            <form action="{{ route('bahan.update', $bahan->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Bahan</label>
                    <input type="text" name="nama_bahan" value="{{ old('nama_bahan', $bahan->nama_bahan) }}" required
                        class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                    <input type="text" name="kategori" value="{{ old('kategori', $bahan->kategori) }}" required
                        class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
                    <input type="number" name="stok" value="{{ old('stok', $bahan->stok) }}" required
                        class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Satuan</label>
                    <select name="satuan" class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                        @foreach(['pcs', 'gram', 'liter', 'bungkus'] as $satuan)
                            <option value="{{ $satuan }}" {{ $bahan->satuan == $satuan ? 'selected' : '' }}>
                                {{ ucfirst($satuan) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga</label>
                    <input type="number" name="harga" value="{{ old('harga', $bahan->harga) }}" required
                        class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                    <select name="status_bahan" class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">
                        @foreach(['tersedia', 'menipis', 'habis'] as $status)
                            <option value="{{ $status }}" {{ $bahan->status_bahan == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Catatan</label>
                    <textarea name="catatan"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md shadow-sm focus:ring-[#5C4033] focus:border-[#5C4033]">{{ old('catatan', $bahan->catatan) }}</textarea>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('bahan.index') }}" class="text-sm text-[#5C4033] hover:underline">
                        ← Kembali
                    </a>
                    <button type="submit"
                        class="bg-[#5C4033] hover:bg-[#3e2f24] text-white font-semibold px-4 py-2 rounded-md transition">
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
