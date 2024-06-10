<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Belajar Laravel</h1>
        <p class="lead">Tulisan ini tampilan dari Views</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ url('kelas/create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Lokasi Ruangan</th>
                    <th>Nama Wali Kelas</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $row)
                <tr>
                    <td>{{ isset($i) ? ++$i : $i = 1}}</td>
                    <td>{{ $row->nama_kelas }}</td>
                    <td>{{ $row->jurusan }}</td>
                    <td>{{ $row->lokasi_ruangan }}</td>
                    <td>{{ $row->nama_wali_kelas }}</td>
                    <td>
                        <a href="{{ url('/kelas/edit/' . $row->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('/kelas', $row->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
