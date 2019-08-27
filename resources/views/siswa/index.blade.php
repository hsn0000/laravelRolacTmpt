<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

 <div class="container">
     <div class="row">
      <div class="col-6 mt-5">
        <h1>DATA SISWA</h1> 
      </div>
     <div class="col-6">
            <!-- Button trigger modal -->
     <br>
     <button type="button" class="btn btn-primary float-right btn-sm mt-5 " data-toggle="modal" data-target="#exampleModal">
     Tambah Data Siswa
    </button>
    </div> 
       @if(session('sukses'))
      <div class="alert alert-success ml-3 float-center" role="alert">
          {{session('sukses')}}
      </div>
        @endif
       <table class="table table-hover mt-4 ">
        <thead class="thead-dark">
         <tr>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
      </thead>
        @foreach($data_siswa as $siswa)
        <tr>
            <td> {{$siswa->nama_depan}} </td>
            <td> {{$siswa->nama_belakang}} </td>
            <td> {{$siswa->jenis_kelamin}} </td>
            <td> {{$siswa->agama}} </td>
            <td> {{$siswa->alamat}} </td>
            <td> <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a> </td>
        @endforeach

         </tr>
      </table>   
    </div>
 </div>
   
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">TAMBAH KAN DATA SISWA</h5>
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
         </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
     </div>
 </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>


