<x-app-layout>
    <h1>Tambah Bahan Baku</h1>

<form method="POST" action="{{ route('bahan.store') }}">
    @csrf
    <input name="nama_bahan" placeholder="Nama Bahan"><br>
    <input name="kategori" placeholder="Kategori"><br>
    <input name="stok" type="number" placeholder="Stok"><br>

    <select name="satuan">
        <option value="pcs">pcs</option>
        <option value="gram">gram</option>
        <option value="liter">liter</option>
        <option value="bungkus">bungkus</option>
    </select><br>

    <input name="harga" type="number" placeholder="Harga Beli"><br>

    <select name="status_bahan">
        <option value="tersedia">Tersedia</option>
        <option value="menipis">Menipis</option>
        <option value="habis">Habis</option>
    </select><br>

    <textarea name="catatan" placeholder="Catatan (opsional)"></textarea><br>

    <button type="submit">Simpan</button>
</form>
</x-app-layout>