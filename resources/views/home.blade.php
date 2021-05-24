@extends('layouts.app')

@section('content')
<div>
    <div style="margin-left: 30%; margin-top: 150px;" class="fs-2 fw-bold text-start">
        SELAMAT DATANG <br><strong style="color: #333399;"
            class="text-uppercase fs-1">{{ Auth::user()->name }}!</strong>
    </div>
    <p style="margin-left: 30%;" class="text-start">
        Selamat datang <strong> {{ Auth::user()->name }} </strong> di website Sistem Kinerja Pegawai.
    </p>
</div>

@endsection