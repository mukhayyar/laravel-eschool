@extends('layouts.master')
@section('search')
<form class="navbar-form navbar-left" method="GET" action="/siswa" >
    
	<div class="input-group">
		<input name="cari" type="text" class="form-control" placeholder="cari">
		<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
	</div>

</form>
@stop
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Add Post</h3>
								</div>
								<div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <form action="{{route('posts.create')}}" method="POST" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                    <div class="form-group{{$errors->has('title') ? 'has-error' : ''}}">
                                                        <label for="exampleInputName">Title</label>
                                                        <input name="title" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Title" value="{{old('title')}}">
                                                        @if($errors->has('title'))
                                                        <span class="help-block">{{$errors->first('title')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group{{$errors->has('content') ? 'has-error' : ''}}">
                                                        <label for="editor">Content</label>
                                                        <textarea name="content" class="form-control" id="editor" rows="3">{{old('content')}}</textarea>
                                                    </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>
                                            <div class="input-group">
                                                <input type="submit" class="btn btn-info pull-right" value="submit">
                                            </div>
                                            </form>
                                    </div>
								</div>
							</div>  
                            @section('aktif3','active')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')

<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.log( error );
    } );
    $('#lfm').filemanager('image');
</script>
@stop