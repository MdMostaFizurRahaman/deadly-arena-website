@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <section class="youplay-banner no-banner youplay-banner-parallax full">

        <div class="container">
            <div class="youplay-login">
                <div class="youplay-form text-center">
                    <h1 style="text-transform:uppercase">Login</h1>
    
                    <div class="btn-group social-list dib">
                        <a class="btn btn-default" title="Share on Facebook" href="{{route('login.facebook')}}"><svg class="svg-inline--fa fa-facebook fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path></svg><!-- <i class="fab fa-facebook"></i> --></a>
                        <a class="btn btn-default" href="#" title="Share on Twitter"><svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter"></i> --></a>
                        <a class="btn btn-default" href="#" title="Share on Google Plus"><svg class="svg-inline--fa fa-google-plus fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg=""><path fill="currentColor" d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm-70.7 372c-68.8 0-124-55.5-124-124s55.2-124 124-124c31.3 0 60.1 11 83 32.3l-33.6 32.6c-13.2-12.9-31.3-19.1-49.4-19.1-42.9 0-77.2 35.5-77.2 78.1s34.2 78.1 77.2 78.1c32.6 0 64.9-19.1 70.1-53.3h-70.1v-42.6h116.9c1.3 6.8 1.9 13.6 1.9 20.7 0 70.8-47.5 121.2-118.8 121.2zm230.2-106.2v35.5H372v-35.5h-35.5v-35.5H372v-35.5h35.5v35.5h35.2v35.5h-35.2z"></path></svg><!-- <i class="fab fa-google-plus"></i> --></a>
                    </div>
    
                    <form method="POST" action="{{ route('customLogin') }}">
                        @csrf
                        <div class="youplay-input">
                            <input id="player_displayname" type="player_displayname" name="player_displayname"  placeholder="Display Name">
                        </div>
                        @error('player_displayname')
                        <div class="text-danger align-middle" style='margin-bottom: 20px'>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="youplay-input">
                            <input id="password" type="password"  name="password" placeholder="Password">
                        </div> 
                        @error('password')
                        <div class="text-danger align-middle" style='margin-bottom: 20px'>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        
                        <button type="submit" class="btn btn-default db">Login</button>
                        <label style="margin-top: 20px" for=""><a href="{{route('password.request')}}" >Forget your password?</a></label>   
                    </form>
                </div>
            </div>  
        </div>
    </section>
@endsection

