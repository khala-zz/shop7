@extends('frontend.layouts.master')
    @php $title_cat = str_replace('-',' ', Request::segment(2)); @endphp
	@section('title')
		<title>{{$title_cat}}</title>
	@endsection

	 @section('content')
        <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
            <section class="collection-heading heading-content ">
                <a href="#">
                    <img class="img_heading" src="{{asset('images/banner_blog.png')}}" alt="Tin tức">
                </a>
                <div class="container">
                    <div class="row">
                        <div class="collection-wrapper">
                            <h1 class="collection-title"><span>Tin tức</span></h1>
                            <div class="breadcrumb-group">
                                <div class="breadcrumb clearfix">
                                    <span >
                                        <a href="{{ url('/') }}" title="Sarahmarket 1" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                    </span>
                                    <span class="arrow-space">/</span>
                                    <span >
                                       
                                
                                        @if($title_cat <> 'Tin tức')                                            
                                            <span itemprop="title">{{ $title_cat }}</span>
                                        @else
                                            <span itemprop="title">Tin tức</span>
                                        @endif
                            
                                        
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="blog-content">
                <div class="blog-wrapper">
                    <div class="container">
                        <div class="row">
                            <div id="shopify-section-blog-template" class="shopify-section">
                                <div class="blog-inner">
                                    <div id="blog">
                                        
                                        @include('frontend.news.left_news')
                                        {{-- cot phai --}}
                                        <div class="col-sm-9 articles">
                                            
                                            <div class="blog-toolbar">
                                                <div class="toolbar_left">
                                                    Hiển thị {{ $news_tag->firstItem() }} đến {{ $news_tag->lastItem() }}
                                                    của tổng {{$news_tag->total()}} tin tức
                                                </div>
                                                
                                            </div>
                                            <div class="blog-items">
                                                
                                                @forelse( $news_tag as $item)
                                                    <div class="article clearfix col-sm-6 blog_Grid">
                                                    <div class="article-image">
                                                        <a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}"><img src="{{ asset('uploads/news/'.$item -> image_name) }}" alt="{{$item -> title}}"></a>
                                                    </div>
                                                    <div class="articleinfo_group">
                                                        <div class="article-title">
                                                            <h2 class="article-name"><a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}">{{$item -> title}}</a></h2>
                                                        </div>
                                                        <ul class="article-info list-inline">
                                                            <li class="article-date">{{ $item -> created_at }}</li>
                                                            
                                                        </ul>
                                                        <div class="article-content">
                                                            <p>{!! mb_substr(strip_tags($item->description), 0, 270) !!}...</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                @empty
                                                    <p>Tin tức đang cập nhật</p>
                                                @endforelse
                                                
                                            </div>
                                            <div class="blog-bottom-toolbar">
                                                <div class="blog-counter">
                                                    Hiển thị {{ $news_tag->firstItem() }} đến {{ $news_tag->lastItem() }}
                                                    của tổng {{$news_tag->total()}} tin tức
                                                </div>
                                                <div class="blog-pagination">
                                                    {!! $news_tag -> links() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        </div>
    @endsection

    {{-- @section('content')
        
        <!-- Shop Category Area End -->
        <div class="shop-category-area blog-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="blog-posts">
                            
                            <div class="row">
                                @forelse( $news_tag as $item)
                                    <div class="col-md-6">
                                    <div class="single-blog-post blog-grid-post mt-30">
                                        <div class="blog-post-media">
                                            <div class="blog-image">
                                                <a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}"><img src="{{ asset('uploads/news/'.$item -> image_name) }}" alt="{{$item -> title}}" /></a>
                                            </div>
                                        </div>
                                        <div class="blog-post-content-inner mt-30">
                                            <h4 class="blog-title"><a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}">{{$item -> title}}</a></h4>
                                            <ul class="blog-page-meta">
                                                <li>
                                                    <i class="ion-person"></i> {{ $item -> user -> name }}
                                                </li>
                                                <li>
                                                    <i class="ion-calendar"></i> {{ $item -> created_at }}
                                                </li>
                                            </ul>
                                            <p>
                                                {!! mb_substr(strip_tags($item->description), 0, 270) !!}
                                            </p>
                                            <a class="read-more-btn" href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}"> Chi tiết <i class="ion-android-arrow-dropright-circle"></i></a>
                                        </div>
                                    </div>
                                    <!-- single blog post -->
                                    </div>
                                @empty
                                    <p>Tin tức đang cập nhật</p>
                                @endforelse
                            </div>
                        </div>
                        <!--  Pagination Area Start -->
                        <div class="text-center" >
                            {!! $news_tag -> links() !!}
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="col-lg-3 col-md-12 mb-res-md-60px mb-res-sm-60px">
                        @include('frontend.news.right_news')
                    </div>
                    <!-- Sidebar Area End -->
                </div>
            </div>
        </div>
        <!-- Shop Category Area End -->
        <!-- Footer Area start -->
	  
	@endsection --}}

	
	