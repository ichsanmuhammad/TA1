@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-4 d-flex justify-content-end align-items-center">
                    <h1 class="mr-auto">Info Dokter {{ $dokter->nama_dokter }}</h1>
                    <a href="{{ url('/dokters/'.$dokter->id.'/edit') }}" class="btn btn-info">Edit</a>
                    @can('delete', $dokter)
                        <form action="{{ url('/dokters/'.$dokter->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    @endcan
                </div>
                <hr>
                @if (session()->has('pesan'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('pesan') }}
                        </div>
                @endif
                <ul>
                    <li>Nama Dokter : {{ $dokter->nama_dokter }}</li>
                    <li>Jam Praktek : {{ $dokter->jam_praktek }}</li>
                    <li>Jumlah Pasien : {{ $dokter->jumlah_pasien }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection