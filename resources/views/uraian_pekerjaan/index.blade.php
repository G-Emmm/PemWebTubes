@extends('uraian_pekerjaan.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Uraian Pekerjaan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('uraian_pekerjaan.create') }}"> Tambah Uraian Pekerjaan</a>
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
            <th class="text-center">Uraian</th>
            <th class="text-center">Keterangan</th>
            <th class="text-center">Poin</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Is Active</th>
            <th class="text-center">Aksi</th>
        </tr>
        @foreach ($uraian_pekerjaan as $key => $value)
        <tr class="text-center">
            <td>{{ $value->id - ($uraian_pekerjaan[0]->id) + 1 }}</td>
            <td>{{ $value->uraian }}</td>
            <td>{{ $value->keterangan }}</td>
            <td>{{ $value->poin }}</td>
            <td>{{ $value->satuan }}</td>
            @if ($value->is_active)
                <td>Aktif</td>
            @else
                <td>Nonaktif</td>
            @endif
            <td>
                <form action="{{ route('uraian_pekerjaan.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('uraian_pekerjaan.show',$value->id) }}">Tampilkan</a>    
                    <a class="btn btn-primary" href="{{ route('uraian_pekerjaan.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')  
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
@endsection