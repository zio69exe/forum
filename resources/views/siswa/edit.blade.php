@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inputs</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="namaDepan" class="control-label">Nama Depan</label>
                                    <input name="nama_depan" type="text" class="form-control" id="namaDepan" value="{{ $siswa->nama_depan }}">
                                </div>

                                <div class="form-group">
                                    <label for="namaBelakang" class="control-label">Nama Belakang</label>
                                    <input name="nama_belakang" type="text" class="form-control" id="namaBelakang" value="{{ $siswa->nama_belakang }}">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" aria-label="Jenis Kelamin">
                                        <option value="Laki-Laki" @if($siswa->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="agama" class="control-label">Agama</label>
                                    <input name="agama" type="text" class="form-control" id="agama" value="{{ $siswa->agama }}">
                                </div>

                                <div class="form-group">
                                    <label for="alamat" class="control-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" placeholder="Alamat" id="floatingTextarea2" rows="3">{{ $siswa->alamat }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="alamat" class="control-label">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer gap-3">
                            <!-- Tombol Cancel dengan tautan kembali -->
                            <a href="/siswa" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

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

        <div class="lg-12">
            <form action="/siswa/{{ $siswa->id }}/update" method="POST">
                            
                @csrf
                <div class="mb-3">
                <label for="namaDepan" class="form-label">Nama Depan</label>
                <input name="nama_depan" type="text" class="form-control" id="namaDepan" value="{{ $siswa->nama_depan }}">
                </div>
                
                <div class="mb-3">
                    <label for="namaBelakang" class="form-label">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="namaBelakang" value="{{ $siswa->nama_belakang }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" aria-label="Default select example" >
                        <option selected>Jenis Kelamin</option>
                        <option value="Laki-Laki" @if($siswa->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                        <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input name="agama" type="text" class="form-control" id="agama" value="{{ $siswa->agama }}">
                </div>
                
                <div class="mb-3">
                    <label for="agama" class="form-label">Alamat</label>
                    <div class="form-floating">
                        <textarea name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $siswa->alamat }}</textarea>
                        <label for="floatingTextarea2">Alamat</label>
                    </div>
                </div>

                
            </div>
            <div class="modal-footer gap-3">
                <a href="/siswa"><button type="button" class="btn btn-secondary">Cancel</button></a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
