@extends('layouts.app')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Uraian Pekerjaan Jabatan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('uraian_pekerjaan_jabatan.create') }}"> Tambah Uraian Pekerjaan Jabatan</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Id Jabatan</th>
            <th class="text-center">Id Uraian Pekerjaan</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
        </tr>
        @foreach ($uraian_pekerjaan_jabatan as $key => $value)
        <tr class="text-center">
            <td>{{ $value->id - ($uraian_pekerjaan_jabatan[0]->id) + 1 }}</td>
            <td>{{ Str::substr($value->id_uraian_pekerjaan_jabatan_composite, 0, Str::length($value->id_uraian_pekerjaan_jabatan_composite)/2) }}</td>
            <td>{{ Str::substr($value->id_uraian_pekerjaan_jabatan_composite, Str::length($value->id_uraian_pekerjaan_jabatan_composite)/2, Str::length($value->id_uraian_pekerjaan_jabatan_composite)/2) }}</td>
            @if ($value->is_active == 1)
                <td>Aktif</td>
            @else
                <td>Nonaktif</td>
            @endif
            <td>
                <form action="{{ route('uraian_pekerjaan_jabatan.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('uraian_pekerjaan_jabatan.show',$value->id) }}">Tampilkan</a>    
                    <a class="btn btn-primary" href="{{ route('uraian_pekerjaan_jabatan.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
@endsection