<x-app-layout>
    <h1>Tambah Produk</h1>

    <form method="POST" action="{{ route('produk.store') }}">
        @csrf
        <input name="nama_produk" placeholder="Nama Produk"><br>
        <select name="kategori">
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
            <option value="Snack">Snack</option>
        </select><br>
        <input name="harga_jual" type="number" placeholder="Harga"><br>
        <input name="stok" type="number" placeholder="Stok"><br>
        <select name="satuan">
            <option value="pcs">pcs</option>
            <option value="gelas">gelas</option>
            <option value="bungkus">bungkus</option>
        </select><br>
        <select name="status_produk">
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select><br>
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br>
        <button type="submit">Simpan</button>
    </form>
</x-app-layout>