@extends('multiauth::layouts.app')

@section('title')
    Posts
@endsection 


@section('content')
<div  class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Posts</li>
        </ol>
      <h6 class="slim-pagetitle">Posts</h6>
      </div><!-- slim-pageheader -->
      
      @if(session()->has("success"))
      <div class="alert alert-outline alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong><i class="fa fa-check-circle"></i> Success!</strong> {{session()->get('success')}}
      </div><!-- alert -->
      @endif

      
      <div class="row row-sm mg-t-20">
        <div class="col-lg-12 mg-t-20 mg-lg-t-0">
          <div class="section-wrapper">
            <div class="card-header">
                <h4 class="d-inline-block tx-22 mg-b-0"><i class="fa fa-list"></i> All Posts</h4>
                <div class="d-inline-block float-right">
                <a data-toggle="tooltip" title="Add Post"  href="{{route('admin.post.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="table" id='datatable'>
                      <thead>
                        <tr class="tx-10">
                          <th class="wd-10p pd-y-5">Image</th>
                          <th width="20%" class="pd-y-5">Title</th>
                          <th width="30%" class="pd-y-5">Description</th>
                          <th width="10%" class="pd-y-5">Created At</th>
                          <th width="5%" class="pd-y-5">Edit</th>
                          <th width="5%" class="pd-y-5">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($posts as $post)
                            <tr>
                              <td class="pd-l-20 align-middle">
                              <img src="{{asset('application/public')}}/{{$post->image}}" class="wd-55" alt="Image">
                              </td>
                              <td class="tx-inverse tx-14 align-middle tx-large">{{$post->title}}</td>
                              <td class="tx-inverse tx-14 align-middle tx-large">{{Str::limit($post->description, 40)}}</td>
                              <td class="tx-inverse tx-14 align-middle tx-large">{{$post->created_at}}</td>
                              <td class="align-middle">
                                <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                              </td>
                              <td class="align-middle">
                                  <a href="{{route('admin.post.delete', $post->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div><!-- table-responsive --> 
            </div>
         
          </div><!-- section-wrapper -->
        </div><!-- col-6 -->
      </div><!-- row -->
</div>
@endsection


@section('scripts')
    <script>
      $(function(){
        $('.dropify').dropify();
        $('#datatable').DataTable({
          responsive: true,
          "pageLength": 10,
          "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ rows/page',
          }
        });
      })
    </script>
@endsection