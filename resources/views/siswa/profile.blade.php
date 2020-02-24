@extends('layouts.master')
@section('header')
<link rel="stylesheet" href="{{asset('/css/bootstrap-editable.css')}}">
@stop
@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				@if(session('sukses'))
				<div class="alert alert-success" role="alert">
				{{session('sukses')}}
				</div>
				@endif
				@if(session('error'))
				<div class="alert alert-danger" role="alert">
				{{session('error')}}
				</div>
				@endif
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar" width="150" height="150">
										<h3 class="nama_depan">{{$siswa->nama_depan}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												{{$siswa->rataRataNilai()}} 
											<span>Rata-rata Nilai</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Ranking</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$siswa->agama}}</span></li>
											<li>Alamat <span>{{$siswa->alamat}}</span></li>
										</ul>
									</div>
									<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Tambah</button>
							<div class="panel-heading">
									
									<h3 class="panel-title">Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Kode</th>
												<th>Nama</th>
												<th>Semester</th>
												<th>Nilai</th>
												<th>Guru</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										@foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td><a href="" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Masukkan Nilai">{{$mapel->pivot->nilai}}</a></td>
												<td><a href="/guru/{{$mapel->guru->id}}/profile">{{$mapel->guru->nama}}</a></td>
												<td><a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/delete" class="btn btn-danger" on-click="return confirm('Yakin')">Hapus</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>

								<div class="panel">
									<div id="chartNilai">
									</div>
								</div>
							</div>
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
			<!-- Modal -->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
   				 <div class="modal-content">
    				  <div class="modal-header">
     				   <h5 class="modal-title" >Isi Form Data</h5>
     				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    			      <span aria-hidden="true">&times;</span>
     				   </button>
     			 </div>
     				 <div class="modal-body">
	                    <form action="/siswa/{{$siswa->id}}/addnilai" method="POST">
	                        {{csrf_field()}}
							<div class="form-group">
                            <label for="mapel">Mata Pelajaran</label>
                            <select class="form-control" id="mapel" name="mapel">
								@foreach($matapelajaran as $mp)
                                <option value="{{$mp->id}}">{{$mp->nama}}</option>
								@endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName">Nilai</label>
                                <input name="nilai" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" value="">
							</div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
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

@section('footer')
	<script src="{{asset('/js/highcharts.js')}}"></script>
	<script src="{{asset('/js/bootstrap-editable.min.js')}}"></script>
	<script>
	Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Nilai'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
		max: 100,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai',
        data: {!!json_encode($data)!!}

    }]
});

	$(document).ready(function(){
		$('.nilai').editable();
	});
	</script>
@endsection