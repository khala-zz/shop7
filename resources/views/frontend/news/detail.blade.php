@extends('frontend.layouts.master')
	@section('title')
		<title>{{$news -> title}}</title>
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
                                
                                <div class="collection-title"><span>{{$news -> title}}</span></div>
                                <div class="breadcrumb-group">
                                    <div class="breadcrumb clearfix">
                                        <span ><a href="{{ url('/') }}" title="Khala shop" ><span >Trang chủ</span></a>
                                        </span>
                                        <span class="arrow-space">></span>
                                        <span >
                                            <a href="{{ url('tin-tuc') }}" title="News" itemprop="url">
                                                <span itemprop="title">Tin tức</span>
                                            </a>
                                        </span>
                                        <span class="arrow-space">></span>
                                        <span >
                                            <span itemprop="title">{{$news -> title}}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="article-content">
                    <div class="article-wrapper">
                        <div class="container">
                            <div class="row">
                                <div id="shopify-section-article-template" class="shopify-section">
                                    <div class="article-inner" itemscope="" itemtype="http://schema.org/NewsArticle">
                                        <meta itemprop="datePublished" content="2017-04-02 22:40:56 -0400">
                                        <meta itemprop="dateModified" content="2017-04-02 22:40:00 -0400">
                                        <div itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
                                            <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                                                <meta itemprop="url" content="./assets/images/blog_07.jpg">
                                            </div>
                                            <meta itemprop="name" content="Shopify">
                                        </div>
                                        <div id="article">
                                            {{-- cot trai --}}
                                            @include('frontend.news.left_news')
                                            {{-- end cot trai --}}
                                            <div class="col-sm-9 article">
                                                <!-- Begin article -->
                                                <div class="article-body clearfix">
                                                    <div class="group-blog-top">
                                                        <ul class="article-info list-inline">
                                                            <li class="article-date">{{ $news -> created_at }}</li>
                                                            <li>
                                                                
                                                                <span class="article-author">
                                                                    <span>- </span>
                                                                    <span>Đăng bởi</span>
                                                                    <i class="author" itemprop="name">{{ $news -> user -> name }}</i>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                        <div class="article-title">
                                                            <h1 class="article-name" itemprop="headline">{{ $news -> title }}</h1>
                                                        </div>
                                                        <div class="top-banner article_banner_show article-image" >
                                                            <img src="{{ asset('uploads/news/'.$news -> image_name) }}" alt="{{$news -> title}}">
                                                            {{-- <meta itemprop="url" content="assets/images/blog_07.jpg">
                                                            <meta itemprop="width" content="863">
                                                            <meta itemprop="height" content="575"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="articleinfo_group">
                                                        <div  class="article-content" itemprop="description">
                                                            {!! $news -> description !!}
                                                            <span class="clearfix"></span><span></span>
                                                            {!! $news -> content !!}
                                                        </div>
                                                        <div class="group-blog-btm">
                                                            <div class="share-with supports-fontface col-sm-6">
                                                                <div class="social-sharing is-clean" data-permalink="article.html">
                                                                    <a target="_blank" href="article.html" class="share-facebook">
                                                                        <span class="icon icon-facebook"></span>
                                                                        <span class="share-title">Share</span>
                                                                    </a>
                                                                    <a target="_blank" href="article.html" class="share-twitter">
                                                                        <span class="icon icon-twitter"></span>
                                                                        <span class="share-title">Tweet</span>
                                                                    </a>
                                                                    <a target="_blank" href="article.html" class="share-pinterest">
                                                                        <span class="icon icon-pinterest"></span>
                                                                        <span class="share-title">Pin it</span>
                                                                    </a>
                                                                    <a target="_blank" href="article.html" class="share-fancy">
                                                                        <span class="icon icon-fancy"></span>
                                                                        <span class="share-title">Fancy</span>
                                                                    </a>
                                                                    <a target="_blank" href="article.html" class="share-google">
                                                                        <!-- Cannot get Google+ share count with JS yet -->
                                                                        <span class="icon icon-google-plus"></span>
                                                                        <span class="share-count is-loaded">+1</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            {{-- <!-- Prev Next -->
                                                            <div class="current-body col-sm-6">
                                                                <a href="article.html" class="prev">
                                                                    Prev
                                                                </a>
                                                                <a class="next" href="article.html">
                                                                    Next
                                                                </a>
                                                            </div>
                                                            <!-- End Prev Next --> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End article -->
                                                <div class="tags-area col-sm-12">
                                                    <span><i class="fa fa-tags" aria-hidden="true"></i></span>
                                                    @php $len = $news -> tags -> count() @endphp
                                                    @forelse($news -> tags as $key => $tag)
                                                       
                                                            <a href="{{route('list.news.tags',['slug' => slugify($tag -> name,'-'),'id' => $tag -> id ])}}" >{{$tag -> name}}</a>{{$key <> $len -1 ?',':''}}
      
                                                    @empty
                                                        <p>Không có tags</p>
                                                    @endforelse
                                                    
                                                </div>
                                               
                                                <!-- Related Posts  -->
                                                
                                                @include('frontend.news.related_news')
                                                
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

    

	
	