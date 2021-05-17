@extends('skp_target.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>skp_target</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('skp_target.create') }}"> Tambah skp_target</a>
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
            <th>No</th>
            <th>id_pegawai</th>
            <th>id_periode</th>
            <th>id_jabatan</th>
            <th>inserted_by</th>
            <th>edited_by</th>
            <th>id_uraian_pekerjaan</th>
            <th>id_uraian_pekerjaan_jabatan</th>
            <th>jml_target</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($skp_target as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->id_pegawai }}</td>
            <td>{{ $value->id_periode }}</td>
            <td>{{ $value->id_jabatan }}</td>
            <td>{{ $value->inserted_by }}</td>
            <td>{{ $value->edited_by }}</td>
            <td>{{ $value->id_uraian_pekerjaan }}</td>
            <td>{{ $value->id_uraian_pekerjaan_jabatan }}</td>
            <td>{{ $value->jml_target }}</td>
            @if ($value->is_active == 1)
                <td>Aktif</td>
            @else
                <td>Nonaktif</td>
            @endif
            <td>
                <form action="{{ route('skp_target.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('skp_target.show',$value->id) }}">Tampilkan</a>    
                    <a class="btn btn-primary" href="{{ route('skp_target.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
@endsection