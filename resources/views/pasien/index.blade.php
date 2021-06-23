@extends('layouts.admin')
@section('title', 'Halaman pasien')
    
@section('content')
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nik</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Nama Dokter</th>
                      <th>Alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($pasiens as $pasien)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('pasiens.show', ['pasien' => $pasien->id]) }}">{{ $pasien->nik }}</a></td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                        <td>{{ $pasien->dokter->nama_dokter }}</td>
                        <td>{{ $pasien->alamat == '' ? 'N/A' : $pasien->alamat }}</td>
                    </tr>
                      @empty
                          <td colspan="6" class="text-center">Data Kosong</td>
                      @endforelse
                  </tbody>
                </table>
              </div>
                
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection