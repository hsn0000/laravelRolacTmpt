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
										<img src=" {{asset('admin/naruto4.jpg')}} " class="img-circle" alt="Avatar" width="160" height="150">
										<h3 class="name"> {{$guru->nama}} </h3>
										<span class="online-status status-available">Online</span>
									</div>
							
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
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
						 <div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-bookmark"></i> MATA PELAJARAN YANG DI AJARKAN OLEH GURU Bpk/Ibu, ( {{$guru->nama}} ) </h3>
						    	</div>
								<div class="panel-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>NAMA</th>
												<th>SEMESTER</th>	
											</tr>
										</thead>
										<tbody>
                                        @foreach($guru->mapel as $mapel)
											<tr>
												<td> {{$mapel->nama}} </td>
                                                <td> {{$mapel->semester}} </td>                                 
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
@stop

@section('footer')

@stop