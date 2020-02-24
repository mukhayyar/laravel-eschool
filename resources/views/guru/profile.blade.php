@extends('layouts.master')
@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="" class="img-circle" alt="Avatar" width="150" height="150">
										<h3 class="nama_depan">{{$guru->nama}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->

								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
							
							<div class="panel-heading">
									
									<h3 class="panel-title">Mata pelajaran yang diajar guru {{$guru->nama}}</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Nama</th>
												<th>Semester</th>
											</tr>
										</thead>
										<tbody>
										@foreach($guru->mapel as $gr)
											<tr>
												<td>{{$gr->nama}}</td>
												<td>{{$gr->semester}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
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
                	    @section('aktif2','active')
            	    </div>
        	    </div>
       		 </div>
    	</div>
	</div>
</div>
@stop
