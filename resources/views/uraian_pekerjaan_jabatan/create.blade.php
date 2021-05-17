@extends('uraian_pekerjaan_jabatan.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Uraian Pekerjaan Jabatan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('uraian_pekerjaan_jabatan.index') }}"> Kembali</a>
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
   
<form action="{{ route('uraian_pekerjaan_jabatan.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Jabatan:</strong>
                <input type="text" name="id_jabatan" class="form-control" placeholder="Masukkan Id Jabatan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Uraian Pekerjaan:</strong>
                <input type="text" name="id_uraian_pekerjaan" class="form-control" placeholder="Masukkan Id Uraian Pekerjaan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inserted By:</strong>
                <input type="text" name="inserted_by" class="form-control" placeholder="Masukkan Inserted By">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status keaktifan:</strong>
                <input type="text" name="is_active" class="form-control" placeholder="Masukkan status keaktifan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection