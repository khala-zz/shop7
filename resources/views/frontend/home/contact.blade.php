@extends('frontend.layouts.master')
	@section('title')
		<title>Liên hệ</title>
	@endsection

	@section('content')
    <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
            <section class="collection-heading heading-content ">
                <div class="container">
                    <div class="row">
                        <div class="collection-wrapper">
                            <h1 class="collection-title"><span>Liên hệ 1</span></h1>
                            <div class="breadcrumb-group">
                                <div class="breadcrumb clearfix">
                                    <span >
                                        <a href="{{ url('/') }}" title="Khala shop" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                    </span>
                                    <span class="arrow-space">></span>
                                    <span >
                                        <span >Liên hệ</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="contact_banner_show-content">
                <div class="blcontact_banner_showog-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="contact_banner_show-inner">
                                <div id="page">
                                    <div class="page-with-contact-form">
                                        <div id="shopify-section-contact-template" class="shopify-section">
                                            <div class="google-maps-content col-md-6">
                                                <div class="google-maps-wrapper">
                                                    <div class="google-maps-inner">
                                                        <div id="contact_map" class="map">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contact-form-group col-md-6">
                                                <form method="post" action="{{route('contact.store')}}" id="contact_form" class="contact-form" accept-charset="UTF-8">
                                                    @csrf
                                                    <!-- hien thi thong bao -->
                                                    @if(Session::has('flash_message_success'))
                                                        <div class="alert alert-success alert-dark alert-round alert-inline">
                                                            <h4 class="alert-title">Thành công :</h4>
                                                            {!! session('flash_message_success')!!}
                                                            
                                                        </div>
                                                    @endif
                                                    <!-- end hien thi thong bao -->
                                                    <div id="contactFormWrapper">
                                                        <p>
                                                           
                                                            <input class="{{ $errors->has('name') ? 'error' : '' }}" name="name" placeholder="Tên*" type="text" required/>
                                                            <!-- Error -->
                                                            @if ($errors->has('name'))
                                                                <div class="error">
                                                                    {{ $errors->first('name') }}
                                                                </div>
                                                            @endif
                                                        </p>
                                                        <p>
                                                            <input class="{{ $errors->has('email') ? 'error' : '' }}" name="email" placeholder="Email*" type="email" required />
                                                            <!-- error -->
                                                            @if ($errors->has('email'))
                                                                <div class="error">
                                                                    {{ $errors->first('email') }}
                                                                </div>
                                                            @endif
                                                        </p>
                                                        <p>
                                                            <input class="{{ $errors->has('mobile') ? 'error' : '' }}" name="mobile" type="text" placeholder="Điện thoại *" required />
                                                            <!-- Error -->
                                                            @if ($errors->has('mobile'))
                                                                <div class="error">
                                                                    {{ $errors->first('mobile') }}
                                                                </div>
                                                            @endif
                                                        </p>
                                                        <p>
                                                           
                                                            <textarea class="{{ $errors->has('message') ? 'error' : '' }}" required
                                                            placeholder="Nội dung *" name="message" rows="15" cols="75"></textarea>
                                                            <!-- error -->
                                                            @if ($errors->has('message'))
                                                                <div class="error">
                                                                    {{ $errors->first('message') }}
                                                                </div>
                                                            @endif
                                                        </p>
                                                        <p>
                                                            <input type="submit" id="contactFormSubmit" value="Gửi" class="btn">
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSxX2Un4CjYcWVyA3FOjBNcrVC1hlervk" type="text/javascript"></script>
                                            <script>
                                                $(window).ready(function($) {
                                                    if (jQuery().gMap) {
                                                        if ($('#contact_map').length) {
                                                            $('#contact_map').gMap({
                                                                zoom: 17,
                                                                scrollwheel: false,
                                                                maptype: 'ROADMAP',
                                                                markers: [{
                                                                    address: "346 Mã Lò Phường Bình Trị Đông A,Quận Bình Tân,TPHCM",
                                                                    html: "<strong>Văn phòng chính</strong><br>346 Mã Lò Bình Trị Đông A,Bình Tân,TPHCM"
                                                                }]
                                                            });
                                                        }
                                                    }
                                                });
                                            </script>
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


    


	