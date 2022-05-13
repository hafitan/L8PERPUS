
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rombel</h2>
            </div>
            <div class="pull-right">
                <a hidden class="btn btn-success" href="{{ route('rombels.create') }}"> Create</a>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('rombels.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Rombel</strong>
                                            <input type="text" name="rombel" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                    </div>
                                    <div class="modal-footer">
                                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                        <button type="submit" class="btn btn-primary">simpan</button>
                                    </div>
                                </div>
                            </form>
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

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Rombel</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rombels as $rombel)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $rombel->rombel }}</td>
                        <td>
                            <form action="{{ route('rombels.destroy',$rombel->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('rombels.edit',$rombel->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" onclick="return confirm('mau hapus {{ $rombel->rombel }}')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Rombel</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rombels as $rombel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $rombel->rombel }}</td>
            <td>
                <form action="{{ route('rombels.destroy',$rombel->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('rombels.edit',$rombel->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('mau hapus {{ $rombel->rombel }}')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table> --}}
    {!! $rombels->links('vendor.pagination.custom') !!}

@endsection

@push('js')
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    })
</script>
@endpush
