@extends('multiauth::layouts.app') 

@section('title')
    Change Password
@endsection
@section('content')
<div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
          </ol>
          <h6 class="slim-pagetitle">Change Password</h6>
        </div><!-- slim-pageheader -->
        <div class="section-wrapper">
            <label class="section-title mb-4">{{ ucfirst(config('multiauth.prefix')) }} Change Your Password</label>
            <form method="POST" action="{{ route('admin.password.change') }}" aria-label="{{ __('Admin Change Password') }}">
                @csrf
                    <div class="form-layout form-layout-4">
                            <div class="row">
                              <label class="col-sm-4 form-control-label">Old Password: <span class="tx-danger">*</span></label>
                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input id="oldPassword" type="password" class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" name="oldPassword" placeholder="Old Password" > 
                                    @if ($errors->has('oldPassword'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('oldPassword') }}</strong>
                                        </span>
                                     @endif
                              </div>
                            </div><!-- row -->
                            <div class="row mg-t-20">
                              <label class="col-sm-4 form-control-label">New Password: <span class="tx-danger">*</span></label>
                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="New Password"> 
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> 
                                    @endif
                              </div>
                            </div>
                            <div class="row mg-t-20">
                              <label class="col-sm-4 form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                              </div>
                            </div>
                            <div class="form-layout-footer mg-t-30">
                                <button type="submit" class="btn btn-primary bd-0">Change Now</button>
                                <a href="{{route('admin.home')}}" class="btn btn-danger bd-0 float-right">Back</a>
                            </div><!-- form-layout-footer -->
                          </div><!-- form-layout -->
            </form>
                
                
        </div>

    </div>
@endsection


    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Change Your Password</div>
    
                    <div class="card-body">
                
                            @csrf
                            <div class="form-group row">
                                <label for="oldPassword" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="oldPassword" type="password" class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" name="oldPassword" value="{{ $oldPassword ?? old('oldPassword') }}"
                                        required autofocus> @if ($errors->has('oldPassword'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('oldPassword') }}</strong>
                                        </span> @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                        required> @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}