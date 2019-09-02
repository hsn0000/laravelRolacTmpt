@extends('layouts.master')


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
                                             16 <span>STUDI KASUS</span>
											</div>	
											<div class="col-md-4 stat-item">
                                             80,4 <span>RATA RATA</span>
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
											</tr>
										</thead>
										<tbody>
										@foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}} </td>
												<td> {{$mapel->nama}} </td>
												<td> {{$mapel->semester}} </td>
												<td> {{$mapel->pivot->nilai}} </td>
											</tr>
										@endforeach
									</tbody>
							</table>
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

@yield('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});

@stop