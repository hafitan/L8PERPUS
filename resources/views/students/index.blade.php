@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>nis</th>
            <th>nama</th>
            <th>rombel</th>
            <th>rayon</th>
            <th>jk</th>
            <th width="280px">action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->rombel }}</td>
            <td>{{ $student->rayon }}</td>
            <td>{{ $student->jk }}</td>
            <td>
                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                    <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Mau hapus {{ $student->nama }} ?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $students->links('vendor.pagination.custom') !!}

@endsection

