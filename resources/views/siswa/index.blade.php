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
                        <th> <i class="fa fa-random">  AKSI</i> </th>
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
         <form action="/siswa/create" method="post">
           {{csrf_field()}}
            <div class="form-group">
              <label for="nama_depan">Nama Depan</label>
              <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="text" placeholder="Nama Depan" required>
          </div>
          <div class="form-group">
              <label for="nama_belakang">Nama Belakang</label>
              <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="text" placeholder="Nama Belakang" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input name="email" type="email" class="form-control" id="email" aria-describedby="text" placeholder="email" required>
          </div>
     <div class="form-group">
       <label for="exampleFormControlSelect1">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
         <option value="L">Laki-Laki</option>
         <option value="P">Perempuan</option>
       </select>
     </div>
     <div class="form-group">
        <label for="nama_agama">Agama</label>
        <input name="agama" type="text" class="form-control" id="agama" aria-describedby="text" placeholder="Agama" required>
       </div>
       <div class="form-group">
         <label for="textarea">Alamat</label>
         <textarea name="alamat" class="form-control"  id="textarea" rows="3"></textarea>
       </div>
       <div class="form-group">
          <label for="textarea">Ambil Gambar</label>
          <input type="file" name="avatar" class="form-control padding-bottom-30">
       </div>
         </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i>Masukan</button>
            </form>
          </div>
     </div>

@stop

