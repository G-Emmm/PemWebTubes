@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manajemen Unit</h2>
            </div>
            <div class="pull-right">
                @can('ref_unit-create')
                <a class="btn btn-success" href="{{ route('ref_unit.create') }}"> Tambah Unit</a>
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
            <th>Level Unit</th>
            <th>Status</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($ref_unit as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->id }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->level }}</td>
                @if ($value->is_active == 1)
                    <td>Aktif</td>
                @else
                    <td>Nonaktif</td>
                @endif
                <td>
                    <form action="{{ route('ref_unit.destroy', $value->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('ref_unit.show', $value->id) }}">Detail</a>
                        @can('ref_unit-edit')
                            <a class="btn btn-primary" href="{{ route('ref_unit.edit', $value->id) }}">Edit</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('ref_unit-delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        @endcan

                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
