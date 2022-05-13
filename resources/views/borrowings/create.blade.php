@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('borrowings.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('borrowings.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis:</strong>
                    <select name="nis" class="form-control" id="" required>
                        <option value="">--pilih</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->nis }}">{{ $student->nis }}</option>
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <select name="nama" class="form-control" id="" required>
                        <option value="">--Pilih--</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->nama }}">{{ $student->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rombel:</strong>
                    <select name="rombel" class="form-control" required id="">
                        <option value="">--Pilih--</option>
                        @foreach ($rombels as $rombel)
                            <option value="{{ $rombel->rombel }}">{{ $rombel->rombel }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rayon:</strong>
                    <select name="rayon" class="form-control" required id="">
                        <option value="">--Pilih--</option>
                        @foreach ($rayons as $rayon)
                            <option value="{{ $rayon->rayon }}">{{ $rayon->rayon }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis kelamin:</strong>
                    <select name="jk" class="form-control" required  id="">
                        <option value="">--Pilih--</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul buku:</strong>
                    <select name="judul" class="form-control" required id="">
                        <option value="">--Pilih</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->judul }}">{{ $book->judul }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>petugas:</strong>
                    {{-- <input type="text" name="petugas" class="form-control" required placeholder="Petugas" id=""> --}}
                    <select name="petugas" class="form-control" id="">
                        <option value="">--Pilih--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                    <strong>Tanggal kembali</strong>
                    <input type="date" class="form-control" required name="tgl_kembali" id="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
@endsection
