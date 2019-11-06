@extends('layouts.app')

@section('title')
    Welcome
@endsection

@section('content')
    <section class="youplay-banner banner-top youplay-banner-parallax">
        
        <div class="image" data-speed="0.4">
            <img src="{{asset('application/public')}}/{{getSettings()->hero_image}}" alt="" class="jarallax-img">
        </div>
        <div class="info">
            <div>
                <div class="container">                  
                    <h1>{{Str::title(getSettings()->hero_image_title)}} <br>{{getSettings()->hero_image_subtitle}}</h1>
                    <em>"{{getSettings()->hero_image_description}}"</em>
                    <br><br><br>
                    <a class="btn btn-lg" target="_blank" href="{{route('play')}}">Play Now</a>    
                </div>
            </div>
        </div>
    </section>

    <div class="youplay-carousel" data-autoplay="5000">
        @foreach ($categories as $category)
            <a class="angled-img" href="{{route('store.category', $category->id)}}">
                    <div class="img">
                        <img src="{{asset('application/public')}}/{{$category->image}}" alt="">
                    </div>
                    <div class="over-info">
                        <div>
                            <div>
                                <h4>{{Str::title($category->name)}}</h4>
                                
                                <div class="rating">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
        @endforeach
           
            
    </div>
    <!-- /Images With Text -->


    <!-- Specials -->
    <h2 class="container h1">Specials <a href="{{route('store')}}" class="btn pull-right">See More</a></h2>

    <div class="youplay-carousel">
        @foreach ($assets as $asset)
        <a class="angled-img" href="{{route('store.asset', $asset->id)}}">
                <div class="img img-offset">
                    <img src="{{asset('application/public')}}/{{$asset->image}}" alt="">
                    <div class="badge bg-primary">
                        On Sale
                    </div>
                </div>
                <div class="bottom-info">
                    <h4>{{Str::title($asset->name)}}</h4>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="price">Price:</div>
                        </div>
                        <div class="col-xs-6">
                            <div class="price">$34.99 <sup></sup></div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
            
    </div>
    <!-- /Specials -->


    <!-- Preorder -->
    <div class="h2"></div>
    <section class="youplay-banner youplay-banner-parallax small">
        <div class="image" data-speed="0.4">
            <img class="jarallax-img" src="{{asset('application/public')}}/{{getSettings()->promotion_image}}" alt="">
        </div>

        <div class="info container align-center">
            <div>
                <h2>{{Str::title(getSettings()->promotion_title)}} 3:<br> {{getSettings()->promotion_subtitle}}</h2>

                <!-- See countdown init in bottom of the page -->
                <div>{{getSettings()->promotion_description}}</div>

                <br><br>
                <a class="btn btn-lg" href="#">Coming Soon</a>
            </div>
        </div>
    </section>
    <!-- /Preorder -->


    <!-- Latest News -->
    <h2 class="container h1">Latest News</h2>
    <section class="youplay-news container">
        @foreach ($posts as $post)
            <!-- Single News Block -->
            <div class="news-one">
                    <div class="row vertical-gutter">
                        <div class="col-md-4">
                                <a href="{{route('blog.post', $post->id)}}" class="angled-img">
                                <div class="img">
                                    <img src="{{asset('application/public')}}/{{$post->image}}" alt="">
                                </div>
                                <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="9.1 out of 10"><span>9.1</span></div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="clearfix">
                                    <h3 class="h2 pull-left m-0"><a href="{{route('blog.post', $post->id)}}">{{$post->title}}</a></h3>
                                <span class="date pull-right"><i class="fa fa-calendar"></i> {{$post->created_at}}</span>
                            </div>
                            <div class="description">
                               {{Str::limit($post->description, 400)}}
                            </div>
                                <a href="{{route('blog.post', $post->id)}}" class="btn read-more pull-left">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- /Single News Block -->
        @endforeach
         


    </section>
    <!-- /Latest News -->

@endsection
