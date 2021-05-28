@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit uraian_pekerjaan</h2>
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
  
    <form action="{{ route('uraian_pekerjaan.update',$uraian_pekerjaan->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>uraian:</strong>
                    <textarea class="form-control" style="height:150px" name="uraian" placeholder="Masukkan uraian uraian_pekerjaan">{{ $uraian_pekerjaan->uraian }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>keterangan:</strong>
                    <textarea class="form-control" style="height:150px" name="keterangan" placeholder="Masukkan keterangan uraian_pekerjaan">{{ $uraian_pekerjaan->keterangan }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>poin:</strong>
                    <input type="text" name="poin" class="form-control" placeholder="Masukkan poin uraian_pekerjaan" value={{ $uraian_pekerjaan->poin }}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>satuan:</strong>
                    <input type="text" name="satuan" class="form-control" placeholder="Masukkan satuan uraian_pekerjaan" value={{ $uraian_pekerjaan->satuan }}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Edited by:</strong>
                    <input type="text" name="edited_by" class="form-control" placeholder="Masukkan nama Anda">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>is_active:</strong>
                    <input type="text" name="is_active" class="form-control" placeholder="Masukkan status Anda" value={{ $uraian_pekerjaan->is_active }}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection