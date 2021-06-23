@extends('layouts.admin')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-8 col-md-6">
                <h1>Tambah Dokter</h1>
                <hr>
                <form action="{{ url('/dokters') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_dokter">Nama Dokter</label>
                        <input type="text" class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter" name="nama_dokter" value="{{ old('nama_dokter') }}">
                        @error('nama_dokter')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jam_praktek">Jam Praktek</label>
                        <input type="text" class="form-control @error('jam_praktek') is-invalid @enderror" id="jam_praktek" name="jam_praktek" value="{{ old('jam_praktek') }}">
                        @error('jam_praktek')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pasien">Jumlah Pasien</label>
                        <input type="text" class="form-control @error('jumlah_pasien') is-invalid @enderror" id="jumlah_pasien" name="jumlah_pasien" value="{{ old('jumlah_pasien') }}">
                        @error('jumlah_pasien')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection