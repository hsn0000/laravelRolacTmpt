@extends('layouts.master')

@section('content')
    <div class="row">
      <h1 class=" ml-4 mb-4 mt-4" >EDIT DATA SISWA</h1>
     @if(session('sukses'))
      <div class="alert alert-success ml-3 float-center" role="alert">
          {{session('sukses')}}
       </div>
      @endif
         <div class="col-lg-11">
      <form action="/siswa/{{$siswa->id}}/update" method="post">
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
         </div>
           <div class="modal-footer">
              <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
     </div> 
 @endsection