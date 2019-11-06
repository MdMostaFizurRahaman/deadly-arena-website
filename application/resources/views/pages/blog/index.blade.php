@extends('layouts.app')

@section('title')
    Blog
@endsection

@section('content')
    <section class="youplay-banner banner-top youplay-banner-parallax small">
        
            <div class="image" data-speed="0.4" style="z-index: 0;">
                
                <div id="jarallax-container-0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; pointer-events: none; z-index: -100;">
                <img src="{{asset('application/public')}}/{{getSettings()->blog_image}}" alt="" 
                    class="jarallax-img" 
                    style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0.09375px; width: 1348.81px; height: 382.8px; overflow: hidden; pointer-events: none; margin-top: -22.4px; transform: translate3d(0px, 22.4375px, 0px);">
                </div>
            </div>
        

        <div class="info" style="opacity: 0.999723; transform: translate3d(0px, -0.041605px, 0px);">
            <div>
                <div class="container">
                    
                    
                        <h1 class="h1">Blog</h1>
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    <div class="container youplay-news news-grid">
            <!-- News List -->
            <div class="row vertical-gutter multi-columns-row">
                @foreach ($posts as $post)
                     <!-- Single News Block -->
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="news-one">
                            <a href="{{route('blog.post', $post->id)}}" class="angled-img">
                                <div class="img img-offset">
                                    <img src="{{asset('application/public')}}/{{$post->image}}" alt="">
                                </div>
                                <div class="bottom-info align-center">
                                    <h3>{{$post->title}}</h3>
                                    <span class="date">
                                        <svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg><!-- <i class="fa fa-calendar"></i> --> 
                                        {{date('M-d,Y', strtotime($post->created_at))}}
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /Single News Block -->
                @endforeach
               
            </div>
            <!-- /News List -->
            {{$posts->links()}}
        </div>
@endsection