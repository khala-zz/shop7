@extends('frontend.layouts.master')
    @section('title')
        <title>{{ $keyword }}</title>
    @endsection
    
    @section('content')
        <div class="page-container" id="PageContainer">
            <main class="main-content" id="MainContent" role="main">
                <!-- Breadcrumb Area start -->
                <section class="collection-heading heading-content ">
                    <a href="collections-all.html">
                    <img class="img_heading" src="{{asset('images/banner_collection.png')}}" alt="Cửa hàng">
                    </a>
                    <div class="container">
                        <div class="row">
                            <div class="collection-wrapper">
                                <h1 class="collection-title"><span>{{ $keyword }}</span></h1>
                                <div class="breadcrumb-group">
                                    <div class="breadcrumb clearfix">
                                        <span ><a href="{{url('/')}}" title="Sarahmarket 1" ><span itemprop="title">Trang chủ</span></a>
                                        </span>
                                        <span class="arrow-space">></span>
                                        <span >
                                            
                                                <span itemprop="title">{{ $keyword }}</span>
                                           
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
                                               
                                                <div class="collection-mainarea col-sm-12 clearfix">
      
                                                    <div class="collection_toolbar">
                                                        <div class="toolbar_left">
                                                            Hiển thị {{ $products->firstItem() }} đến {{ $products->lastItem() }}
                                                            của tổng {{$products->total()}} sản phẩm
                                                        </div>
                                                        <div class="toolbar_right">
                                                            <div class="group_toolbar">
                                                                
                                                                <!-- Sort by -->
                                                                <div class="sortBy">
                                                                    
                                                                    <span class="toolbar_title">Sắp xếp:</span>
                                                                    <form method ="get" action="{{url() -> current()}}">   
                                                                        <select name="orderby"  class="toolbar_title" onchange="this.form.submit()">
                                                                             <option value="created_at_latest" {{Request::get('orderby') == 'created_at_latest'?'selected':''}}>Mới nhất</option>
                                                                             <option value="created_at_oldest" {{Request::get('orderby') == 'created_at_oldest'?'selected':''}}>Cũ nhất</option>     
                                                                            <option  value="title_tang" {{Request::get('orderby') == 'title_tang'?'selected':''}}>A đến Z</option>
                                                                            <option  value="title_giam" {{Request::get('orderby') == 'title_giam'?'selected':''}}> Z đến A</option>
                                                                            <option  value="price_tang" {{Request::get('orderby') == 'price_tang'?'selected':''}}>Giá thấp đến cao</option>
                                                                            <option  value="price_giam" {{Request::get('orderby') == 'price_giam'?'selected':''}}> Giá cao đến thấp</option>
                                                                            
                                                                                                              
                                                                        </select>

                                                                        <input type="hidden" name="search_product" value="{{Request::get('search_product')?Request::get('search_product') : ''}}">
                                                                        <input type="hidden" name="poscats" value="{{Request::get('poscats')?Request::get('poscats') : ''}}">      
                                                                    
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="collection-items clearfix">
                                                        <div class="products">
                                                            @forelse($products as $product)
                                                                <!-- kiem tra xem product co giam gia hay khong? -->
                                                                @if(!empty($product -> discount))
                                                                @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                                                                @else
                                                                @php $product_price = $product -> price; @endphp
                                                                @endif
                                                                <!-- end kiem tra xem product co giam gia hay khong? -->
                                                                <div class="product-item col-sm-3">
                                                                    <div class="product">
                                                                        <div class="row-left">
                                                                            <a href="{{url('/san-pham/'.slugify($product  -> title,'-').'/'.$product ->  id)}}" class="hoverBorder container_item">
                                                                                <div class="hoverBorderWrapper">
                                                                                    <img src="{{asset('uploads/products-daidien/'.$product -> image)}}" class="img-responsive front" alt="{{$product -> title}}">
                                                                                    
                                                                                </div>
                                                                            </a>
                                                                            @if(!empty($product -> discount))
                                                                                <span class="sale_banner">
                                                                                    <span class="sale_text">-{{$product -> discount}}%</span>
                                                                                </span>
                                                                            @endif
                                                                            <div class="hover-mask grid-mode">
                                                                                <div class="group-mask">
                                                                                    <div class="inner-mask">
                                                                                        <div class="group-actionbutton">
                                                                                            
                                                                                                <div class="effect-ajax-cart">
                                                                                                    
                                                                                                   <button class="btn btn-1 select-option btn-add-cart" type="button" value = "{{$product -> id.'khala'.$product -> product_code . 'khala'.$product -> title.'khala'.$product_price}}" url="{{url('add-cart')}}"><i class="fa fa-bars fa-khala"></i></button>
                                                                                                </div>
                                                                                            
                                                                                            {{-- <ul class="quickview-wishlist-wrapper">
                                                                                                <li class="quickview hidden-xs hidden-sm">
                                                                                                    <div class="product-ajax-cart ">
                                                                                                        <span class="overlay_mask"></span>
                                                                                                        <div data-handle="seafood-restaurant" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
                                                                                                            <a class=""><i class="fa fa-search" title="Quick View"></i></a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </li>
                                                                                                <li class="wishlist hidden-xs">
                                                                                                    <a class="wish-list" href="wish-list.html"><span class="hidden-xs"><i class="fa fa-heart" title="Wishlist"></i></span></a>
                                                                                                </li>
                                                                                            </ul> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--inner-mask-->
                                                                                </div>
                                                                                <!--Group mask-->
                                                                            </div>
                                                                        </div>
                                                                        <div class="row-right animMix">
                                                                            <div class="grid-mode">
                                                                                <div class="product-title"><a class="title-5" href="{{url('/san-pham/'.slugify($product  -> title,'-').'/'.$product ->  id)}}">{{$product -> title}}</a></div>
                                                                                <div class="rating-star">
                                                                                    <span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
                                                                                    </span>
                                                                                </div>
                                                                                <div class="product-price">
                                                                                    <!-- hien thi gia -->
                                                                                        @if(!empty($product -> discount))
                                                                                                                                                                   
                                                                                            <span class="price_sale"><span class="money" >{{formatMoney($product -> price * (100 - $product -> discount)/100) }}</span></span>
                                                                                            <del class="price_compare"> <span class="money">{{formatMoney($product -> price)}}</span></del>
                                                                                        @else
                                                                                           
                                                                                            <span class="price_sale"><span class="money" >{{formatMoney($product -> price)}}</span></span>
                                                                                          
                                                                                        @endif
                                                                                    <!-- end hien thi gia -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="list-mode hide">
                                                                                <div class="list-left">
                                                                                    <div class="product-title"><a class="title-5" href="product.html">Digital equipment</a></div>
                                                                                    <div class="rating-star">
                                                                                        <span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="product-description">
                                                                                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis amet voluptas assumenda est, omnis dolor repellendus quis nostrum. Temporibus autem quibusdam et aut officiis debitis aut rerum dolorem necessitatibus saepe eveniet ut et neque porro quisquam est, qui...
                                                                                    </div>
                                                                                </div>
                                                                                <div class="list-right">
                                                                                    <div class="product-price">
                                                                                        <!-- hien thi gia -->
                                                                                        @if(!empty($product -> discount))
                                                                                                                                                                   
                                                                                            <span class="price_sale"><span class="money" >{{formatMoney($product -> price * (100 - $product -> discount)/100) }}</span></span>
                                                                                            <del class="price_compare"> <span class="money">{{formatMoney($product -> price)}}</span></del>
                                                                                        @else
                                                                                           
                                                                                            <span class="price_sale"><span class="money" >{{formatMoney($product -> price)}}</span></span>
                                                                                          
                                                                                        @endif
                                                                                        <!-- end hien thi gia -->
                                                                                    </div>
                                                                                    <div class="product-group-actions">
                                                                                        
                                                                                            <div class="effect-ajax-cart">
                                                                                                
                                                                                                <button class="btn btn-1 select-option btn-add-cart" type="button" value = "{{$product -> id.'khala'.$product -> product_code . 'khala'.$product -> title.'khala'.$product_price}}" url="{{url('add-cart')}}"><i class="fa fa-bars fa-khala"></i></button>
                                                                                            </div>
                                                                                        
                                                                                        {{-- <ul class="quickview-wishlist-wrapper">
                                                                                            <li class="product-wishlist wishlist">
                                                                                                <a class="wish-list" href="wish-list.html"><span class="hidden-xs"><i class="fa fa-heart" title="Wishlist"></i></span></a>
                                                                                            </li>
                                                                                            <li class="product-quickview quickview hidden-xs hidden-sm">
                                                                                                <div class="product-ajax-cart ">
                                                                                                    <span class="overlay_mask"></span>
                                                                                                    <div data-handle="seafood-restaurant" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
                                                                                                        <a class=""><i class="fa fa-search" title="Quick View"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                            <p>Chưa có sản phẩm</p>
                                                            @endforelse

                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="collection-bottom-toolbar">
                                                        <div class="product-counter col-sm-6">
                                                            Hiển thị {{ $products->firstItem() }} đến {{ $products->lastItem() }}
                                                            của tổng {{$products->total()}} sản phẩm
                                                        </div>
                                                        <div class="product-pagination col-sm-6">
                                                            <div class="pagination_group">
                                                                {!! $products -> links() !!}
                                                            </div>
                                                        </div>
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
                <!-- footer_shop -->
                {{-- @include('frontend.shop.footer_shop') --}}
                    
            </main>
        </div>
    @endsection

    
    