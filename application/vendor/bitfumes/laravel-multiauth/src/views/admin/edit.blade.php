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
                <form action="{{route('admin.update',[$admin->id])}}" method="post" enctype="multipart/form-data">
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
                                <div class="form-group mg-b-10-force">
                                    <label class="ckbox">
                                        <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation"  id="active"><span>Account Status</span>
                                    </label>
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

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit details of {{$admin->name}}</div>
    
                    <div class="card-body">
                        @include('multiauth::message')
                        <form action="{{route('admin.update',[$admin->id])}}" method="post">
                            @csrf @method('patch')
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Name</label>
                                <input type="text" value="{{ $admin->name }}" name="name" class="form-control col-md-6" id="role">
                            </div>
    
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Email</label>
                                <input type="text" value="{{ $admin->email }}" name="email" class="form-control col-md-6" id="role">
                            </div>
    
                            <div class="form-group row">
                                <label for="role_id" class="col-md-4 col-form-label text-md-right">Assign Role</label>
    
                                <select name="role_id[]" id="role_id" class="form-control col-md-6 {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" 
                                            @if (in_array($role->id,$admin->roles->pluck('id')->toArray())) 
                                                selected 
                                            @endif >{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select> 
    
                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span> 
                                @endif
                            </div>
    
                            <div class="form-group row">
                                <label for="active" class="col-md-4 col-form-label text-md-right">Active</label>
                                <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="form-control col-md-6" id="active">
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Change
                                    </button>
                                    <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}