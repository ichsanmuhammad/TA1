<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="pt-3 d-flex justify-content-end align-items-center">
                    <h1 class="h1 mr-auto">Biodata {{$pasien->nama}}</h1>
                    <a href="{{ route('pasiens.edit', $pasien->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('pasiens.destroy', $pasien->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
                <hr>
                @if (session('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session('pesan') }}
                    </div>
                @endif
                <ul>
                    <li>Nik : {{ $pasien->nik }}</li>
                    <li>Nama : {{ $pasien->nama }}</li>
                    <li>Jenis_kelamin : {{ $pasien->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</li>
                    <li>Nama_dokter : {{ $pasien->nama_dokter }}</li>
                    <li>Alamat : {{ $pasien->alamat == '' ? 'N/A' : $pasien->alamat}}</li>
                    <a href="{{ route('pasiens.index') }}" class="btn btn-info">Kembali</a>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>