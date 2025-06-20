<x-app-layout>
    <h1>Edit Produk</h1>

    <form method="POST" action="{{ route('produk.update', $produk->id) }}">
        @csrf @method('PUT')
        <input name="nama_produk" value="{{ $produk->nama_produk }}"><br>
        <select name="kategori">
            <option {{ $produk->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
            <option {{ $produk->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
            <option {{ $produk->kategori == 'Snack' ? 'selected' : '' }}>Snack</option>
        </select><br>
        <input name="harga_jual" type="number" value="{{ $produk->harga_jual }}"><br>
        <input name="stok" type="number" value="{{ $produk->stok }}"><br>
        <select name="satuan">
            <option {{ $produk->satuan == 'pcs' ? 'selected' : '' }}>pcs</option>
            <option {{ $produk->satuan == 'gelas' ? 'selected' : '' }}>gelas</option>
            <option {{ $produk->satuan == 'bungkus' ? 'selected' : '' }}>bungkus</option>
        </select><br>
        <select name="status_produk">
            <option {{ $produk->status_produk == 'Aktif' ? 'selected' : '' }}>Aktif</option>
            <option {{ $produk->status_produk == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
        </select><br>
        <textarea name="deskripsi">{{ $produk->deskripsi }}</textarea><br>
        <button type="submit">Update</button>
    </form>
</x-app-layout>