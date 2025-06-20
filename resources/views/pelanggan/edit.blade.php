<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Pelanggan</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label>Nama</label>
                <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $pelanggan->no_hp) }}" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}" class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label>Alamat</label>
                <textarea name="alamat" class="w-full border px-3 py-2 rounded">{{ old('alamat', $pelanggan->alamat) }}</textarea>
            </div>

            <div>
                <label>Catatan</label>
                <textarea name="catatan" class="w-full border px-3 py-2 rounded">{{ old('catatan', $pelanggan->catatan) }}</textarea>
            </div>

            <div>
                <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Perbarui</button>
                <a href="{{ route('pelanggan.index') }}" class="ml-2 text-blue-600">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>
