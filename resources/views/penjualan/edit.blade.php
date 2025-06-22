<x-app-layout>
    <h2>Edit Penjualan</h2>

    <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST">
        @csrf @method('PUT')

        <label>Tanggal:</label>
        <input type="datetime-local" name="tanggal_penjualan" value="{{ date('Y-m-d\TH:i', strtotime($penjualan->tanggal_penjualan)) }}" required><br>

        <label>Produk:</label>
        <select name="produk_id" required>
            @foreach($produks as $produk)
                <option value="{{ $produk->id }}" @selected($penjualan->produk_id == $produk->id)>
                    {{ $produk->nama_produk }}
                </option>
            @endforeach
        </select><br>

        <label>Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" value="{{ $penjualan->nama_pelanggan }}"><br>

        <label>Total Item:</label>
        <input type="number" name="total_item" value="{{ $penjualan->total_item }}" min="1" required><br>

        <label>Metode Pembayaran:</label>
        <select name="metode_pembayaran" required>
            <option value="cash" @selected($penjualan->metode_pembayaran == 'cash')>Cash</option>
            <option value="transfer" @selected($penjualan->metode_pembayaran == 'transfer')>Transfer</option>
        </select><br>

        <label>Status Transaksi:</label>
        <select name="status_transaksi" required>
            <option value="selesai" @selected($penjualan->status_transaksi == 'selesai')>Selesai</option>
            <option value="tertunda" @selected($penjualan->status_transaksi == 'tertunda')>Tertunda</option>
        </select><br>

        <label>Catatan:</label>
        <textarea name="catatan_transaksi">{{ $penjualan->catatan_transaksi }}</textarea><br>

        <button type="submit">Update</button>
    </form>
</x-app-layout>
