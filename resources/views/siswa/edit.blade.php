@extends('layouts.master')

@section('content')

<div class="main">
    <div class="main-content">
       <div class="container-fluid">
         <div class="row">
          <div class="col-md-12">
           <div class="panel">
				<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-paper-plane-o">  UBAH DATA SISWA</i> </h3>
				</div>
				<div class="panel-body">
              <form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
           {{csrf_field()}}
            <div class="form-group">
               <label for="nama_depan">Nama Depan</label>
               <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="text" placeholder="Nama Depan" value=" {{ $siswa->nama_depan}} " required>
           </div>
           <div class="form-group">
               <label for="nama_belakang">Nama Belakang</label>
               <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="text" placeholder="Nama Belakang" value=" {{$siswa->nama_belakang}} " required>
             </div>
         <div class="form-group">
     <label for="exampleFormControlSelect1">Jenis Kelamin</label>
       <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
           <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif >Laki-Laki</option>
           <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif >Perempuan</option>
        </select>
     </div>
     <div class="form-group">
         <label for="nama_agama">Agama</label>
         <input name="agama" type="text" class="form-control" id="agama" aria-describedby="text" placeholder="Agama" value=" {{$siswa->agama}} " required>
       </div>
       <div class="form-group">
          <label for="textarea">Alamat</label>
          <textarea name="alamat" class="form-control"  id="textarea" rows="3"> {{$siswa->alamat}} </textarea>
       </div>

       <div class="form-group">
          <label for="textarea">Ambil Gambar</label>
          <input type="file" name="avatar" class="form-control padding-bottom-30">
       </div>
       <button type="submit" class="btn btn-warning mt-5 "><i class="fa fa-paper-plane-o"></i> Update</button>
         </div>
            </form>
					
          </div>
         </div>
       </div>
    </div>
</div>

@stop