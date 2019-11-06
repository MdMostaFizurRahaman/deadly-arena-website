<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('application/public')}}/{{getSettings()->company_logo}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Deadly Arena | @yield('title')</title>

    <!-- vendor css -->
    <link href="{{asset('backend')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/dropify/dist/css/dropy.css" rel="stylesheet" >
    <link href="{{asset('backend')}}/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" >
    <link href="{{asset('backend')}}/lib/jquery-toggles/css/toggles-full.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/jquery-toast/jquery.toast.min.css" rel="stylesheet">
    

    <!-- Slim CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/css/slim.css">
    <link rel="stylesheet" href="{{asset('backend')}}/css/slim.one.css">

  </head>
  <body>
   @include('multiauth::layouts.header')
   @include('multiauth::layouts.menu')

    <div class="slim-mainpanel">
      @yield('content')
    </div><!-- slim-mainpanel -->

    @include('multiauth::layouts.footer')

    <script src="{{asset('backend')}}/lib/jquery/js/jquery.js"></script>
    <script src="{{asset('backend')}}/lib/popper.js/js/popper.js"></script>
    <script src="{{asset('backend')}}/lib/bootstrap/js/bootstrap.js"></script>
    <script src="{{asset('backend')}}/lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="{{asset('backend')}}/lib/datatables/js/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/lib/dropify/dist/js/dropify.js"></script>
    

    <script src="{{asset('backend')}}/lib/parsleyjs/js/parsley.js"></script>
    <script src="{{asset('backend')}}/lib/select2/js/select2.full.min.js"></script>
    <script src="{{asset('backend')}}/lib/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{asset('backend')}}/lib/jquery-toggles/js/toggles.min.js"></script>
    <script src="{{asset('backend')}}/lib/jquery-toast/jquery.toast.min.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script> --}}

    @yield('scripts')
  </body>
</html>
