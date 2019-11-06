@extends('multiauth::layouts.app')

@section('title')
    Categories
@endsection 


@section('content')
<div  class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Categories</li>
        </ol>
      <h6 class="slim-pagetitle">Categories</h6>
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
        <div class="col-lg-4">
          <div class="section-wrapper">
            <label class="section-title">{{!empty($category) ? "Edit":"Create"}} Category</label> 
           
                <form 
                @if (!empty($category))
                  action="{{route('admin.category.update', $category->id)}}"
                @else
                  action="{{route('admin.category.store')}}"   
                @endif
                 method='post' enctype="multipart/form-data">
                  @csrf
                    <div class="form-layout form-layout-4">
                        <div class="row">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-10">
                            <input value="{{!empty($category->name) ? $category->name: ''}}" name="name" type="text" class="form-control" placeholder="Enter Category Name">
                            @if ($errors->has('name'))
                             <div class="error text-danger">{{ $errors->first('name') }}</div>
                            @endif
                          </div>
                          
                        </div><!-- row -->
                        <div class="row mg-t-20">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-10">
                          <input name='image' type="file" class="dropify"   data-show-remove="false" data-allowed-file-extensions="png jpg jpeg" data-default-file = "{{!empty($category->image) ? asset('application/public/'.$category->image): ''}}" />
                          @if ($errors->has('image'))
                          <div class="error text-danger">{{ $errors->first('image') }}</div>
                         @endif
                          </div>
                        </div>
                   
                        <label class="text-danger  mg-t-10">*Image size should be (500 x 375) px.</label>
                        <div class="form-layout-footer">
                          <button type="submit"    class="btn btn-block btn-primary bd-0"> Save <i class='fa fa-save fa-fw'></i></button>
                          <a href="{{route('admin.category')}}"    class="btn btn-block btn-danger bd-0">Cancel <i class='fa fa-undo fa-fw'></i></a>
                        </div><!-- form-layout-footer -->
                      </div><!-- form-layout -->
                </form>
          </div><!-- section-wrapper -->
        </div><!-- col-6 -->
        <div class="col-lg-8 mg-t-20 mg-lg-t-0">
          <div class="section-wrapper">
            <label class="section-title">All Categories</label>
            <div class="table-wrapper">
              <table class="table display responsive nowrap" id='datatable'>
                <thead>
                  <tr class="tx-10">
                    <th class="wd-10p pd-y-5">Image</th>
                    <th class="pd-y-5">Category Name</th>
                    <th class="pd-y-5">Edit</th>
                    <th class="pd-y-5">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                      <tr>
                        <td class="pd-l-20 align-middle">
                        <img src="{{asset('application/public')}}/{{$category->image}}" class="wd-55" alt="Image">
                        </td>
                        <td class="tx-inverse tx-14 align-middle tx-large">{{Str::title($category->name)}}</td>
                        <td class="align-middle">
                          <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                        <td class="align-middle">
                            <a href="{{route('admin.category.delete', $category->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-responsive -->     
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
          "pageLength": 5,
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