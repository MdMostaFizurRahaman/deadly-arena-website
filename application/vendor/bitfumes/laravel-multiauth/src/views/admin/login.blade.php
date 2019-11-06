<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Login</title>

    <!-- Vendor css -->
    <link href="{{asset('backend')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/css/slim.css">
    <link rel="stylesheet" href="{{asset('backend')}}/css/slim.one.css">

  </head>
  <body>

    <div class="signin-wrapper">
        <form method="POST" action="{{ route('admin.login') }}" >
            @csrf
            <div class="signin-box">
                <h2 class="slim-logo text-center"><a href="index.html" >FPS Game</a></h2>
                <h2 class="signin-title-primary text-center">Welcome back!</h2>
                <h3 class="signin-title-secondary text-center">Login to continue.</h3>
        
                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                    required autofocus> 
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
                </div><!-- form-group -->
                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        required> 
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span> 
                    @endif
                </div><!-- form-group -->
                <div class="form-check mg-b-50">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-signin">Login</button>
              </div><!-- signin-box -->
        
        </form>
      
    </div><!-- signin-wrapper -->

    <script src="{{asset('backend')}}/lib/jquery/js/jquery.js"></script>
    <script src="{{asset('backend')}}/lib/popper.js/js/popper.js"></script>
    <script src="{{asset('backend')}}/lib/bootstrap/js/bootstrap.js"></script>

    <script src="{{asset('backend')}}/js/slim.js"></script>

  </body>
</html>
