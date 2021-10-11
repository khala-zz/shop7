<header id="top" class="header clearfix">
    <div id="shopify-section-theme-header" class="shopify-section">
        <div data-section-id="theme-header" data-section-type="header-section">
            <section class="top-header">
                <div class="top-header-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="top-header-inner">
                                <ul class="unstyled top-menu">
                                    <!-- Menu Top -->
                                    
                                    
                                    <!-- link dang nhap,dang ki -->
                                    @if(empty(Auth::check()))
                                      
                                    <li class="toolbar-customer log-out"><a href="{{ url('/front-login') }}"><span>/</span> Đăng nhập</a></li>
                                    <li class="toolbar-customer log-out"><a href="{{ url('/front-register') }}"><span>/</span> Đăng kí</a></li>

                                    @else
                                        <li class="toolbar-customer log-out"><a href="{{ url('/my-account') }}">Tài khoản</a></li>
                                          
                                        <li class="toolbar-customer log-out"><a href="{{ url('/front-logout') }}">Đăng xuất</a></li>
                                    @endif
                                    
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="main-header">
                <div class="main-header-wrapper">
                    <div class="container clearfix">
                        <div class="row">
                            <div class="main-header-inner">
                                <div class="nav-top">
                                    <div class="nav-logo">
                                        <a href="{{ url('/') }}"><img src="{{asset('images/logo.png')}}" alt="Khala shop" title="Khala shop"></a>
                                        <h1 style="display:none"><a href="{{ url('/') }}">Khala shop</a></h1>
                                    </div>
                                    <div class="group-search-cart">
                                        <div class="nav-search">
                                            <form class="search" action="{{route('search.product')}}" method="get">
                                                @csrf
                                                <input type="text" name="search_product" class="search_box" placeholder="Từ khóa ..." value="{{old('search_product')}}">
                                                <div class="collections-selector">
                                                    <select class="single-option-selector" data-option="collection-option" id="collection-option" name="poscats">
                                                        <option value="">Chọn danh mục</option>
                                                        {!! $htmlOption !!}
                                                    </select>
                                                </div>
                                                <button class="search_submit" type="submit">
                                                    <svg aria-hidden="true" role="presentation" class="icon icon-search" viewBox="0 0 37 40"><path d="M35.6 36l-9.8-9.8c4.1-5.4 3.6-13.2-1.3-18.1-5.4-5.4-14.2-5.4-19.7 0-5.4 5.4-5.4 14.2 0 19.7 2.6 2.6 6.1 4.1 9.8 4.1 3 0 5.9-1 8.3-2.8l9.8 9.8c.4.4.9.6 1.4.6s1-.2 1.4-.6c.9-.9.9-2.1.1-2.9zm-20.9-8.2c-2.6 0-5.1-1-7-2.9-3.9-3.9-3.9-10.1 0-14C9.6 9 12.2 8 14.7 8s5.1 1 7 2.9c3.9 3.9 3.9 10.1 0 14-1.9 1.9-4.4 2.9-7 2.9z"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="nav-cart " id="cart-target">
                                            <div class="cart-info-group">
                                                <a href="{{ url('cart') }}" class="cart dropdown-toggle dropdown-link" data-toggle="dropdown">
                                                    <i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
                                                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
                                                    <div class="num-items-in-cart">
                                                        <div class="items-cart-left">
                                                            <img class="cart_img" src="{{asset('images/bg-cart.png')}}" alt="Image Cart" title="Image Cart">
                                                            <span class="cart_text icon"><span class="number">{{count(getProductCart())}}</span></span>       
                                                        </div>
                                                        <div class="items-cart-right">
                                                            <span class="title_cart">Giỏ hàng</span>        
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- hien thi san pham trong gio hang -->
                                                @if(count(getProductCart()) > 0) 
                                                    <div class="dropdown-menu cart-info" style="display: none;">
                                                        <div class="cart-content">
                                                            <div class="items control-container">
                                                                <!-- liet ke san pham trong gio hang -->
                                                                @foreach(getProductCart() as $item)
                                                                    <div class="row">
                                                                        <a class="cart-close" title="Remove" href="{{url('/cart/delete-product/'.$item -> id)}}">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                        <div class="cart-left">
                                                                            <a class="cart-image" href="product.html">
                                                                                <img src="{{ asset('uploads/products-daidien/'.$item -> image) }}" alt="{{$item -> product_name}}" title="{{$item -> product_name}}">
                                                                            </a>
                                                                        </div>
                                                                        <div class="cart-right">
                                                                            <div class="cart-title"><a href="{{ url('san-pham/'.slugify($item -> product_name,'-').'/'.$item -> product_id) }}">{{$item -> product_name}}</a></div>
                                                                            <div class="cart-price"><span class="money" >{{formatMoney($item -> price)}}</span><span class="x"> x{{$item -> quantity}}</span></div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="subtotal"><span>Tổng:</span><span class="cart-total-right money" >{{formatMoney(getTotalCart())}}</span></div>
                                                            <div class="action"><button class="btn" onclick="window.location='{{ url('cart') }}'">Giỏ hàng<i class="fa fa-caret-right"></i></button>
                                                                <button class="btn float-right" onclick="window.location='{{ url('checkout') }}'">Thanh toán<i class="fa fa-caret-right"></i></button></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-navigation">
                                    <button id="showLeftPush" class="visible-xs"><i class="fa fa-bars fa-2x"></i></button>
                                    <div class="nav-logo visible-xs">
                                        <div><a href="{{ url('/') }}"><img src="{{asset('images/logo.png')}}" alt="Khala shop" title="Khala shop"></a></div>
                                    </div>
                                    <div class="icon_cart visible-xs">
                                        <div class="cart-info-group">
                                            <a href="{{ url('cart') }}" class="cart dropdown-toggle dropdown-link">
                                                <i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
                                                <i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
                                                <div class="num-items-in-cart">
                                                    <div class="items-cart-left">
                                                        <img class="cart_img" src="{{asset('images/bg-cart.png')}}" alt="Image Cart" title="Image Cart">
                                                        <span class="cart_text icon"><span class="number">{{count(getProductCart())}}</span></span>       
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="nav-search visible-xs">
                                        
                                        <form class="search" action="{{route('search.product')}}" method="get">
                                            @csrf
                                            <input type="text" name="search_product" class="search_box" placeholder="Từ khóa ..." value="{{old('search_product')}}">
                                            <button class="search_submit" type="submit">
                                                <svg aria-hidden="true" role="presentation" class="icon icon-search" viewBox="0 0 37 40"><path d="M35.6 36l-9.8-9.8c4.1-5.4 3.6-13.2-1.3-18.1-5.4-5.4-14.2-5.4-19.7 0-5.4 5.4-5.4 14.2 0 19.7 2.6 2.6 6.1 4.1 9.8 4.1 3 0 5.9-1 8.3-2.8l9.8 9.8c.4.4.9.6 1.4.6s1-.2 1.4-.6c.9-.9.9-2.1.1-2.9zm-20.9-8.2c-2.6 0-5.1-1-7-2.9-3.9-3.9-3.9-10.1 0-14C9.6 9 12.2 8 14.7 8s5.1 1 7 2.9c3.9 3.9 3.9 10.1 0 14-1.9 1.9-4.4 2.9-7 2.9z"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="mobile-navigation-inner">
                                        <div class="mobile-navigation-content">
                                            <div class="mobile-top-navigation visible-xs">
                                                <div class="mobile-content-top">
                                                    
                                                    <div class="mobile-top-account">
                                                        <div class="is-mobile-login">
                                                            <ul class="customer">
                                                                <!-- link dang nhap,dang ki -->
                                                                @if(empty(Auth::check()))
                                                                  
                                                                    <li class="log-out">
                                                                        <a href="{{ url('/front-login') }}"><i class="fa fa-user" aria-hidden="true"></i><span>Đăng nhập</span> </a>
                                                                    </li>
                                                                    <li class="account">
                                                                        <a href="{{ url('/front-register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i><span>Đăng kí</span> </a></li>
                                                                    <li class="is-mobile-cart">
                                                                        <a href="{{ url('cart') }}">
                                                                            <div class="num-items-in-cart">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                                <span>Giỏ hàng</span>
                                                                                <div class="ajax-subtotal" style="display:none;"></div>
                                                                            </div>
                                                                        </a>
                                                                    </li>

                                                                @else
                                                                    <li class="log-out">
                                                                        <a href="{{ url('/my-account') }}"><i class="fa fa-user" aria-hidden="true"></i><span>Tài khoản</span> </a>
                                                                    </li>
                                                                    <li class="account">
                                                                        <a href="{{ url('/front-logout') }}"><i class="fa fa-user-plus" aria-hidden="true"></i><span>Đăng xuất</span> </a></li>
                                                                    <li class="is-mobile-cart">
                                                                        <a href="{{ url('cart') }}">
                                                                            <div class="num-items-in-cart">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                                <span>Giỏ hàng</span>
                                                                                <div class="ajax-subtotal" style="display:none;"></div>
                                                                            </div>
                                                                        </a>
                                                                    </li>

                                                                    
                                                                @endif                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nav-menu visible-xs leftnavi" id="is-mobile-nav-menu">
                                                <div class="is-mobile-menu-content">
                                                    <div class="mobile-content-link">
                                                        <ul class="nav navbar-nav hoverMenuWrapper">
                                                            <li class="nav-item active">
                                                                <a href="{{ url('/') }}">
                                                                    Trang chủ
                                                                </a>
                                                            </li>
                                                            
                                                            <li class="nav-item">
                                                                <a href="{{ url('cua-hang') }}">
                                                                    Cửa hàng
                                                                </a>
                                                            </li>
                                                            <li class="nav-item  navigation_mobile">
                                                                <a href="about-us.html" class="menu-mobile-link">
                                                                    Danh mục sản phẩm
                                                                </a>
                                                                <a href="javascript:void(0)" class="arrow">
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <div class="menu-mobile-container" style="display: none;">
                                                                    <ul class="sub-mega-menu">
                                                                        <li class="mega1-collumn1">
                                                                            <ul>
                                                                               
                                                                                {{-- Danh mục sản phẩm --}}
                                                                                @foreach($categories_share as $index => $item)
                                                                                    @if($item -> parent == null) 
                                                                                        @if(count($item -> children))
                                                                                            <li class="list-unstyled li-sub-mega">
                                                                                            <a href="{{ url('danh-muc-san-pham/'.slugify($item -> title,'-').'/'.$item -> id) }}" class="menu-mobile-link">
                                                                                                  {{$item->title}}
                                                                                            </a>
                                                                                            
                                                                                            <div class="menu-mobile-container" style="display: none;">
                                                                                                <ul class="sub-mega-menu">
                                                                                                    <li class="mega1-collumn1">
                                                                                                        <ul>         
                                                                                                            @include('frontend.home.mobile_menu_category',['childs' => $item -> children])
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                                    
                                                                                            
                                                                                               
                                                                                        @else
                                                                                            <li class="list-unstyled li-sub-mega">     
                                                                                            <a href="{{ url('danh-muc-san-pham/'.slugify($item -> title,'-').'/'.$item -> id) }}">
                                                                                                {{$item->title}} 
                                                                                            </a>
                                                                                                
                                                                                           
                                                                                        @endif    
                                                                                           
                                                                                        </li>        
                                                                                    @endif    
                                                                                @endforeach
                                                                
                                                                        
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li> 
                                                             <li class="nav-item">
                                                                <a href="{{ url('tin-tuc') }}">
                                                                    Tin tức
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a href="{{ url('tin-tuc/giới-thiệu/5') }}">
                                                                    Giới thiệu
                                                                </a>
                                                            </li>
                                                           
                                                             <li class="nav-item">
                                                                <a href="{{ url('lien-he') }}">
                                                                    Liên hệ
                                                                </a>
                                                            </li>
                                                        </ul>
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
            <section class="navigation-header">
                <div class="navigation-header-wrapper">
                    <div class="container clearfix">
                        <div class="row">
                            <div class="main-navigation-inner">
                                <div class="navigation_area">
                                    <div class="navigation_left">
                                        <div class="group_navbtn">
                                            <a href="collections.html" class="dropdown-toggle" data-toggle="dropdown">                     
                                                <span class="dropdown-toggle">
                                                  Danh mục sản phẩm
                                                </span>
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                            </a>
                                            <ul class="navigation_links_left dropdown-menu" style="display: none;">
                                                <!-- category share dung vies share trong app service provider -->

                                                @foreach($categories_share as $index => $item)
                                                    @if($item -> parent == null) 
                                                        @if(count($item -> children))
                                                            <li class="nav-item dropdown navigation _icon">
                                                                <a href="{{ route('category.product',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
                                                                    <span>{{$item->title}}</span>
                                                                    <i class="fa fa-angle-down"></i>
                                                                    <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                                                                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                                                                </a>
                                                                <ul class="dropdown-menu" style="display: none;">
                                                                    @include('frontend.home.menu_category',['childs' => $item -> children])
                                                                </ul>
                                                        @else
                                                            <li class="nav-item _icon">
                                                            <a href="{{ route('category.product',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}">
                                                                <span>{{$item->title}}</span>
                                                            </a>     
                                                            
                                                           
                                                        @endif    
                                                           
                                                            </li>    
                                                    @endif    
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="navigation_right">
                                        <ul class="navigation_links">
                                            <li class="nav-item active">
                                                <a href="{{ url('/') }}">
                                                    <span>Trang chủ</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('cua-hang') }}">
                                                    <span>Cửa hàng</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('tin-tuc') }}">
                                                    <span>Tin tức</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('tin-tuc/giới-thiệu/5') }}">
                                                    <span>Giới thiệu</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ url('lien-he') }}">
                                                    <span>Liên hệ</span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="navigation_icon">
                                        <div class="navigation_icon_group">
                                            <div class="icon_cart">
                                                <div class="cart-info-group">
                                                    <a href="cart.html" class="cart dropdown-toggle dropdown-link" data-toggle="dropdown">
                                                        <i class="sub-dropdown1 visible-sm visible-md visible-lg"></i>
                                                        <i class="sub-dropdown visible-sm visible-md visible-lg"></i> 
                                                        <div class="num-items-in-cart">
                                                            <div class="items-cart-left">
                                                                <img class="cart_img" src="{{asset('images/bg-cart.png')}}" alt="Image Cart" title="Image Cart">
                                                                <span class="cart_text icon"><span class="number">{{count(getProductCart())}}</span></span> 


                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!-- hien thi san pham trong gio hang -->
                                                    @if(count(getProductCart()) > 0) 
                                                        <div class="dropdown-menu cart-info">
                                                            <div class="cart-content">
                                                                <div class="items control-container">
                                                                    <!-- liet ke san pham trong gio hang -->
                                                                    @foreach(getProductCart() as $item)
                                                                        <div class="row">
                                                                            <a class="cart-close" title="Remove" href="{{url('/cart/delete-product/'.$item -> id)}}">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                            <div class="cart-left">
                                                                                <a class="cart-image" href="product.html">
                                                                                    <img src="{{ asset('uploads/products-daidien/'.$item -> image) }}" alt="{{$item -> product_name}}" title="{{$item -> product_name}}">
                                                                                </a>
                                                                            </div>
                                                                            <div class="cart-right">
                                                                                <div class="cart-title"><a href="{{ url('san-pham/'.slugify($item -> product_name,'-').'/'.$item -> product_id) }}">{{$item -> product_name}}</a></div>
                                                                                <div class="cart-price"><span class="money" >{{formatMoney($item -> price)}}</span><span class="x"> x{{$item -> quantity}}</span></div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="subtotal"><span>Tổng:</span><span class="cart-total-right money" >{{formatMoney(getTotalCart())}}</span></div>
                                                                <div class="action"><button class="btn" onclick="window.location='{{ url('cart') }}'">Giỏ hàng<i class="fa fa-caret-right"></i></button>
                                                                    <button class="btn float-right" onclick="window.location='{{ url('checkout') }}'">Thanh toán<i class="fa fa-caret-right"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    
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
        <script>
            function addaffix(scr) {
                if ($(window).innerWidth() >= 992) {
                    if (scr > 170) {
                        if (!$('#top').hasClass('affix')) {
                            $('#top').addClass('affix').addClass('fadeInDown animated');
                        }
                    } else {
                        if ($('#top').hasClass('affix')) {
                            $('#top').prev().remove();
                            $('#top').removeClass('affix').removeClass('fadeInDown animated');
                        }
                    }
                } else $('#top').removeClass('affix');
            }
            $(window).scroll(function() {
                var scrollTop = $(this).scrollTop();
                addaffix(scrollTop);
            });
            $(window).resize(function() {
                var scrollTop = $(this).scrollTop();
                addaffix(scrollTop);
            });
        </script>
    </div>
</header>
<div class="fix-sticky"></div>