<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Pelanggan</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('pelanggan.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label>Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp') }}" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label>Alamat</label>
                <textarea name="alamat" class="w-full border px-3 py-2 rounded">{{ old('alamat') }}</textarea>
            </div>

            <div>
                <label>Catatan</label>
                <textarea name="catatan" class="w-full border px-3 py-2 rounded">{{ old('catatan') }}</textarea>
            </div>

            <div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('pelanggan.index') }}" class="ml-2 text-blue-600">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
