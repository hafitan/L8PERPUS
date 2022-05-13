@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rayon</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rayons.create') }}">Create</a>
            </div>
        </div>
    </div>
    <br>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>Rayon</th>
            <th>Pembimbing</th>
            <th>NO Hp</th>
            <th width="280px">action</th>
        </tr>
        @foreach ($rayons as $rayon)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rayon->rayon }}</td>
            <td>{{ $rayon->pembimbing }}</td>
            <td>{{ $rayon->no_hp }}</td>
            <td>
                <form action="{{ route('rayons.destroy', $rayon->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('rayons.edit', $rayon->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Mau hapus {{ $rayon->rayon }} ?')">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach
    </table>
    {!! $rayons->links('vendor.pagination.custom') !!}
@endsection
