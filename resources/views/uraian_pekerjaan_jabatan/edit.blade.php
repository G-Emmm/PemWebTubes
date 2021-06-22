@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Uraian Pekerjaan Jabatan</h2>
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
  
    <form action="{{ route('uraian_pekerjaan_jabatan.update',$uraian_pekerjaan_jabatan->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jabatan:</strong>
                    {!! Form::select('id_jabatan', $jabatan, $jabatanUraianPekerjaan, array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Uraian Pekerjaan:</strong>
                    {!! Form::select('id_uraian_pekerjaan', $uraian_pekerjaan, $uraianPekerjaanPerJabatan, array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status keaktifan (0=nonaktif, 1=aktif):</strong>
                    <input type="text" name="is_active" class="form-control" placeholder="Masukkan status keaktifan" value={{ $uraian_pekerjaan_jabatan->is_active }}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection