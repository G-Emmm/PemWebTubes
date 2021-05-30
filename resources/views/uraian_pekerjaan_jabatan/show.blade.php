@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2> Detail Pekerjaan di Jabatan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('uraian_pekerjaan_jabatan.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama jabatan:</strong>
                {{ $namaJabatan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Uraian Pekerjaan:</strong>
                {{ $namaPekerjaan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inserted By:</strong>
                {{ $uraian_pekerjaan_jabatan->inserted_by }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inserted At:</strong>
                {{ $uraian_pekerjaan_jabatan->inserted_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Edited By:</strong>
                {{ $uraian_pekerjaan_jabatan->edited_by }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Edited At:</strong>
                {{ $uraian_pekerjaan_jabatan->edited_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status keaktifan:</strong>
                @if ($uraian_pekerjaan_jabatan->is_active == 1)
                    Aktif
                @else
                    Nonaktif
                @endif
            </div>
        </div>
    </div>
@endsection
