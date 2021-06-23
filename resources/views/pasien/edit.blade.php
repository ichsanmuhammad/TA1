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
    
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Edit Pasien</h1>
                <hr>
                <form action="{{ route('pasiens.update', $pasien->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') ?? $pasien->nik }}">
                        @error('nik')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $pasien->nama }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin == 'L' ? 'checked' : '' }}>
                        <label for="laki_laki" class="form-check-label">Laki-laki</label>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin == 'P' ? 'checked' : '' }}>
                        <label for="perempuan" class="form-check-label">perempuan</label>
                        </label>
                    </div>
                    @error('jenis_kelamin')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="dokter_id">Nama Dokter</label>
                        <select class="form-control" name="dokter_id" id="dokter_id">
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}" {{ old('dokter_id') ?? $pasien->dokter_id == $dokter->id ? 'selected' : '' }}>
                                    {{ $dokter->nama_dokter }}
                                </option>
                            @endforeach
                        </select>
                        @error('dokter_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ old('alamat') ?? $pasien->alamat }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>