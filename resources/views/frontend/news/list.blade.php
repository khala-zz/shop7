@extends('frontend.layouts.master')
    @php 
        if(Request::segment(2))
            $title_cat = str_replace('-',' ', Request::segment(2));
        else
            $title_cat = 'Tin tức';
    @endphp
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
                                        <span itemprop="title">Tin tức</span>
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
                                                    Hiển thị {{ $news->firstItem() }} đến {{ $news->lastItem() }}
                                                    của tổng {{$news->total()}} tin tức
                                                </div>
                                                {{-- <div class="toolbar_right">
                                                    <div class="group_toolbar">
                                                        <!-- View as -->
                                                        <div class="grid_list">
                                                            <span class="toolbar_title">Select View</span>
                                                            <ul class="list-inline option-set hidden-xs" data-option-key="layoutMode">
                                                                <li data-option-value="fitRows" id="blog_goGrid" class="active goAction " data-toggle="tooltip" data-placement="top" title="" data-original-title="Grid">
                                                                    <i class="fa fa fa-th"></i>
                                                                </li>
                                                                <li data-option-value="straightDown" id="blog_goList" class="goAction " data-toggle="tooltip" data-placement="top" title="" data-original-title="List">
                                                                    <i class="fa fa-th-list"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="blog-items">
                                                
                                                @forelse( $news as $item)
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
                                                    Hiển thị {{ $news->firstItem() }} đến {{ $news->lastItem() }}
                                                    của tổng {{$news->total()}} tin tức
                                                </div>
                                                <div class="blog-pagination">
                                                    {!! $news -> links() !!}
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


    

	
	