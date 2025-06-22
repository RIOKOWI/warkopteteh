<x-app-layout>
    <h2>Tambah Penjualan</h2>

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        <label>Tanggal:</label>
        <input type="datetime-local" name="tanggal_penjualan" required><br>

        <label>Produk:</label>
        <select name="produk_id" required>
            @foreach($produks as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
            @endforeach
        </select><br>

        <label>Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan"><br>

        <label>Total Item:</label>
        <input type="number" name="total_item" min="1" required><br>

        <label>Metode Pembayaran:</label>
        <select name="metode_pembayaran" required>
            <option value="cash">Cash</option>
            <option value="transfer">Transfer</option>
        </select><br>

        <label>Status Transaksi:</label>
        <select name="status_transaksi" required>
            <option value="selesai">Selesai</option>
            <option value="tertunda">Tertunda</option>
        </select><br>

        <label>Catatan:</label>
        <textarea name="catatan_transaksi"></textarea><br>

        <button type="submit">Simpan</button>
    </form>
</x-app-layout>
