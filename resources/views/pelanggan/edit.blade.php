<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#5C4033] leading-tight">Edit Pelanggan</h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-[#5C4033] to-[#A1866F] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-6">
                <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required
                            class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">No HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $pelanggan->no_hp) }}" required
                            class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}"
                            class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Alamat</label>
                        <textarea name="alamat"
                            class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-[#5C4033] font-semibold mb-1">Catatan</label>
                        <textarea name="catatan"
                            class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring focus:ring-[#A1866F]">{{ old('catatan', $pelanggan->catatan) }}</textarea>
                    </div>

                    <div class="flex items-center">
                        <button type="submit"
                            class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-5 py-2 rounded-md transition">
                            Perbarui
                        </button>
                        <a href="{{ route('pelanggan.index') }}"
                            class="ml-4 text-[#5C4033] hover:underline font-medium">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
