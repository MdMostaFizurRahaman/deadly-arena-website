@extends('layouts.app')

@section('title')
    Asset
@endsection

@section('content')
<div class="content-wrap no-banner">
            <section class="youplay-news container">
                    <!-- Single News Block -->
                    <div class="news-one">
                            <div class="row vertical-gutter">
                                <div class="col-md-4">
                                    <a href="" class="angled-img">
                                        <div class="img">
                                            <img src="{{asset('application/public')}}/{{$asset->image}}" alt="">
                                        </div>
                                        {{-- <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="9.1 out of 10"><span>9.1</span></div> --}}
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="clearfix">
                                        <h3 class="h2 pull-left m-0"><a href="blog-asset-1.html">{{Str::title($asset->name)}}</a></h3>
                                        {{-- <span class="date pull-right"><i class="fa fa-calendar"></i> {{$asset->created_at}}</span> --}}
                                    </div>
                                    <div class="description">
                                       {{$asset->description}}
                                    </div>
                                    <a href="" class="btn btn-danger">Coming Soon</a>
                                </div>
                            </div>
                        </div>
                        <!-- /Single News Block -->        
            </section>
</div>
@endsection