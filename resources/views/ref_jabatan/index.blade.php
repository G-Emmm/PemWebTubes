@extends('layouts.app')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manajemen Jabatan</h2>
            </div>
            <div class="pull-right">
                @can('ref_jabatan-create')
                <a class="btn btn-success" href="{{ route('ref_jabatan.create') }}"> Tambah Jabatan</a>
                @endcan
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
            <th>ID</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($ref_jabatan as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->keterangan }}</td>
            @if ($value->is_active == 1)
                <td>Aktif</td>
            @else
                <td>Nonaktif</td>
            @endif
            <td>
                <form action="{{ route('ref_jabatan.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('ref_jabatan.show',$value->id) }}">Detail</a>    
                    @can('ref_jabatan-edit')
                    <a class="btn btn-primary" href="{{ route('ref_jabatan.edit',$value->id) }}">Edit</a>       
                    @endcan
                    
                    @csrf
                    @method('DELETE')  
                    @can('ref_jabatan-delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>    
                    @endcan    
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
@endsection