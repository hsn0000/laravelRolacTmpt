@extends('layouts.frontend')


@section('content')
   <section class="banner-area relative" id="home">
			<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between" style="height: 664px;">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								Pendaftaran
							</h1>
							<p class="pt-10 pb-10">
							Penerimaan Peserta Didik Baru (PPDB) tahun ajaran 2019/2020 tingkat SMA/SMK & AKADEMISI S1 S2 di BOGOR@SCHOOL akan dimulai pada bulan ini.
							</p>
						<a href="#" class="primary-btn text-uppercase">Memulai Pendaftaran</a>
					</div>										
				</div>
		  	</div>					
	</section>

<section class="search-course-area relative" style="background: unset;">
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-3 col-md-6 search-course-left">
							<h1>
								Selamat Datang Siswa Siswsi Baru
							</h1>
							<p>
								Raih kesuksesan anda dengan di mulai dari diri anda dan tentukan masa depan di mulai dari sekarang
							</p>
						</div>
						<div class="col-lg-6 col-md-6 search-course-right section-gap">
						{!! Form::open(['url' => '/postregister','class' => 'form-wrap	']) !!}
								<h4 class=" pb-20 text-center mb-30">Formulir Pendaftaran</h4>	
                                {!! Form::text('nama_depan','',['class' => 'form-control','placeholder' => 'Nama Depan']) !!}
								{!! Form::text('nama_belakang','',['class' => 'form-control','placeholder' => 'Nama Belakang']) !!}
								{!! Form::text('agama','',['class' => 'form-control','placeholder' => 'agama']) !!}
								{!! Form::textarea('alamat','',['class' => 'form-control','placeholder' => 'Alamat']) !!}
								{!! ' <b>Pilih jenis kelamin</b> ' !!}
						      <div class="form-select" id="service-select">
								{!! Form::select('jenis_kelamin',['L' => 'laki-laki', 'P' => 'perempuan'],'L'); !!}
							  </div>
							  {!! Form::email('email','',['class' => 'form-control','placeholder' => 'Email']) !!}
   							  {!! Form::password('password',['class' => 'form-control','placeholder' => 'Password','required']) !!}
								<input type="submit" class="primary-btn text-uppercase" style="text-align:center;" value="Kirim">
						{!! Form::close() !!}
						</div>
					</div>
				</div>	
		</section>
@stop