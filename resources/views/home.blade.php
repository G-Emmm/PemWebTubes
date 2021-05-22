@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sistem Kinerja Pegawai</div>
                <div class="card-body">
                    Selamat datang <strong>{{ Auth::user()->name }}</strong> !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
