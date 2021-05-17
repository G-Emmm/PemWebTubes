@extends('uraian_pekerjaan.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Tampilkan uraian_pekerjaan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('uraian_pekerjaan.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>uraian:</strong>
                {{ $uraian_pekerjaan->uraian }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>keterangan:</strong>
                {{ $uraian_pekerjaan->keterangan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>poin:</strong>
                {{ $uraian_pekerjaan->poin }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>satuan:</strong>
                {{ $uraian_pekerjaan->satuan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inserted by:</strong>
                {{ $uraian_pekerjaan->inserted_by }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inserted at:</strong>
                {{ $uraian_pekerjaan->inserted_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Edited by:</strong>
                {{ $uraian_pekerjaan->edited_by }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Edited at:</strong>
                {{ $uraian_pekerjaan->edited_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status keaktifan:</strong>
                @if ($uraian_pekerjaan->is_active)
                    Aktif
                @else
                    Nonaktif
                @endif
            </div>
        </div>
    </div>
@endsection
