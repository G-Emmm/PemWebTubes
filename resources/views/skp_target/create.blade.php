@extends('skp_target.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah skp_target</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('skp_target.index') }}"> Kembali</a>
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
   
<form action="{{ route('skp_target.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Pegawai</strong>
                <input type="text" name="id_pegawai" class="form-control" placeholder="Masukkan Id Pegawai">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Periode</strong>
                <input type="text" name="id_periode" class="form-control" placeholder="Id Periode">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Jabatan</strong>
                <textarea class="form-control" style="height:150px" name="id_jabatan" placeholder="Masukkan Id Jabatan"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inserted By</strong>
                <input type="text" name="inserted_by" class="form-control" placeholder="Inserted By">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Edited By</strong>
                <input type="text" name="edited_by" class="form-control" placeholder="Edited By">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Uraian Pekerjaan</strong>
                <input type="text" name="id_uraian_pekerjaan" class="form-control" placeholder="Masukkan Id Uraian Pekerjaan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id Uraian Pekerjaan Jabatan</strong>
                <input type="text" name="id_uraian_pekerjaan_jabatan" class="form-control" placeholder="Id Uraian Pekerjaan Jabatan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah Target</strong>
                <input type="text" name="jml_target" class="form-control" placeholder="Masukkan Jumlah Target">
            </div>
        </div>
        {{-- kurang getter untuk edited by, inserted by --}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection