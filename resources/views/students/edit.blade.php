@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
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

    <form action="{{ route('students.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis:</strong>
                    <input type="number" min=0 name="nis" class="form-control" placeholder="NIS" value="{{$student->nis}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nama:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="nama" value="{{$student->nama}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rayon:</strong>
                    <select name="rayon" class="form-control" id="">
                        <option value="">--Pilih--</option>
                        @foreach ($rayons as $rayon)
                            <option value="{{ $rayon->rayon }}" @if($student->rayon == $rayon->rayon)selected @endif>{{ $rayon->rayon }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>rombel:</strong>
                    <select name="rombel" class="form-control" id="">
                        <option value="">--Pilih--</option>
                        @foreach ($rombels as $rombel)
                            <option value="{{ $rombel->rombel }}" @if($student->rombel == $rombel->rombel)selected @endif>{{ $rombel->rombel }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>jenis kelamin:</strong>
                    <select name="jk" class="form-control" id="">
                        <option value="{{ $student->jk }}">{{ $student->jk }}</option>
                        <option value="">--Pilih--</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
