<x-app-layout>
    <h2>Data Penjualan</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('penjualan.create') }}">+ Tambah Penjualan</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Pelanggan</th>
                <th>Item</th>
                <th>Total Harga</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualans as $p)
                <tr>
                    <td>{{ $p->tanggal_penjualan }}</td>
                    <td>{{ $p->produk->nama_produk }}</td>
                    <td>{{ $p->nama_pelanggan ?? '-' }}</td>
                    <td>{{ $p->total_item }}</td>
                    <td>Rp{{ number_format($p->total_harga) }}</td>
                    <td>{{ ucfirst($p->metode_pembayaran) }}</td>
                    <td>{{ ucfirst($p->status_transaksi) }}</td>
                    <td>
                        <a href="{{ route('penjualan.edit', $p->id) }}">Edit</a>
                        <form action="{{ route('penjualan.destroy', $p->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
