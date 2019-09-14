@extends('layouts.master')

@section('content')
  <div class="main">
    <div class="main-content">
       <div class="container-fluid">
         <div class="row">
          <div class="col-md-12">
           <div class="panel">
			<div class="panel-heading">
              <h3 class="panel-title"><i class="lnr lnr-user"></i>Posts</h3>
              <div class="right">
               <a href="#" class="btn btn-sm btn-info" id="exportPdf">Tambah Post Baru</a>
           </div>
			</div>
			 <div class="panel-body">
				<table class="table table-hover">
			      <thead class="thead-info">
					<tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>USER</th>
                        <th> AKSI <i class="fa fa-random"></i> <i class="fa fa-refresh fa-spin"></i></th>
					</tr>
				</thead>
				<tbody>
                    @foreach($posts as $post)
                      <tr>
                        <td> {{$post->id}} </td>
                        <td> {{$post->title}} </td>
                        <td> {{$post->user->name}} </td>
                         <td> 
                         <a target="_black" href=" {{route('site.single.post', $post->slug)}} " class="btn btn-info btn-sm float-right"> <i class="lnr lnr-bookmark">Kunjungi</i> </a>
                         <a href="#" class="btn btn-warning btn-sm float-right"> <i class="fa fa-paper-plane-o">Ubah</i> </a>
                         <a href="#" class="btn btn-danger btn-sm ml-5 float-right"><i class="lnr lnr-trash"> Hapus</i></a>  
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



@stop

@section('footer')
    <script>
       $('.delete').click(function(){
           var siswa_id = $(this).attr('siswa-id');
           swal({
            title: " HAllo..",
            text: " apa anda yakin ingin menghapus data siswa? "+siswa_id+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
               window.location = "/siswa/"+siswa_id+"/delete";
            } 
          });
       });
    </script>
@stop

