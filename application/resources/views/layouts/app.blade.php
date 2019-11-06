<!DOCTYPE html>    
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Deadly Arena | @yield('title')</title>


    <link rel="icon" type="image/png" href="{{asset('application/public')}}/{{getSettings()->company_logo}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700" defer>

    <link rel="stylesheet" href="{{asset('frontend')}}/css/all.css" defer>

    <!-- FontAwesome -->
    <script defer src="{{asset('frontend')}}/assets/vendor/fontawesome-free/js/all.js"></script>
  
    <!-- Youplay -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/youplay.css" defer>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150525353-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-150525353-1');
    </script>



    
    @yield('styles')
    
</head>


<body>
    <div id="app">
            {{-- Page Loader --}}
            @include('partials.loader')

            {{-- Navigation Bar --}}
            @include('partials.nav')

            {{-- Registration Modal --}}
            @include('partials.register')


            

            <div class="content-wrap">
                
        
                @yield('content')
                
                @include('partials.footer')

                
            </div>
    </div>
    
    
<!-- START: Scripts -->

<!-- jQuery -->
<script src="{{asset('frontend')}}/assets/vendor/jquery/dist/jquery.min.js"></script>

<!-- Hexagon Progress -->
<script src="{{asset('frontend')}}/assets/vendor/HexagonProgress/jquery.hexagonprogress.min.js"></script>

<!-- Bootstrap -->
<script src="{{asset('frontend')}}/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Jarallax -->
<script src="{{asset('frontend')}}/assets/vendor/jarallax/dist/jarallax.min.js"></script>

<!-- Flickity -->
<script src="{{asset('frontend')}}/assets/vendor/flickity/dist/flickity.pkgd.min.js"></script>

<!-- Revolution Slider -->
<script src="{{asset('frontend')}}/assets/vendor/slider-revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{asset('frontend')}}/assets/vendor/slider-revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- ImagesLoaded -->
<script src="{{asset('frontend')}}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

<!-- Isotope -->
<script src="{{asset('frontend')}}/assets/vendor/isotope-layout/dist/isotope.pkgd.min.js"></script>




<!-- Youplay -->
<script src="{{asset('frontend')}}/assets/js/youplay.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/youplay-init.js"></script>


<script>
  $(".countdown").each(function() {
      var tz = $(this).attr('data-timezone');
      var end = $(this).attr('data-end');
          end = moment.tz(end, tz).toDate();
      $(this).countdown(end, function(event) {
        $(this).text(
          event.strftime('%D days %H:%M:%S')
        );
      });
  });
</script>

@yield('scripts')

<!-- END: Scripts -->


    
</body>
</html>
