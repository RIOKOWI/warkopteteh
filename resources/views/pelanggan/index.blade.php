<x-app-layout>
    <h1>Daftar Pelanggan</h1>

    <a href="{{ route('pelanggan.create') }}">Tambah Pelanggan</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>Nama</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>
        @foreach($pelanggans as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->no_hp }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->catatan }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', $p->id) }}">Edit</a> |
                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
