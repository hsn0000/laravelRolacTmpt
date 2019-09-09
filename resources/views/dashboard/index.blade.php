@extends('layouts.master')


@section('content')

<div class="main">
    <div class="main-content">
       <div class="container-fluid">
         <div class="row">
          <div class="col-md-6">
            
            <div class="panel">
             <div class="panel-heading">
               <h3 class="panel-title"> <i class="lnr lnr-bookmark"></i> RANKING 10 BESAR SISWA</h3>
              </div>
               <div class="panel-body">
                 <table class="table table-bordered">
                  <thead>
                     <tr>
                       <th>RANKING</th>
                       <th>NAMA</th>
                       <th>NILAI</th>
                     </tr> 
                  </thead>
                         <tbody>
                        @php
                           $ranking = 1;
                        @endphp  
                       @foreach(ranking10Besar() as $s)
                            <tr>
                                <td> {{$ranking}} </td>
                                <td> {{$s->nama_lengkap()}} </td>
                                <td> {{$s->rataRataNilai}} </td>
                            </tr>       
                       @php
                          $ranking++;
                       @endphp
                      @endforeach
                             </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <!-- Total Siswa -->
                   <div class="col-md-3">
					  <div class="metric">
					    <span class="icon"><i class="fa fa-users"></i></span>
						 <p>
						  <span class="number"> {{totalSiswa()}} </span>
						  <span class="title">TOTAL SISWA</span>
					     </p>
					  </div>
                    </div>
			<!-- Akhir Total Siswa  -->

            <div class="col-md-3">
					  <div class="metric">
					    <span class="icon"><i class="fa fa-user"></i></span>
						 <p>
						  <span class="number"> {{totalGuru()}} </span>
						  <span class="title">TOTAL GURU</span>
					     </p>
					  </div>
                    </div>

                </div>
            </div>
        </div>
      </div>
  
   

@stop