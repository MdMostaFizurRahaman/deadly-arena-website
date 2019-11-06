const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js(['../frontend/assets/vendor/HexagonProgress/jquery.hexagonprogress.min.js',
//         '../frontend/assets/vendor/jarallax/dist/jarallax.min.js',
//         '../frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js',
//         '../frontend/assets/js/youplay.min.js',
//         '../frontend/assets/js/youplay-init.js'
//       ], 'public/js');


mix.styles([
      '../frontend/assets/vendor/bootstrap/dist/css/bootstrap.min.css',
      '../frontend/assets/vendor/flickity/dist/flickity.min.css',
      '../frontend/assets/vendor/magnific-popup/dist/magnific-popup.css',
      '../frontend/assets/vendor/slider-revolution/css/settings.css',
      '../frontend/assets/vendor/slider-revolution/css/layers.css',
      '../frontend/assets/vendor/slider-revolution/css/navigation.css',
      '../frontend/assets/vendor/bootstrap-sweetalert/dist/sweetalert.css',
      '../frontend/assets/vendor/social-likes/dist/social-likes_flat.css',
      '../frontend/assets/vendor/fontawesome-free/js/all.js',
      '../frontend/assets/vendor/fontawesome-free/js/v4-shims.js'
  ], '../frontend/css/all.css');
