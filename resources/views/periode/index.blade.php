@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manajemen Periode</h2>
            </div>
            <div class="pull-right">
                @can('periode-create')
                <a class="btn btn-success" href="{{ route('periode.create') }}"> Tambah periode</a>
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
            <th>Nama</th>
            <th>Tanggal awal</th>
            <th>Tanggal akhir</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($periode as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->tanggal_awal }}</td>
                <td>{{ $value->tanggal_akhir }}</td>
                <td>
                    <form action="{{ route('periode.destroy', $value->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('periode.show', $value->id) }}">Detail</a>
                        @can('periode-edit')
                            <a class="btn btn-primary" href="{{ route('periode.edit', $value->id) }}">Edit</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('periode-delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        @endcan

                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
