@extends('multiauth::layouts.app') 
@section('title')
    Edit Admin
@endsection

@section('content')
<div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Admin</li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
          <h6 class="slim-pagetitle">Admin List</h6>
        </div><!-- slim-pageheader -->
        @include('multiauth::message')

        <div class="section-wrapper">
                <form action="{{route('admin.update.profile',[$admin->id])}}" method="post" enctype="multipart/form-data">
                        @csrf @method('patch')
                    <div class="form-layout">
                        <div class="row mg-b-25">
                          
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <input type="text" value="{{ $admin->name }}" name="name" class="form-control" id="role">
                                </div>
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Mail Address: <span class="tx-danger">*</span></label>
                                    <input type="text" value="{{ $admin->email }}" name="email" class="form-control" id="role">
                                </div>
                                
                                <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                                        <select name="role_id" id="role_id" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}">
                                                <option selected disabled>Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" 
                                                        @if (in_array($role->id,$admin->roles->pluck('id')->toArray())) 
                                                            selected 
                                                        @endif >{{ Str::title($role->name) }}
                                                    </option>
                                                @endforeach
                                        </select> 
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-control-label">Profile Picture: <span class="tx-danger">*</span></label>
                                <input id="image" data-default-file="{{asset('application/public')}}/{{$admin->image}}" data-height="200" type="file" class="dropify form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">
                            </div>
                        </div><!-- row -->
    
                        <div class="form-layout-footer">
                                <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
            
                                    <a href="{{ route('admin.show') }}" class="btn btn-danger">
                                        Back
                                    </a>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
        </div><!-- section-wrapper -->

    </div>
@endsection

@section('scripts')
    <script>
        $(function(){
            $('.dropify').dropify()
        })
    </script>
@endsection

 