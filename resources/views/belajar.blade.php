Belajar Laravel, Tulisan ini ditampilkan dari Views<br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

<a href="{{ url('siswa/create') }}">Tambah Data</a>
<table border="1">
    <tr>
        <td>No</td>
        <td>Nama Lengkap</td>
        <td>Jenis Kelamin</td>
        <td>Golongan Darah</td>
        <td colspan="2">Aksi</td>
    </tr>
@foreach ($siswa as $row)
    <tr>
        <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
        <td>{{ $row->nama_lengkap }}</td>
        <td>{{ $row->jk }}</td>
        <td>{{ $row->golongan_darah }}</td>
        <td><a href="{{ url('/siswa/edit/' . $row->id) }}">Edit</a></td>
        <td>
            <form action="{{ url('/siswa', $row->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>