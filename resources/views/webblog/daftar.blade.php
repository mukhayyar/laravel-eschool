@extends('layouts.main')
@section('content')
			  
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Daftar Sekarang			
							</h1>	
							<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Daftar</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			@include('layouts.__fitur')

			<!-- Start search-course Area -->
			<section class="search-course-area relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 col-md-6 search-course-left">
							<h1 class="text-white">
								Get reduced fee <br>
								during this Summer!
							</h1>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
							<div class="row details-content">
								<div class="col single-detials">
									<span class="lnr lnr-graduation-hat"></span>
									<a href="#"><h4>Expert Instructors</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>
								<div class="col single-detials">
									<span class="lnr lnr-license"></span>
									<a href="#"><h4>Certification</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6 search-course-right section-gap">
						{!! Form::open(['url' => '/postregister', 'class' => 'form-wrap']) !!}
							@csrf
								<h4 class="text-white pb-20 text-center mb-30">Form Pendaftaran</h4>		
								{!!Form::text('nama_depan','',['class'=>'form-control','placeholder'=>'Nama Depan'])!!}															
								{!!Form::text('nama_belakang','',['class'=>'form-control','placeholder'=>'Nama Belakang'])!!}															
								{!!Form::text('agama','',['class'=>'form-control','placeholder'=>'agama'])!!}															
								{!!Form::textarea('alamat','',['class'=>'form-control','placeholder'=>'alamat'])!!}	
								<div class="form-select" id="service-select">
								{!!Form::select('jenis_kelamin',[''=>'Pilih jenis kelamin','L'=>'Laki-laki','P'=>'Perempuan'],'L',['style'=>'display:none'])!!}															
								</div>	
								{!!Form::email('email','',['class'=>'form-control','placeholder'=>'emailmu@email.com'])!!}													
								{!!Form::password('password',['class'=>'form-control','placeholder'=>'password'])!!}													
								<input type="submit" value="submit" class="primary-btn text-uppercase" style="text-align: center">
								{!! Form::close() !!}
						</div>
					</div>
				</div>	
			</section>
			<!-- End search-course Area -->		



			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
					<h1 class="text-black pb-20 text-center mb-30">Ayo bersama kami, membentuk Generasi Penerus Bangsa</h4>					
					</div>
				</div>	
			</section>
			<!-- End blog Area -->	
			

        @stop