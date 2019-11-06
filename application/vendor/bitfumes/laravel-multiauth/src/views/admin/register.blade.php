@extends('multiauth::layouts.app') 
@section('title')
    Register Admin
@endsection
@section('content')
    <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
          </ol>
          <h6 class="slim-pagetitle">Register User</h6>
        </div><!-- slim-pageheader -->
        @include('multiauth::message')

        <div class="section-wrapper">
          <label class="section-title">Register a new user.</label>
          <p class="mg-b-20 mg-sm-b-40">This user can access your admin panel.</p>
            <form method="POST" action="{{ route('admin.register') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                      
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                 autofocus>
                            </div>
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Mail Address: <span class="tx-danger">*</span></label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                >
                            </div>
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                >
                            </div>
                            <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                                    
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                        
                            </div>
                            <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                                    <select name="role_id" id="role_id" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}">
                                        <option selected disabled>Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ Str::title($role->name) }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-6">
                                <label class="form-control-label">Profile Picture: <span class="tx-danger">*</span></label>
                                <input id="image" data-height="360" type="file" class="dropify form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}"
                                >
                        </div><!-- col-6 -->
                    </div><!-- row -->

                    <div class="form-layout-footer">
                            <button type="submit" class="btn btn-primary">
                                    Register
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
