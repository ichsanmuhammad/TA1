@extends('layouts.admin')
@section('title', 'Halaman dokter')

@section('content')
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="py-4 d-flex justify-content-end align-items-center">
                    <h1 class="mr-auto" >Tabel Dokter</h1>
                    @can('create', App\Dokter::class)
                        <a href="{{ url('/dokters/create') }}" class="btn btn-primary">
                            Tambah Dokter
                        </a>
                    @endcan
                </div>
                        @if (session()->has('pesan'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('pesan') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Dokter</th>
                                <th>Jam Praktek</th>
                                <th>Jumlah pasien</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dokters as $dokter)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @can('view', $dokter)
                                    <a href="{{ url('/dokters/'.$dokter->id) }}">{{ $dokter->nama_dokter }}</a>
                                    @endcan
                                    @cannot('view', $dokter)
                                        {{ $dokter->nama_dokter }}
                                    @endcannot
                                </td>
                                <td>{{ $dokter->jam_praktek }}</td>
                                <td>{{ $dokter->jumlah_pasien }}</td>
                            </tr>    
                            @empty
                                <td colspan="6" class="text-center">Data Kosong</td>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection