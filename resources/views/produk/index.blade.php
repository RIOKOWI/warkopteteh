@php
    use App\Enums\UserRole;
    $userRole = Auth::user()->role;
@endphp

<x-app-layout>
    <h1>Daftar Produk</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($userRole === UserRole::Admin)
        <a href="{{ route('produk.create') }}">+ Tambah Produk</a>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @forelse ($produk as $item)
        <tr>
            <td>{{ $item->nama_produk }}</td>
            <td>{{ $item->kategori }}</td>
            <td>Rp{{ number_format($item->harga_jual) }}</td>
            <td>{{ $item->stok }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ $item->status_produk }}</td>
            <td>
                @if($userRole === UserRole::Admin)
                    <a href="{{ route('produk.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                @else
                    <em>-</em>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align: center;">Belum ada data produk.</td>
        </tr>
        @endforelse
    </table>
</x-app-layout>
