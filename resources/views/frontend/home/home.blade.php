@extends('frontend.layouts.master')
	@section('title')
		<title>Trang chủ</title>
	@endsection
	
    @section('js')
       
        <script type="text/javascript">
            //dung cho ajax review
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>
    @endsection
	
    @section('content')
    <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
            <!-- hien thi thong bao -->
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-dark alert-round alert-inline">
                    <h4 class="alert-title">Thành công :</h4>
                    {!! session('flash_message_success')!!}
                    {{-- <button type="button" class="btn btn-link btn-close">
                        <i class="d-icon-times"></i>
                    </button> --}}
                </div>
            @endif
            @if(Session::has('flash_message_error'))
                <div class="alert alert-dark alert-danger alert-round alert-inline">
                    
                    {!! session('flash_message_error')!!}
                    {{-- <button type="button" class="btn btn-link btn-close">
                        <i class="d-icon-times"></i>
                    </button> --}}
                </div>
            @endif
            <!-- end hien thi thong bao -->
            <!-- BEGIN content_for_index -->
            <!-- slider -->
            @include('frontend.home.components.slider')
            {{-- co the ban thich --}}

            @include('frontend.home.components.you_like')
            
            {{-- banner 1 --}}
            <div class="shopify-section index-section index-section-banner">
                <div data-section-id="1491192677181" data-section-type="banner-section">
                    <section class="home_banner_layout">
                        <div class="home_banner_wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="home_banner_inner">
                                        <div class="home_banner_content">
                                            <div class="col-sm-12 banner_item">
                                                <a href="{{ url('cua-hang') }}">
                                                    <img src="{{asset('images/home1_bn1.png')}}" alt="Cua hang">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            {{-- san pham ban chay va moi ve --}}
            <div id="shopify-section-1490953257213" class="shopify-section index-section index-section-procol">
                <div data-section-id="1490953257213" data-section-type="procol-section">
                    <section class="home_procol_layout">
                        <div class="home_procol_wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="home_procol_inner">
                                        <div class="home_procol_content">
                                           
                                            <!-- san pham moi ve -->
                                            @include('frontend.home.components.best_seller')
                                            <!-- san pham moi ve -->
                                            @include('frontend.home.components.new_arrivals')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            {{-- banner 2 --}}
            <div class="shopify-section index-section index-section-banner">
                <div data-section-id="1491192677181" data-section-type="banner-section">
                    <section class="home_banner_layout">
                        <div class="home_banner_wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="home_banner_inner">
                                        <div class="home_banner_content">
                                            <div class="col-sm-12 banner_item">
                                                <a href="{{ url('cua-hang') }}">
                                                    <img src="{{asset('images/home1_bn2.png')}}" alt="Cua hang">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            {{-- danh muc thoi trang --}}
            @include('frontend.home.components.fashion')
            
            {{-- banner 3 --}}
            <div class="shopify-section index-section index-section-banner">
                <div data-section-id="1491192677181" data-section-type="banner-section">
                    <section class="home_banner_layout">
                        <div class="home_banner_wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="home_banner_inner">
                                        <div class="home_banner_content">
                                            <div class="col-sm-12 banner_item">
                                                <a href="{{ url('cua-hang') }}">
                                                    <img src="{{asset('images/home1_bn3.png')}}" alt="Cua hang">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            {{-- danh muc the thao --}}
            @include('frontend.home.components.sport')
            
            {{-- banner 4 --}}
            <div class="shopify-section index-section index-section-banner">
                <div data-section-id="1491192677181" data-section-type="banner-section">
                    <section class="home_banner_layout">
                        <div class="home_banner_wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="home_banner_inner">
                                        <div class="home_banner_content">
                                            <div class="col-sm-12 banner_item">
                                                <a href="{{ url('/') }}">
                                                    <img src="{{asset('images/home1_bn1.png')}}" alt="Cua hang">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            {{-- danh muc dien tu --}}            
            @include('frontend.home.components.electronic')
            
            {{-- banner 5 --}}
            <div class="shopify-section index-section index-section-banner">
                <div data-section-id="1491192677181" data-section-type="banner-section">
                    <section class="home_banner_layout">
                        <div class="home_banner_wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="home_banner_inner">
                                        <div class="home_banner_content">
                                            <div class="col-sm-12 banner_item">
                                                <a href="{{ url('cua-hang') }}">
                                                    <img src="{{asset('images/home1_bn5.png')}}" alt="Cua hang">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            {{-- danh muc cong nghe --}}            
            @include('frontend.home.components.tech')
            
            {{-- banner 6 --}}
            <div class="shopify-section index-section index-section-banner">
                <div data-section-id="1491192677181" data-section-type="banner-section">
                    <section class="home_banner_layout">
                        <div class="home_banner_wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="home_banner_inner">
                                        <div class="home_banner_content">
                                            <div class="col-sm-12 banner_item">
                                                <a href="{{ url('cua-hang') }}">
                                                    <img src="{{asset('images/home1_bn6.png')}}" alt="Cua hang">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            {{-- danh muc noi that --}}            
            @include('frontend.home.components.furniture')

            {{-- danh muc thinh hanh --}} 

            @include('frontend.home.components.top_trend')
            
           
             <!-- popup newsletter-->
            @include('frontend.components.modal_newsletter')
            <!-- popup end -->
        </main>
    </div>
    @endsection
	


