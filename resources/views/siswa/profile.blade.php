@extends('layouts.master')


@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop

@section('content')

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
			@if(session('sukses'))
				<div class="aler alert-success" role="alert">
				    {{session('sukses')}}
			</div>
		    @endif
                  <br>
			 @if(session('error'))
				<div class="aler alert-danger" role="alert">
				    {{session('error')}}
			  </div>
			  @endif
				<br>
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header ">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src=" {{$siswa->getAvatar()}} " class="img-circle" alt="Avatar" width="160" height="150">
										<h3 class="name"> {{$siswa->nama_depan}} </h3>
										<span class="online-status status-available">Online</span>
									</div>
									<div class="profile-stat">
										<div class="row">
									    	<div class="col-md-4 stat-item">
                                               {{$siswa->mapel->count()}}<span>PELAJARAN</span>
											</div>		
											<div class="col-md-4 stat-item">
                                             {{$siswa->rataRataNilai()}} <span>Rata-Rata Nilai</span>
											</div>	
											<div class="col-md-4 stat-item">
                                             25 <span>Studi Kasus</span>
											</div>						
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading"><i class="lnr lnr-user"></i> Data Diri</h4>
										<ul class="list-unstyled list-justify">
											<li>Jenis Kelamin: <span>{{$siswa->jenis_kelamin}}  </span></li>
											<li>Agama: <span>{{$siswa->agama}} </span></li>
											<li>Alamat: <span> {{$siswa->alamat}} </span></li>
										</ul>
										<br>
										<br>
										<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning"> 
										<i class="fa fa-paper-plane-o"> Edit Profile </i></a></div>
									</div>
								</div>
								<hr>
								<!-- END PROFILE DETAIL -->
							</div>
						</div>
					</div>
				</div>
				<!-- END LEFT COLUMN -->
				<!-- RIGHT COLUMN -->
					<div class="profile-right">
				<!--mapel-->
				<!-- Button trigger modal -->
				 <div class="panel">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
			          <i class="fa fa-upload">TAMBAH NILAI MATA PELAJARAN</i>
			           </button>
						 <div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-bookmark"></i> MATA PELAJARAN</h3>
						    	</div>
								<div class="panel-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
												<th>GURU</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
										@foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}} </td>
												<td> {{$mapel->nama}} </td>
												<td> {{$mapel->semester}} </td>
												<td> <a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai " data-title="Masukan nilai">
											 {{$mapel->pivot->nilai}}</a></td>
                                                <td><a href="/guru/{{$mapel->guru_id}}/profile"> {{$mapel->guru->nama}} </a></td>    
											    <td><a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" class="btn btn-danger btn-sm ml-5 float-right"
                                                 onclick="return confirm('YAKIN MAU MENGHAPUS NILAI SISWA ?')"><i class="lnr lnr-trash"></i></a></td>
										   </tr>
										@endforeach
									</tbody>
							</table>
						</div>
					</div>
					<!-- // chart -->
				<div class="panel">
			   	   <div id="chartNilai">
					     
								</div>
							</div>
						</div>
					<!-- // end right colom -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
	<!-- Modal tambah data nilai siswa -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	 <div class="modal-dialog" role="document">
	    <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> <i class="lnr lnr-bookmark"></i> TAMBAH NILAI</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<div class="modal-body">
	      <form action="/siswa/{{$siswa->id}}/addnilai" method="post" enctype="multipart/form-data">
             {{csrf_field()}}
			<div class="form-group">
			  <label for="mapel">Mata pelajaran</label>
				<select class="form-control" id="mapel" name="mapel">
			        @foreach($matapelajaran as $mp)
					  <option value="{{$mp->id}}"> {{$mp->nama}} </option>
					@endforeach
				 </select>
			</div>
               <div class="form-group {{$errors->has('nilai') ? 'has-error' : ''}} ">
                 <label for="nilai">Nilai</label>
                 <input name="nilai" type="text" class="form-control" id="nilai" 
                 aria-describedby="text" placeholder="Nilai" required value=" {{old('nilai')}} ">
              @if($errors->has('nilai'))
                <span class="help-block"> {{$errors->first('nilai')}} </span>
              @endif          
		 	</div>
		</div>
			<div class="modal-footer"> 
				<button type="button" class="btn btn-dark" data-dismiss="modal">KEMBALI</button>
				<button type="submit" class="btn btn-success"> <i class="fa fa-check-circle"></i>SILAHKAN SIMPAN</button> 
			</form>
	    	</div>
		</div>
	</div>
</div>
@stop

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	Highcharts.chart('chartNilai', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Laporan Nilai Siswa'
		},
		xAxis: {
			categories: {!!json_encode($categories)!!},
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Nilai'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
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
			name: 'Nilai Ujian Semester',
			data: {!!json_encode($data)!!}

		
		}]
	});

	$(document).ready(function() {
        $('.nilai').editable();
    }); 

</script>

@stop