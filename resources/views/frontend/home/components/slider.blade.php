<div id="shopify-section-1490952756465" class="shopify-section index-section index-section-slideshow">
    <div data-section-id="1490952756465" data-section-type="slideshow-section">
        <section class="home_slideshow main-slideshow">
            <div class="home-slideshow-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="group-home-slideshow">
                            <div class="home-slideshow-inner col-sm-8">
                                <div class="home-slideshow">
                                    <div id="home_main-slider" class="carousel slide  main-slider">
                                        <ol class="carousel-indicators">
                                            <li data-target="#home_main-slider" data-slide-to="0" class="carousel-1"></li>
                                            <li data-target="#home_main-slider" data-slide-to="1" class="carousel-2 active"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            @forelse($sliders as $index => $slider)
                                                <div class="item image {{$index == 0?'active':''}}">
                                                    <img src="{{asset('uploads/sliders/'.$slider -> image_name)}}" alt="{{$slider -> name}}" title="{{$slider -> name}}">
                                                    <div class="slideshow-caption  {{$index == 0?'position-right':'position-middle'}}">
                                                        <div class="slide-caption">
                                                            <div class="group-caption">
                                                                <div class="content">
                                                                    <span class="title_1">
                                                                        {{$slider -> name}}
                                                                    </span>
                                                                    <span class="title_2">
                                                                        {{$slider -> nametwo}}
                                                                    </span>
                                                                    <span class="caption">
                                                                        {!! $slider -> description !!}
                                                                    </span>
                                                                </div>
                                                                <div class="flex-action"><a class="btn" href="{{url($slider -> namefour)}}">Mua sắm</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            @empty
                                                <p>Chưa có slider</p>
                                            @endforelse
                                        </div>
                                        <a class="left carousel-control" href="#home_main-slider" data-slide="prev">
                                            <span class="icon-prev"></span>
                                        </a>
                                        <a class="right carousel-control" href="#home_main-slider" data-slide="next">
                                            <span class="icon-next"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="home-banner-inner col-sm-4">
                                <div class="banner-content">
                                    @forelse($banners as $index => $banner)
                                        <div class="{{$index == 0?'banner-1':'banner-2'}}">
                                            <a href="{{$banner -> link}}">
                                                <img src="{{asset('uploads/banners/'.$banner -> image)}}" alt="{{$banner -> title}}">
                                            </a>
                                        </div>
                                    @empty
                                        <p>Chưa có slider</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>