    @php
        use App\Enums\UserRole;
        $userRole = Auth::user()->role;
    @endphp
<x-app-layout>
    <h1>Daftar Stok Bahan Baku</h1>


    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Tampilkan tombol tambah hanya untuk admin --}}
    @if($userRole === UserRole::Admin)
        <a href="{{ route('bahan.create') }}">+ Tambah Bahan Baku</a>
    @endif

    {{-- Filter status --}}
    <div style="margin-top: 10px; margin-bottom: 10px;">
        <strong>Filter Status: </strong>
        <a href="{{ route('bahan.index') }}">Semua</a> |
        <a href="{{ route('bahan.filter', 'tersedia') }}">Tersedia</a> |
        <a href="{{ route('bahan.filter', 'menipis') }}">Menipis</a> |
        <a href="{{ route('bahan.filter', 'habis') }}">Habis</a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bahan as $item)
            <tr>
                <td>{{ $item->nama_bahan }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->satuan }}</td>
                <td>Rp{{ number_format($item->harga) }}</td>
                <td>
                    @php
                        $warna = match($item->status_bahan) {
                            'tersedia' => 'green',
                            'menipis' => 'orange',
                            'habis' => 'red',
                        };
                    @endphp
                    <span style="color: {{ $warna }}">{{ ucfirst($item->status_bahan) }}</span>
                </td>
                <td>{{ $item->catatan ?? '-' }}</td>
                <td>
                    @if($userRole === UserRole::Admin)
                        <a href="{{ route('bahan.edit', $item->id) }}">Edit</a> |
                        <form action="{{ route('bahan.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus bahan ini?')">Hapus</button>
                        </form>
                    @else
                        <em>-</em>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center;">Tidak ada data bahan baku.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>
