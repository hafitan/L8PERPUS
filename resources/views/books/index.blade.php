@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data book</h2>
            </div>
            <div class="pull-right">
                <a hidden class="btn btn-success" href="{{ route('books.create') }}"> Create</a>
            </div>
            <div class="pull-righ">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Create
                </button>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add new</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Judul</strong>
                                                <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>penerbit</strong>
                                                <input type="text" name="penerbit" class="form-control" placeholder="penerbit" required>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>pengarang</strong>
                                                <input type="text" name="pengarang" class="form-control" placeholder="pengarang" required>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
            <th>Judul Buku</th>
            <th>Penerbit</th>
            <th>pengarang</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $book->judul }}</td>
            <td>{{ $book->penerbit }}</td>
            <td>{{ $book->pengarang }}</td>
            <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('Mau hapus {{ $book->judul }} ?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $books->links('vendor.pagination.custom') !!}
@endsection
