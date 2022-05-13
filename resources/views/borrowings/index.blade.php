@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data Peminjam</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('borrowings.create') }}"> Create</a>
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
        <th>Nis</th>
        <th>Nama</th>
        <th>Rombel</th>
        <th>Rayon</th>
        <th>Jenis kelamin</th>
        <th>Judul Buku</th>
        <th>Petugas</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th width="150px">Action</th>
    </tr>
    @foreach ($borrowings as $borrowing)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $borrowing->nis }}</td>
        <td>{{ $borrowing->nama }}</td>
        <td>{{ $borrowing->rombel }}</td>
        <td>{{ $borrowing->rayon }}</td>
        <td>{{ $borrowing->jk }}</td>
        <td>{{ $borrowing->judul }}</td>
        <td>{{ $borrowing->petugas }}</td>
        <td>{{ $borrowing->tgl_pinjam }}</td>
        <td>{{ $borrowing->tgl_kembali }}</td>
        <td> <a class="btn btn-primary" href="{{ route('borrowings.edit',$borrowing->id) }}">Edit</a>

            {{-- <form action="{{ route('borrowings.destroy',$borrowing->id) }}" method="POST">



                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Mau hapus {{ $borrowing->nama }}')">Delete</button>
            </form> --}}
        </td>
    </tr>
    @endforeach
</table>

{!! $borrowings->links('vendor.pagination.custom') !!}

@endsection
