@extends('multiauth::layouts.app')

@section('title')
    Assets
@endsection 


@section('content')
<div  class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Assets</li>
        </ol>
      <h6 class="slim-pagetitle">Assets</h6>
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
                <h4 class="d-inline-block tx-22 mg-b-0"><i class="fa fa-list"></i> Asset List</h4>
                <div class="d-inline-block float-right">
                <a data-toggle="tooltip" title="Add Asset"  href="{{route('admin.asset.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-wrapper">
                    <table class="table display responsive nowrap" id='datatable'>
                      <thead>
                        <tr class="tx-10">
                          <th class="wd-10p pd-y-5">Image</th>
                          <th width="20%" class="pd-y-5">Asset Name</th>
                          <th width="10%" class="pd-y-5">Price</th>
                          <th width="30%" class="pd-y-5">Description</th>
                          <th width="10%" class="pd-y-5">Edit</th>
                          <th width="10%" class="pd-y-5">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($assets as $asset)
                            <tr>
                              <td class="pd-l-20 align-middle">
                              <img src="{{asset('application/public')}}/{{$asset->image}}" class="wd-55" alt="Image">
                              </td>
                              <td class="tx-inverse tx-14 align-middle tx-large">{{Str::title($asset->name)}}</td>
                              <td class="tx-inverse tx-14 align-middle tx-large">{{$asset->price}}</td>
                              <td class="tx-inverse tx-14 align-middle tx-large">{{Str::limit($asset->description, 30)}}</td>
                              <td class="align-middle">
                                <a href="{{route('admin.asset.edit', $asset->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                              </td>
                              <td class="align-middle">
                                  <a href="{{route('admin.asset.delete', $asset->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
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