@extends('layouts.master')

@section('content')
  <div class="main">
    <div class="main-content">
       <div class="container-fluid">
         <div class="row">
          <div class="col-md-12">
           <div class="panel">
			<div class="panel-heading">
              <h3 class="panel-title"><i class="lnr lnr-user"></i>Tambah posts baru</h3>
			</div>
			 <div class="panel-body">
               <div class="row">
                  <div class="col-md-8">
                   <form action="{{route('posts.create')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('title') ? 'has-error' : ''}} ">
                     <label for="title">Title</label>
                      <input name="title" type="text" class="form-control" id="title" 
                      aria-describedby="text" placeholder="Title" required value=" {{old('title')}} ">
                     @if($errors->has('title'))
                     <span class="help-block"> {{$errors->first('title')}} </span>
                     @endif          
                     </div>

                      <div class="form-group {{$errors->has('content') ? 'has-error' : ''}}">
                        <label for="textarea">Content</label>
                         <textarea name="content" class="form-control" id="content" rows="3" >{{old('content')}}</textarea>
                         @if($errors->has('content'))
                          <span class="help-block"> {{$errors->first('content')}} </span>
                         @endif
                        </div>
                   </div>

                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i>Pilih
                        </a>
                      </span>
                    <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                     </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">
                     <div class="input-group">
                         <input type="submit" class="btn btn-info" value="Submit">
                    </div>
                  </div>
                </div>
                </form>
			 </div>
		    	</div>
            </div>
         </div>
       </div>
    </div>
  </div>



@stop

@section('footer')

 <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
   <script>
      ClassicEditor
         .create( document.querySelector( '#content' ) )
         .catch( error => {
            console.error( error );
         } );

      $(document).ready(function() {
         $('#lfm').filemanager('image');
      });
         
    </script>
@stop