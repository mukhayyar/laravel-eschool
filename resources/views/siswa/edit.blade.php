@extends('layouts.master')

@section('content')

<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">

                    <div class="panel-heading">
                    <h3 class="panel-title">Edit Data Siswa</h3>
                    </div>

                    <div class="panel-body">
                    <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group{{$errors->has('nama_depan') ? 'has-error' : ''}}">
            <label for="exampleFormControlInput1">Nama Depan</label>
            <input name="nama_depan" type="text" class="form-control" value="{{$siswa->nama_depan}}" id="exampleFormControlInput1">
            @if($errors->has('nama_depan'))
            <span class="help-block">{{$errors->first('nama_depan')}}</span>
             @endif
        </div>
        <div class="form-group{{$errors->has('nama_belakang') ? 'has-error' : ''}}">
            <label for="exampleFormControlInput1">Nama Belakang</label>
            <input name="nama_belakang" type="text" class="form-control" value="{{$siswa->nama_belakang}}" id="exampleFormControlInput1">
            @if($errors->has('nama_belakang'))
            <span class="help-block">{{$errors->first('nama_belakang')}}</span>
             @endif
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
            <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Agama</label>
            <input name="agama" type="text" class="form-control" id="exampleFormControlInput1" value="{{$siswa->agama}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
        </div>
        <div class="form-group{{$errors->has('avatar') ? 'has-error' : ''}}">
            <label for="exampleFormControlTextarea1">Avatar</label>
            <input type="file" name="avatar" class="form-control">
            @if($errors->has('avatar'))
            <span class="help-block">{{$errors->first('avatar')}}</span>
             @endif
        </div>
        <a href="/siswa" class="btn btn-secondary" data-dismiss="modal">Tutup</a></button>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
                    </div>
                    @section('aktif2','active')
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>

@stop

@section('content1')
        <div class="col-6">
        <h1>Edit data siswa</h1>
        </div>

        <form action="/siswa/{{$siswa->id}}/update" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Depan</label>
            <input name="nama_depan" type="text" class="form-control" value="{{$siswa->nama_depan}}" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Belakang</label>
            <input name="nama_belakang" type="text" class="form-control" value="{{$siswa->nama_belakang}}" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
            <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Agama</label>
            <input name="agama" type="text" class="form-control" id="exampleFormControlInput1" value="{{$siswa->agama}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
        </div>
        <a href="/siswa" class="btn btn-secondary" data-dismiss="modal">Tutup</a></button>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @endsection
