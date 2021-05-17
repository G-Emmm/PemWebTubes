@extends('ref_jabatan.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ref Jabatan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('ref_jabatan.create') }}"> Tambah Ref Jabatan</a>
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
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Inserted by</th>
            <th>Inserted at</th>
            <th>Edited by</th>
            <th>Edited at</th>
            <th>Status</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($ref_jabatan as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->keterangan }}</td>
            <td>{{ $value->inserted_by }}</td>
            <td>{{ $value->inserted_at }}</td>
            <td>{{ $value->edited_by }}</td>
            <td>{{ $value->edited_at }}</td>
            @if ($value->is_active == 1)
                <td>Aktif</td>
            @else
                <td>Nonaktif</td>
            @endif
            <td>
                <form action="{{ route('ref_jabatan.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('ref_jabatan.show',$value->id) }}">Tampilkan</a>    
                    <a class="btn btn-primary" href="{{ route('ref_jabatan.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
@endsection