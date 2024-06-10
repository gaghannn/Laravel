@session('error')
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endsession

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Perhatian!!</strong>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Form Siswa</h1>
<form action="{{ url('siswa', @$siswa->id) }}" method="post">
    @csrf

    @if (!empty(@$siswa))
        @method('PATCH')
    @endif

    NIS : <input type="text" name="nis" value="{{ old('nis') }}"><br>
    Nama Lengkap : <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"><br>
    Jenis Kelamin : <br>
    <label for="L"><input type="radio" name="jk" id="L" value="L" {{ old('jk', @$siswa->jk) == "L" ? "checked" : "" }}>Laki-laki</label>
    <label for="P"><input type="radio" name="jk" id="P" value="P" {{ old('jk', @$siswa->jk) == "P" ? "checked" : "" }}>Perempuan</label><br>
    Golongan Darah :
    <select name="golongan_darah" >
        <option value="">Pilihan Golongan Darah</option>
        <option value="A" {{ old('golongan_darah', @$siswa->golongan_darah) == "A" ? "selected" : ""}}>A</option>
        <option value="B" {{ old('golongan_darah', @$siswa->golongan_darah) == "B" ? "selected" : ""}}>B</option>
        <option value="AB" {{ old('golongan_darah', @$siswa->golongan_darah) == "AB" ? "selected" : ""}}>AB</option>
        <option value="O" {{ old('golongan_darah', @$siswa->golongan_darah) == "O" ? "selected" : ""}}>O</option>
    </select>
    <input type="submit" value="Simpan">
</form>