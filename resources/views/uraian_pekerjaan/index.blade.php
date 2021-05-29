@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Manajemen Pekerjaan</h2>
            </div>
            <div class="pull-right">
                @can('uraian_pekerjaan-create')
                <a class="btn btn-success" href="{{ route('uraian_pekerjaan.create') }}"> Tambah Uraian Pekerjaan</a>
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
            <th>Uraian</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach ($uraian_pekerjaan as $key => $value)
        <tr class="text-center">
            <td>{{ ++$i }}</td>
            <td>{{ $value->id }}</td>
            <td>{{ $value->uraian }}</td>
            <td>{{ $value->keterangan }}</td>
            @if ($value->is_active)
                <td>Aktif</td>
            @else
                <td>Nonaktif</td>
            @endif
            <td>
                <form action="{{ route('uraian_pekerjaan.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('uraian_pekerjaan.show',$value->id) }}">Detail</a>    
                    @can('uraian_pekerjaan-edit')
                    <a class="btn btn-primary" href="{{ route('uraian_pekerjaan.edit',$value->id) }}">Edit</a>       
                    @endcan
                    
                    @csrf
                    @method('DELETE')  
                    @can('uraian_pekerjaan-delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
@endsection