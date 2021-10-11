
<div id="shopify-section-1490955218917" class="shopify-section index-section index-section-protab2">
    <div data-section-id="1490955218917" data-section-type="protab2-section">
        <section class="home_protab2_layout">
            <div class="home_protab2_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="home_protab2_inner">
                            <div class="home_protab2_content">
                                <div class="protab2_top page-top">
                                    <div class="page-title">
                                        <img src="{{asset('images/home1_icon-tren.png')}}" alt="Thịnh hành">
                                        <h2>Thịnh hành</h2>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active "><a href="#home_protab6_tab_1" data-toggle="tab">Bán chạy</a></li>
                                        <li class=""><a href="#home_protab6_tab_2" data-toggle="tab">Nổi bật</a></li>
                                        <li class=""><a href="#home_protab6_tab_3" data-toggle="tab">Đánh giá nhiều</a></li>
                                        <li class=""><a href="#home_protab6_tab_4" data-toggle="tab">Mới về</a></li>
                                    </ul>
                                </div>
                                <div class="protab2_bottom">
                                    <div class="protab2_banner">
                                        @forelse($banners_trend as $banner)
                                            <div class="banner_content col-sm-6">
                                                <a href="{{$banner -> link}}"><img src="{{asset('uploads/banners/'.$banner -> image)}}" alt="{{$banner -> title}}"></a>
                                            </div>
                                        @empty
                                            <p>Banner đang cập nhật</p>
                                        @endforelse

                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home_protab6_tab_1">
                                            <div class="protab2_item home1_protab2_item">
                                                {{-- san pham ban chay --}}
                                                @forelse($products_trend_selling as $product)
                                                    <!-- kiem tra xem product co giam gia hay khong? -->
                                                    @if(!empty($product -> discount))
                                                    @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                                                    @else
                                                    @php $product_price = $product -> price; @endphp
                                                    @endif
                                                    <!-- end kiem tra xem product co giam gia hay khong? -->
                                                    <div class="content_product">
                                                        <div class="row-container product list-unstyled clearfix">
                                                            <div class="row-left">
                                                                <a href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}" class="hoverBorder container_item">
                                                                    <div class="hoverBorderWrapper">
                                                                        <img src="{{asset('uploads/products-daidien/'.$product -> image)}}" class="img-responsive front" alt="{{ $product -> title}}">
                                                                    </div>
                                                                </a>
                                                                @if(!empty($product -> discount))
                                                                    <span class="sale_banner">
                                                                        <span class="sale_text">-{{$product -> discount}}%</span>
                                                                    </span>
                                                                @endif
                                                                <div class="hover-mask">
                                                                    <div class="group-mask">
                                                                        <div class="inner-mask">
                                                                            <div class="group-actionbutton">
                                                                                
                                                                                    <div class="effect-ajax-cart">
                                                                                        <button class="btn select-option btn-add-cart" type="button" value = "{{$product -> id.'khala'.$product -> product_code . 'khala'.$product -> title.'khala'.$product_price}}" url="{{url('add-cart')}}"><i class="fa fa-bars fa-khala"></i></button>
                                                                                    </div>
                                                                                
                                                                                {{-- <ul class="quickview-wishlist-wrapper">
                                                                                    <li class="quickview hidden-xs hidden-sm">
                                                                                        <div class="product-ajax-cart">
                                                                                            <span class="overlay_mask"></span>
                                                                                            <div data-handle="copy-of-ranspperant-case" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
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
                                                                <div class="product-title"><a class="title-5" href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}">{{ $product -> title}}</a></div>
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
                                                        </div>
                                                        <div class="index-galimg thumbs clearfix">
                                                            <div class="index-galimg-inner">
                                                                <div class="index-galimg-content">
                                                                    <!--galerry -->
                                                                    @forelse($product -> gallery as $imageGallery)
                                                                        
                                                                        <div class="galimg-item">
                                                                            <img src="{{asset('uploads/'.$product->id.'/'.$imageGallery -> image)}}" alt="{{$imageGallery -> image}}">
                                                                        </div>
                                                                    @empty
                                                                        <p> Chưa có gallery </p>
                                                                    @endforelse
                                                                    <!-- end gallery -->
                                                                    
                                                                    
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p>Sản phẩm đang cập nhật</p>
                                                @endforelse
                                                
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="home_protab6_tab_2">
                                            <div class="protab2_item home1_protab2_item">
                                                {{-- san pham noi bat --}}
                                                @forelse($products_trend_featured as $product)
                                                    <!-- kiem tra xem product co giam gia hay khong? -->
                                                    @if(!empty($product -> discount))
                                                    @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                                                    @else
                                                    @php $product_price = $product -> price; @endphp
                                                    @endif
                                                    <!-- end kiem tra xem product co giam gia hay khong? -->
                                                    <div class="content_product">
                                                        <div class="row-container product list-unstyled clearfix">
                                                            <div class="row-left">
                                                                <a href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}" class="hoverBorder container_item">
                                                                    <div class="hoverBorderWrapper">
                                                                        <img src="{{asset('uploads/products-daidien/'.$product -> image)}}" class="img-responsive front" alt="{{ $product -> title}}">
                                                                    </div>
                                                                </a>
                                                                @if(!empty($product -> discount))
                                                                    <span class="sale_banner">
                                                                        <span class="sale_text">-{{$product -> discount}}%</span>
                                                                    </span>
                                                                @endif
                                                                <div class="hover-mask">
                                                                    <div class="group-mask">
                                                                        <div class="inner-mask">
                                                                            <div class="group-actionbutton">
                                                                                
                                                                                    <div class="effect-ajax-cart">
                                                                                        <button class="btn select-option btn-add-cart" type="button" value = "{{$product -> id.'khala'.$product -> product_code . 'khala'.$product -> title.'khala'.$product_price}}" url="{{url('add-cart')}}"><i class="fa fa-bars fa-khala"></i></button>
                                                                                    </div>
                                                                                
                                                                                {{-- <ul class="quickview-wishlist-wrapper">
                                                                                    <li class="quickview hidden-xs hidden-sm">
                                                                                        <div class="product-ajax-cart">
                                                                                            <span class="overlay_mask"></span>
                                                                                            <div data-handle="copy-of-ranspperant-case" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
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
                                                                <div class="product-title"><a class="title-5" href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}">{{ $product -> title}}</a></div>
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
                                                        </div>
                                                        <div class="index-galimg thumbs clearfix">
                                                            <div class="index-galimg-inner">
                                                                <div class="index-galimg-content">
                                                                    <!--galerry -->
                                                                    @forelse($product -> gallery as $imageGallery)
                                                                        
                                                                        <div class="galimg-item">
                                                                            <img src="{{asset('uploads/'.$product->id.'/'.$imageGallery -> image)}}" alt="{{$imageGallery -> image}}">
                                                                        </div>
                                                                    @empty
                                                                        <p> Chưa có gallery </p>
                                                                    @endforelse
                                                                    <!-- end gallery -->
                                                                    
                                                                    
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p>Sản phẩm đang cập nhật</p>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="home_protab6_tab_3">
                                            <div class="protab2_item home1_protab2_item">
                                                {{-- san pham danh gia nhieu --}}
                                                @forelse($products_trend_reviews as $product)
                                                    <!-- kiem tra xem product co giam gia hay khong? -->
                                                    @if(!empty($product -> discount))
                                                    @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                                                    @else
                                                    @php $product_price = $product -> price; @endphp
                                                    @endif
                                                    <!-- end kiem tra xem product co giam gia hay khong? -->
                                                    <div class="content_product">
                                                        <div class="row-container product list-unstyled clearfix">
                                                            <div class="row-left">
                                                                <a href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}" class="hoverBorder container_item">
                                                                    <div class="hoverBorderWrapper">
                                                                        <img src="{{asset('uploads/products-daidien/'.$product -> image)}}" class="img-responsive front" alt="{{ $product -> title}}">
                                                                    </div>
                                                                </a>
                                                                @if(!empty($product -> discount))
                                                                    <span class="sale_banner">
                                                                        <span class="sale_text">-{{$product -> discount}}%</span>
                                                                    </span>
                                                                @endif
                                                                <div class="hover-mask">
                                                                    <div class="group-mask">
                                                                        <div class="inner-mask">
                                                                            <div class="group-actionbutton">
                                                                                
                                                                                    <div class="effect-ajax-cart">
                                                                                        <button class="btn select-option btn-add-cart" type="button" value = "{{$product -> id.'khala'.$product -> product_code . 'khala'.$product -> title.'khala'.$product_price}}" url="{{url('add-cart')}}"><i class="fa fa-bars fa-khala"></i></button>
                                                                                    </div>
                                                                                
                                                                                {{-- <ul class="quickview-wishlist-wrapper">
                                                                                    <li class="quickview hidden-xs hidden-sm">
                                                                                        <div class="product-ajax-cart">
                                                                                            <span class="overlay_mask"></span>
                                                                                            <div data-handle="copy-of-ranspperant-case" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
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
                                                                <div class="product-title"><a class="title-5" href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}">{{ $product -> title}}</a></div>
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
                                                        </div>
                                                        <div class="index-galimg thumbs clearfix">
                                                            <div class="index-galimg-inner">
                                                                <div class="index-galimg-content">
                                                                    <!--galerry -->
                                                                    @forelse($product -> gallery as $imageGallery)
                                                                        
                                                                        <div class="galimg-item">
                                                                            <img src="{{asset('uploads/'.$product->id.'/'.$imageGallery -> image)}}" alt="{{$imageGallery -> image}}">
                                                                        </div>
                                                                    @empty
                                                                        <p> Chưa có gallery </p>
                                                                    @endforelse
                                                                    <!-- end gallery -->
                                                                    
                                                                    
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p>Sản phẩm đang cập nhật</p>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="home_protab6_tab_4">
                                            <div class="protab2_item home1_protab2_item">
                                                {{-- san pham danh moi ve --}}

                                                @forelse($products_trend_arrivals as $product)
                                                    <!-- kiem tra xem product co giam gia hay khong? -->
                                                    @if(!empty($product -> discount))
                                                    @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                                                    @else
                                                    @php $product_price = $product -> price; @endphp
                                                    @endif
                                                    <!-- end kiem tra xem product co giam gia hay khong? -->
                                                    <div class="content_product">
                                                        <div class="row-container product list-unstyled clearfix">
                                                            <div class="row-left">
                                                                <a href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}" class="hoverBorder container_item">
                                                                    <div class="hoverBorderWrapper">
                                                                        <img src="{{asset('uploads/products-daidien/'.$product -> image)}}" class="img-responsive front" alt="{{ $product -> title}}">
                                                                    </div>
                                                                </a>
                                                                @if(!empty($product -> discount))
                                                                    <span class="sale_banner">
                                                                        <span class="sale_text">-{{$product -> discount}}%</span>
                                                                    </span>
                                                                @endif
                                                                <div class="hover-mask">
                                                                    <div class="group-mask">
                                                                        <div class="inner-mask">
                                                                            <div class="group-actionbutton">
                                                                                
                                                                                    <div class="effect-ajax-cart">
                                                                                        <button class="btn select-option btn-add-cart" type="button" value = "{{$product -> id.'khala'.$product -> product_code . 'khala'.$product -> title.'khala'.$product_price}}" url="{{url('add-cart')}}"><i class="fa fa-bars fa-khala"></i></button>
                                                                                    </div>
                                                                                
                                                                                {{-- <ul class="quickview-wishlist-wrapper">
                                                                                    <li class="quickview hidden-xs hidden-sm">
                                                                                        <div class="product-ajax-cart">
                                                                                            <span class="overlay_mask"></span>
                                                                                            <div data-handle="copy-of-ranspperant-case" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
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
                                                                <div class="product-title"><a class="title-5" href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}">{{ $product -> title}}</a></div>
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
                                                        </div>
                                                        <div class="index-galimg thumbs clearfix">
                                                            <div class="index-galimg-inner">
                                                                <div class="index-galimg-content">
                                                                    <!--galerry -->
                                                                    @forelse($product -> gallery as $imageGallery)
                                                                        
                                                                        <div class="galimg-item">
                                                                            <img src="{{asset('uploads/'.$product->id.'/'.$imageGallery -> image)}}" alt="{{$imageGallery -> image}}">
                                                                        </div>
                                                                    @empty
                                                                        <p> Chưa có gallery </p>
                                                                    @endforelse
                                                                    <!-- end gallery -->
                                                                    
                                                                    
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p>Sản phẩm đang cập nhật</p>
                                                @endforelse
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
    </div>
</div>