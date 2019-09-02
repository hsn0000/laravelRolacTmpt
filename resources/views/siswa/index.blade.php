@extends('layouts.master')

@section('content')
  <div class="main">
    <div class="main-content">
       <div class="container-fluid">
         <div class="row">
          <div class="col-md-12">
           <div class="panel">
						<div class="panel-heading">
              <h3 class="panel-title"><i class="lnr lnr-user"></i> DATA SISWA</h3>
             @if(session('sukses'))
			      	<div class="aler alert-success" role="alert">
				        {{session('sukses')}}
			      	</div>
			    	@endif
            @if(session('update'))
	      			<div class="aler alert-warning" role="alert">
				         {{session('update')}}
		      		</div>
		    		@endif
            @if(session('danger'))
		     		<div class="aler alert-danger" role="alert">
				       {{session('danger')}}
			    	</div>
			    	@endif
              <div class="right">
               <button class="btn" data-toggle="modal" data-target="#exampleModal" ><i class="lnr lnr-plus-circle">Tambah Data Siswa</i></button>
               </div>
							</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead class="thead-info">
											<tr>
                         <th>NAMA DEPAN</th>
                        <th>NAMA BELAKANG</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>ALAMAT</th>
                        <th> AKSI <i class="fa fa-random"></i> <i class="fa fa-refresh fa-spin"></i></th>
											</tr>
										</thead>
										<tbody>
                    @foreach($data_siswa as $siswa)
                      <tr>
                         <td> <a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
                         <td> <a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
                         <td> {{$siswa->jenis_kelamin}} </td>
                         <td> {{$siswa->agama}} </td>
                         <td> {{$siswa->alamat}} </td>
                        <td> 
                          <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm ml-5 float-right"
                            onclick="return confirm('YAKIN MAU DI HAPUS ?')"><i class="lnr lnr-trash"> Hapus</i></<a>
                          <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm float-right"> <i class="fa fa-paper-plane-o"> Ubah</i> </a>
                        </td>
                      </tr>
                    @endforeach
										</tbody>
									</table>
								</div>
							</div>
           </div>
         </div>
       </div>
    </div>
  </div>


   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="lnr lnr-plus-circle"></i> TAMBAH KAN DATA SISWA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
         <div class="modal-body">
         <form action="/siswa/create" method="post" enctype="multipart/form-data">
           {{csrf_field()}}
            <div class="form-group {{$errors->has('nama_depan') ? 'has-error' : ''}} ">
              <label for="nama_depan">Nama Depan</label>
              <input name="nama_depan" type="text" class="form-control" id="nama_depan" 
              aria-describedby="text" placeholder="Nama Depan" required value=" {{old('nama_depan')}} ">
             @if($errors->has('nama_depan'))
                <span class="help-block"> {{$errors->first('nama_depan')}} </span>
             @endif          
          </div>
          <div class="form-group ">
              <label for="nama_belakang">Nama Belakang</label>
              <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="text" 
              placeholder="Nama Belakang" value=" {{old('nama_belakang')}} " required>
          </div>
          <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
              <label for="email">Email</label>
              <input name="email" type="email" class="form-control" id="email" aria-describedby="text" value=" {{old('email')}}" placeholder="email" required>
              @if($errors->has('email'))
                <span class="help-block"> {{$errors->first('email')}} </span>
             @endif
          </div>
     <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
       <label for="exampleFormControlSelect1">Jenis Kelamin</label>
       @if($errors->has('jenis_kelamin'))
           <span class="help-block"> {{$errors->first('jenis_kelamin')}} </span>
        @endif
        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
         <option value="L" {{(old('jenis_kelamin') == 'L') ? 'selected' : ''}} >Laki-Laki</option>
         <option value="P" {{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
       </select>
     </div>
     <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
        <label for="nama_agama">Agama</label>
        <input name="agama" type="text" class="form-control" id="agama" aria-describedby="text" value=" {{old('agama')}}" placeholder="Agama" required>
        @if($errors->has('agama'))
           <span class="help-block"> {{$errors->first('agama')}} </span>
        @endif
       </div>
       <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
         <label for="textarea">Alamat</label>
         <textarea name="alamat" class="form-control" value=" id="textarea" rows="3" >{{old('alamat')}}</textarea>
         @if($errors->has('alamat'))
           <span class="help-block"> {{$errors->first('alamat')}} </span>
        @endif
       </div>
       <div class="form-group {{$errors->has('avatar') ? 'has-error' : ''}}">
          <label for="textarea">Ambil Gambar</label>
          <input type="file" name="avatar" class="form-control padding-bottom-30">
          @if($errors->has('avatar'))
           <span class="help-block"> {{$errors->first('avatar')}} </span>
        @endif
       </div>
         </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i>Masukan</button>
            </form>
          </div>
     </div>

@stop

