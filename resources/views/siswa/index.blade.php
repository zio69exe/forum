@extends('layout.master')

@section('content')
  <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading">
                <div class="right">

                  <a href="/siswa">
                    <button type="button" class="btn btn-outline-secondary">
                      <i class="lnr lnr-eye"></i> Show All
                    </button>
                  </a>

                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                  <i class="lnr lnr-plus-circle"></i> Add Data
                </button>
                
              
              </div>
                <h3 class="panel-title">Hover Row</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach ($data_siswa as $siswa)
                    <tr>
                        <td> 
                          <a href="/siswa/{{ $siswa->id }}/profile">
                            {{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}
                          </a>
                        </td>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                        <td>{{ $siswa->agama }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>
                          <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                          <a href="/siswa/{{ $siswa->id }}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data : {{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/create" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="namaDepan" class="form-label">Nama Depan</label>
            <input name="nama_depan" type="text" class="form-control" id="namaDepan">
          </div>
          <div class="mb-3">
            <label for="namaBelakang" class="form-label">Nama Belakang</label>
            <input name="nama_belakang" type="text" class="form-control" id="namaBelakang">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email">
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
              <option selected>Pilih Jenis Kelamin</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <input name="agama" type="text" class="form-control" id="agama">
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="alamat" class="control-label">Avatar</label>
            <input type="file" name="avatar" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->  
  
@stop

@section('content1')
@if (session()->has('success'))
  <div class="alert alert-success" role="alert">
      {{ session('success') }}
  </div>
@endif
      <div class="row">

        <div class="col-6">
            <h1>DATA SISWA</h1>
        </div>

        <div class="col-6 mt-3">
          <div class="d-flex justify-content-end gap-2">

            <a href="/siswa">
              <button type="button" class="btn btn-sm btn-primary">
                Show All
              </button>
          </a>

            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data
            </button>
        
        </div>
        
              

              
        </div>

        <table class="table table-hover table-striped">
          <thead class="thead-dark">
              <tr>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($data_siswa as $siswa)
              <tr>
                  <td>
                      {{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}
                  </td>
                  <td>{{ $siswa->jenis_kelamin }}</td>
                  <td>{{ $siswa->agama }}</td>
                  <td>{{ $siswa->alamat }}</td>
                  <td>
                    <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <a href="/siswa/{{ $siswa->id }}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data : {{ $siswa->nama_depan }} {{ $siswa->nama_belakang }}')">Delete</a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>

    </div>


@endsection
