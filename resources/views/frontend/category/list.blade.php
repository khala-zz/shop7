@extends('frontend.layouts.master')
	@section('title')
		<title>{{$category -> title}}</title>
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
                <!-- Breadcrumb Area start -->
                <section class="collection-heading heading-content ">
                    <a href="collections-all.html">
                    <img class="img_heading" src="assets/images/banner_collection.png" alt="">
                    </a>
                    <div class="container">
                        <div class="row">
                            <div class="collection-wrapper">
                                <h1 class="collection-title"><span>{{$category -> title}}</span></h1>
                                <div class="breadcrumb-group">
                                    <div class="breadcrumb clearfix">
                                        <span ><a href="{{url('/')}}" title="Sarahmarket 1" ><span itemprop="title">Trang chủ</span></a>
                                        </span>
                                        <span class="arrow-space">></span>
                                        <span >
                                            
                                                <span itemprop="title">{{$category -> title}}</span>
                                           
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- content area -->
                <section class="collection-content">
                    <div class="collection-wrapper">
                        <div class="container">
                            <div class="row">
                                <div id="shopify-section-collection-template" class="shopify-section">
                                    <div class="collection-inner">
                                        <!-- Tags loading -->
                                        <div id="tags-load" style="display:none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
                                        <div id="collection">
                                            <div class="collection_inner">
                                               
                                                <!-- filter shop trai -->
                                                @include('frontend.category.filter_shop')
                                                <!-- cot phai list product -->
                                                @include('frontend.category.right_shop')
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        /* Handle Grid - List */
                                        function handleGridList() {
                                            if ($('#goList').length) {
                                                $('#goList').on(clickEv, function(e) {
                                                    $(this).parent().find('li').removeClass('active');
                                                    $(this).addClass('active');
                                                    $('.collection-items').addClass('full_width ListMode');
                                                    $('.collection-items').removeClass('no_full_width GridMode');
                                                    $('.collection-items .row-left').addClass('col-md-5');
                                                    $('.collection-items .row-right').addClass('col-md-7');
                                                    $('.collection-items .product-item').removeClass('col-sm-3 col-sm-4');
                                                    $('.grid-mode').addClass("hide");
                                                    $('.list-mode').removeClass("hide");
                                                });
                                            }
                                            if ($('#goGrid').length) {
                                                $('#goGrid').on(clickEv, function(e) {
                                                    $(this).parent().find('li').removeClass('active');
                                                    $(this).addClass('active');
                                                    $('.collection-items').removeClass('full_width ListMode');
                                                    $('.collection-items').addClass('no_full_width GridMode');
                                                    $('.collection-items .row-left').removeClass('col-md-5');
                                                    $('.collection-items .row-right').removeClass('col-md-7');

                                                    $('.collection-items .product-item').addClass('col-sm-3');

                                                    $('.grid-mode').removeClass("hide");
                                                    $('.list-mode').addClass("hide");
                                                });
                                            }
                                        }
                                        $(document).ready(function() {
                                            if (location.search.search("sort_by=") == -1) {

                                            } else {
                                                if (location.search != "") {
                                                    var stpo = location.search.search("sort_by=") + 8,
                                                        sortby_url = '.' + location.search.substr(stpo).split('='),
                                                        sortby_url_a = sortby_url + " a";
                                                    $(sortby_url).addClass("active");
                                                    $('#sortButton .name').html($(sortby_url_a).html());
                                                } else {
                                                    $('.manual').addClass("active");
                                                }
                                            }
                                            handleGridList();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- footer_shop -->
                @include('frontend.shop.footer_shop')
                    
            </main>
        </div>
    @endsection

	

	
	