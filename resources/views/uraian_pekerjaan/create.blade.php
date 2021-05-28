@extends('layouts.app')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Uraian Pekerjaan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('uraian_pekerjaan.index') }}"> Kembali</a>
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
   
<form action="{{ route('uraian_pekerjaan.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Uraian:</strong>
                <textarea class="form-control" style="height:150px" name="uraian" placeholder="Masukkan uraian pekerjaan"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <textarea class="form-control" style="height:150px" name="keterangan" placeholder="Masukkan keterangan pekerjaan"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Poin:</strong>
                <input type="text" name="poin" class="form-control" placeholder="Masukkan poin Pekerjaan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Satuan:</strong>
                <input type="text" name="satuan" class="form-control" placeholder="Masukkan satuan pekerjaan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inserted by:</strong>
                <input type="text" name="inserted_by" class="form-control" placeholder="Masukkan nama Anda">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Is Active:</strong>
                <input type="text" name="is_active" class="form-control" placeholder="Masukkan status Anda">
            </div>
        </div>
        {{-- kurang getter untuk edited by, inserted by --}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection