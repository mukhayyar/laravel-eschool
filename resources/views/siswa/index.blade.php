@extends('layouts.master')
@section('search')
<form class="navbar-form navbar-left" method="GET" action="/siswa" >
    
	<div class="input-group">
		<input name="cari" type="text" class="form-control" placeholder="cari">
		<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
	</div>

</form>
@stop
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
                                    <div class="right">
                                    <a href="/siswa/exportexcel">
                                    <i class="fa fa-download">Excel</i>
                                    </a>
                                    
                                    <a href="/siswa/exportpdf">
                                    <i class="fa fa-download">PDF</i>
                                    </a>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalLong">
                                    <i class="lnr lnr-plus-circle"></i>
                                    </button>
                                    </div>
                                    
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Nama Depan</th>
												<th>Nama Belakang</th>
												<th>Jenis Kelamin</th>
                                                <th>Agama</th>
                                                <th>Alamat</th>
                                                <th>Rerata Nilai</th>
                                                <th>Aksi</th>
											</tr>
										</thead>
                                        @foreach($data_siswa as $siswa)
										<tbody>
											<tr>
												<td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
												<td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
												<td>{{$siswa->jenis_kelamin}}</td>
                                                <td>{{$siswa->agama}}</td>
                                                <td>{{$siswa->alamat}}</td>
                                                <td>{{$siswa->rataRataNilai()}}</td>
                                                <td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?') "><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                
										</tbody>
                                        @endforeach
									</table>
								</div>
							</div>  
                            @section('aktif2','active')
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Isi Form Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form action="siswa/create" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-group{{$errors->has('nama_depan') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Hafiz" value="{{old('nama_depan')}}">
                                @if($errors->has('nama_depan'))
                                 <span class="help-block">{{$errors->first('nama_depan')}}</span>
                                 @endif
                            </div>
                            <div class="form-group{{$errors->has('nama_belakang') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Randani" value="{{old('nama_belakang')}}">
                                @if($errors->has('nama_belakang'))
                                 <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                                 @endif
                            </div>
                            <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Email" value="{{old('email')}}">
                                @if($errors->has('email'))
                                 <span class="help-block">{{$errors->first('email')}}</span>
                                 @endif
                            </div>
                            <div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option checked="checked" value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
                                <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                 <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                 @endif
                            </div>
                            <div class="form-group{{$errors->has('agama') ? 'has-error' : ''}}">
                                <label for="exampleInputName">Agama</label>
                                <input name="agama" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Islam" value="{{old('agama')}}">
                                @if($errors->has('agama'))
                                 <span class="help-block">{{$errors->first('agama')}}</span>
                                 @endif
                            </div>
                            <div class="form-group{{$errors->has('alamat') ? 'has-error' : ''}}">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name="alamat"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                            </div>
                            <div class="form-group{{$errors->has('avatar') ? 'has-error' : ''}}">
                                <label for="exampleFormControlTextarea1">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                                @if($errors->has('avatar'))
                                 <span class="help-block">{{$errors->first('avatar')}}</span>
                                 @endif
                             </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection