@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pegawai</h2>
            </div>
            <div class="pull-right">
                @can('pegawai-create')
                <a class="btn btn-success" href="{{ route('pegawai.create') }}"> Tambah pegawai</a>                    
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
            <th>Kode Pegawai</th>
            <th>Alamat</th>
            <th>Status</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($pegawai as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->kode_pegawai }}</td>
            <td>{{ $value->alamat }}</td>
            @if ($value->is_active == 1)
                <td>Aktif</td>
            @else
                <td>Nonaktif</td>
            @endif
            <td>
                <form action="{{ route('pegawai.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('pegawai.show',$value->id) }}">Detail</a>   
                    @can('pegawai-edit')
                    <a class="btn btn-primary" href="{{ route('pegawai.edit',$value->id) }}">Edit</a>                        
                    @endcan 
   
                    @csrf
                    @method('DELETE')  
                    @can('pegawai-delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    @endcan    
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
@endsection