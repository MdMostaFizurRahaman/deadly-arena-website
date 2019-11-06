@extends('multiauth::layouts.app')

@section('title')
    Create Post
@endsection 


@section('content')
<div  class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Post</li>
        </ol>
      <h6 class="slim-pagetitle">Edit Post</h6>
      </div><!-- slim-pageheader -->
      
      @if(session()->has("success"))
      <div class="alert alert-outline alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong><i class="fa fa-check-circle"></i> Success!</strong> {{session()->get('success')}}
      </div><!-- alert -->
      @endif

      
      <div class="row row-sm">
        <div class="col-lg-12">
          <div class="section-wrapper">
            <label class="section-title">Edit Post Details</label> 
            <form id="selectForm" method="post" action="{{route('admin.post.update', $post->id)}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <input value="{{$post->title}}" placeholder="Enter Post Title" id="title" type="text" class="form-control" name="title" required>
                                    @if ($errors->has('title'))
                                      <div class="error text-danger">{{ $errors->first('title') }}</div>
                                   @endif
                                </div>
                                <div class="form-group">
                                    <textarea id="editor" name="description" rows=10 class="form-control" placeholder="Enter Post Description" required>
                                      {{$post->description}}
                                    </textarea>
                                </div>
                                @if ($errors->has('description'))
                                  <div class="error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-6" >
                                <div id="dropify">
                                  <input name="image" data-height="280" data-default-file="{{asset('application/public')}}/{{$post->image}}"  data-allowed-file-extensions="jpg png bmp" data-max-file-size="2M" type="file" class="dropify" required />
                                </div>
                                @if ($errors->has('image'))
                                  <div class="error text-danger">{{ $errors->first('image') }}</div>
                               @endif
                               <label class="text-danger  mg-t-10">*Image size should be (500 x 375) px.</label>
                            </div>
                        </div>
                          <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save</button>
                          <a href="{{route('admin.post')}}" class="btn btn-danger"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                      </div><!-- card-body -->
                  
        
                </div>
            </form>
          </div><!-- section-wrapper -->
      </div><!-- row -->
</div>
@endsection


@section('scripts')

    <script>
      $(function(){
        
        $('.dropify').dropify();
        $('#selectForm').parsley(); 
      })
    </script>
@endsection