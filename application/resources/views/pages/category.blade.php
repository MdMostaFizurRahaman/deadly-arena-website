@extends('layouts.app')

@section('title')
    Category
@endsection

@section('content')
<div class="content-wrap no-banner">
        

        
        <div class="container youplay-store store-grid">
    
            <!-- Games List -->
            <div class="col-md-12 isotope">
                <!-- Sort Categories -->
                <ul class="pagination">
                        <li  class="{{Request::is('store') ? 'active' : ''}}"><a href="{{route('store')}}">All</a></li>
                    @foreach ($categories as $category)
                        <li data-filter="all" class="{{Request::route('id') == $category->id ? 'active': ''}}"><a href="{{route('store.category', $category->id)}}">{{Str::title($category->name)}}</a></li>
                    @endforeach 
                </ul>
              
                <!-- /Sort Categories -->
    
                <div class="isotope-list row vertical-gutter" style="position: relative; height: 1638.67px;">
                    @foreach ($assets as $asset)
                        <!-- Single Product Block -->
                        <div class="item col-lg-4 col-md-6 col-xs-12"  style="position: absolute; left: 0px; top: 1310.94px;">
                            <a href="{{route('store.asset', $asset->id)}}" class="angled-img">
                                <div class="img img-offset">
                                    <img src="{{asset('application/public')}}/{{$asset->image}}" alt="">
                                </div>
                                <div class="bottom-info">
                                    <h4>{{Str::title($asset->name)}}</h4>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            
                                            <div class="rating">
                                                Price
                                            </div>
        
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="price">
                                                ${{$asset->price}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- /Single Product Block -->
                    @endforeach
                   
    
                </div>
    
            </div>
            <!-- /Games List -->
            {{$assets->links()}}
        </div>
    
    
        </div>
@endsection