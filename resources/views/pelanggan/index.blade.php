<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-[#5C4033] to-[#A1866F] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-6">
                <h1 class="text-2xl font-bold text-[#5C4033] mb-6">Daftar Pelanggan</h1>

                {{-- Tombol Tambah --}}
                <div class="mb-4">
                    <a href="{{ route('pelanggan.create') }}"
                       class="inline-block bg-[#5C4033] hover:bg-[#3d2e24] text-white font-semibold py-2 px-4 rounded-md transition">
                        Tambah Pelanggan
                    </a>
                </div>

                {{-- Notifikasi Sukses --}}
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tabel Pelanggan --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-md">
                        <thead class="bg-[#A1866F] text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">No HP</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Alamat</th>
                                <th class="px-4 py-2 text-left">Catatan</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @foreach($pelanggans as $p)
                                <tr class="border-t border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $p->nama }}</td>
                                    <td class="px-4 py-2">{{ $p->no_hp }}</td>
                                    <td class="px-4 py-2">{{ $p->email }}</td>
                                    <td class="px-4 py-2">{{ $p->alamat }}</td>
                                    <td class="px-4 py-2">{{ $p->catatan }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        <a href="{{ route('pelanggan.edit', $p->id) }}"
                                           class="text-sm bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                            Edit
                                        </a>
                                        <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Yakin?')"
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
