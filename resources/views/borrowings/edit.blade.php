@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
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
    <form action="{{ route('borrowings.update', $borrowing->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis:</strong>
                    <select name="nis" class="form-control" id="" required>
                        <option value="">--pilih</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->nis }}" @if($borrowing->nis == $student->nis)selected @endif>{{ $student->nis }}</option>
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
                        <option value="{{$student->nama}}" @if($borrowing->nama == $student->nama)selected @endif>{{$student->nama}}</option>
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
                            <option value="{{ $rombel->rombel }}" @if($borrowing->rombel == $rombel->rombel)selected @endif>{{ $rombel->rombel }}</option>
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
                            <option value="{{ $rayon->rayon }}" @if ($borrowing->rayon == $rayon->rayon)selected @endif>{{ $rayon->rayon }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- radio button --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis kelamin:</strong>
                    {{-- <select name="jk" class="form-control" required  id="">
                        <option value="">--Pilih--</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select> --}}

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="laki-laki" name="jk" id="jk1">
                        <label class="form-check-label" for="jk1">
                          laki-laki
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="perempuan" name="jk" id="jk2" checked>
                        <label class="form-check-label" for="jk2">
                          perempuan
                        </label>
                      </div>
                </div>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul buku:</strong>
                    <select name="judul" class="form-control" required id="">
                        <option value="">--Pilih</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->judul }}" @if($borrowing->judul == $book->judul)selected @endif>{{ $book->judul }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>petugas:</strong>
                    <select name="petugas" class="form-control" id="">
                        <option value="">--Pilih--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->name }}" @if($borrowing->name == $user->name)selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                    <strong>Tanggal kembali</strong>
                    <input type="date" class="form-control" required name="tgl_kembali" value="{{ $borrowing->tgl_kembali }}" id="">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
@endsection
