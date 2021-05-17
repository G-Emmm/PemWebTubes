@extends('pegawai.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit pegawai</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pegawai.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" value="{{ $pegawai->nama }}" class="form-control" placeholder="Nama pegawai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode pegawai:</strong>
                    <input type="text" name="kode_pegawai" value="{{ $pegawai->kode_pegawai }}" class="form-control" placeholder="Kode pegawai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <textarea class="form-control" style="height:150px" name="alamat" placeholder="Alamat pegawai">{{ $pegawai->alamat }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status keaktifan:</strong>
                    <input type="text" name="is_active" value="{{ $pegawai->is_active }}" class="form-control" placeholder="Status keaktifan pegawai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID unit:</strong>
                    <input type="text" name="id_unit" value="{{ $pegawai->id_unit }}" class="form-control" placeholder="ID unit pegawai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID jabatan:</strong>
                    <input type="text" name="id_jabatan" value="{{ $pegawai->id_jabatan }}" class="form-control" placeholder="ID jabatan pegawai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID user:</strong>
                    <input type="text" name="id_user" value="{{ $pegawai->id_user }}" class="form-control" placeholder="ID user pegawai">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Inserted by:</strong>
                    <input type="text" name="inserted_by" value="{{ $pegawai->inserted_by }}" class="form-control" placeholder="Inserted by">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Edited by:</strong>
                    <input type="text" name="edited_by" value="{{ $pegawai->edited_by }}" class="form-control" placeholder="Edited by">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection