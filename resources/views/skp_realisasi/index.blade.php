@extends('skp_realisasi.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>skp_realisasi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('skp_realisasi.create') }}"> Tambah skp_realisasi</a>
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
            <th>id_skp_target</th>
            <th>lokasi</th>
            <th>jml_realisasi</th>
            <th>keterangan</th>
            <th>path_bukti</th>
            <th>inserted_by</th>
            <th>edited_by</th>
            <th>tanggal_awal</th>
            <th>tanggal_akhir</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($skp_realisasi as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->id_skp_target }}</td>
            <td>{{ $value->lokasi }}</td>
            <td>{{ $value->jml_realisasi }}</td>
            <td>{{ $value->keterangan }}</td>
            <td>{{ $value->path_bukti }}</td>
            <td>{{ $value->inserted_by }}</td>
            <td>{{ $value->edited_by }}</td>
            <td>{{ $value->tanggal_awal }}</td>
            <td>{{ $value->tanggal_akhir }}</td>
            @if ($value->is_active == 1)
                <td>Aktif</td>
            @else
                <td>Nonaktif</td>
            @endif
            <td>
                <form action="{{ route('skp_realisasi.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('skp_realisasi.show',$value->id) }}">Tampilkan</a>    
                    <a class="btn btn-primary" href="{{ route('skp_realisasi.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
@endsection