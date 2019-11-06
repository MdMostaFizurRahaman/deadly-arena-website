@extends('layouts.app')

@section('title')
    Post
@endsection

@section('content')
    <section class="youplay-banner banner-top youplay-banner-parallax xsmall">
        
            <div class="image" data-speed="0.4" style="z-index: 0;">
                
            <div id="jarallax-container-0" 
            style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
            <img src="{{asset('application/public')}}/{{getSettings()->postpage_image}}" alt="" class="jarallax-img" 
            style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0.09375px; width: 1348.81px; height: 342.8px; overflow: hidden; pointer-events: none; margin-top: -2.4px; transform: translate3d(0px, -31.1625px, 0px);"></div></div>
        

        <div class="info" style="opacity: 0.78726; transform: translate3d(0px, 31.9111px, 0px);">
            <div>
                <div class="container">
                    
                    
                    <h1 class="h1">{{Str::title($post->title)}}</h1>
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    <div class="container youplay-news youplay-post">

            <div class="col-md-12">
                <!-- Post Info -->
                <article class="news-one">
    
                    <!-- Post Text -->
                    <div class="description">
                        <a href="#" class="angled-img pull-left">
                            <div class="img">
                                <img src="{{asset('application/public')}}/{{$post->image}}" alt="">
                            </div>
                            
                        </a>
                        <p>
                           {{$post->description}}
                        </p>
                    </div>
                    <!-- /Post Text -->
    
                </article>
                <!-- /Post Info -->
    
             </div>
        </div>
@endsection