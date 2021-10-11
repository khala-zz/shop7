<div class="col-sm-3 sidebar">
    {{-- tin gan day --}}
    <div class="sidebar-block blogs-recent">
        <h3 class="sidebar-title"><span>Tin gần đây</span></h3>
        <div class="sidebar-content recent-article">
            <div class="ra-item-inner">
                @forelse($news_right as $item )
                    <div class="article clearfix">
                        <div class="article-image">
                            <a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}"><img src="{{ asset('uploads/news/'.$item -> image_name) }}" alt="{{$item -> title}}"></a>
                        </div>
                        <div class="articleinfo_group">
                            <div class="article-title">
                                <h2 class="article-name"><a href="article.html">{{$item -> title}}</a></h2>
                            </div>
                            <ul class="article-info list-inline">
                                <li class="article-date">{{ $item -> created_at }}</li>
                            </ul>
                        </div>
                    </div>
                @empty
                    <p>Tin tức đang cập nhật</p>
                @endforelse
               
                
            </div>
        </div>
    </div>
    {{-- end tin gan day --}}
    {{-- danh muc tin tuc --}}
    <div class="sidebar-block blog-category">
        <h3 class="sidebar-title"><span>Danh mục</span></h3>
        <div class="sidebar-content">
            <ul class="category">
                @foreach($cat_news as $item)

                    @if( $item -> parent == null)
                        <li class="nav-item">
                            <a href="{{ route('cat_news.news',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}" class="{{Request::segment(3) == $item-> id ? 'active-khala' : " "}}">{{$item->title}}</a>
                            @if(count($item->children))

                            @include('frontend.news.menusub',['childs' => $item -> children])
                            @endif

                        </li>
                    @endif
                @endforeach()
                
            </ul>
        </div>
    </div>
    {{-- end danh muc tin tuc --}}
    {{-- san pham ban chay --}}
    {{-- <div class="sidebar-block blogs-bestseller">
        <h3 class="sidebar-title"><span>Best Seller</span></h3>
        <div class="sidebar-content bestseller-content">
            <div class="bestseller-item-inner">
                <div class="bestseller-item">
                    <div class="row-container ">
                        <div class="product home_product">
                            <div class="row-left">
                                <a href="product.html" class="container_item">
                                    <div class="hoverBorderWrapper">
                                        <img src="assets/images/digital_02.jpg" class="not-rotation img-responsive front" alt="Digital equipment">
                                        <div class="mask"></div>
                                        <img src="assets/images/digital_03.jpg" class="rotation img-responsive" alt="Digital equipment">
                                    </div>
                                </a>
                                <span class="sale_banner">
                                    <span class="sale_text">-33.33%</span>
                                </span>
                            </div>
                            <div class="row-right">
                                <div class="product-title"><a class="title-5" href="product.html">Digital equipment</a></div>
                                <div class="rating-star">
                                    <span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span class="price_sale"><span class="money" data-currency-usd="$200.00">$200.00</span></span>
                                    <del class="price_compare"> <span class="money" data-currency-usd="$300.00">$300.00</span></del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bestseller-item">
                    <div class="row-container ">
                        <div class="product home_product">
                            <div class="row-left">
                                <a href="product.html" class="container_item">
                                    <div class="hoverBorderWrapper">
                                        <img src="assets/images/fashions_01.jpg" class="not-rotation img-responsive front" alt="Digital equipment">
                                        <div class="mask"></div>
                                        <img src="assets/images/fashions_02.jpg" class="rotation img-responsive" alt="Digital equipment">
                                    </div>
                                </a>
                                <span class="sale_banner">
                                    <span class="sale_text">-33.33%</span>
                                </span>
                            </div>
                            <div class="row-right">
                                <div class="product-title"><a class="title-5" href="product.html">Women's Accessories</a></div>
                                <div class="rating-star">
                                    <span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span class="price_sale"><span class="money" data-currency-usd="$200.00">$200.00</span></span>
                                    <del class="price_compare"> <span class="money" data-currency-usd="$300.00">$300.00</span></del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bestseller-item">
                    <div class="row-container ">
                        <div class="product home_product">
                            <div class="row-left">
                                <a href="product.html" class="container_item">
                                    <div class="hoverBorderWrapper">
                                        <img src="assets/images/fashions_05.jpg" class="not-rotation img-responsive front" alt="Digital equipment">
                                        <div class="mask"></div>
                                        <img src="assets/images/fashions_09.jpg" class="rotation img-responsive" alt="Digital equipment">
                                    </div>
                                </a>
                                <span class="sale_banner">
                                    <span class="sale_text">-33.33%</span>
                                </span>
                            </div>
                            <div class="row-right">
                                <div class="product-title"><a class="title-5" href="product.html">Women's Accessories</a></div>
                                <div class="rating-star">
                                    <span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span class="price_sale"><span class="money" data-currency-usd="$200.00">$200.00</span></span>
                                    <del class="price_compare"> <span class="money" data-currency-usd="$300.00">$300.00</span></del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bestseller-item">
                    <div class="row-container ">
                        <div class="product home_product">
                            <div class="row-left">
                                <a href="product.html" class="container_item">
                                    <div class="hoverBorderWrapper">
                                        <img src="assets/images/furniture_01.jpg" class="not-rotation img-responsive front" alt="Digital equipment">
                                        <div class="mask"></div>
                                        <img src="assets/images/furniture_03.jpg" class="rotation img-responsive" alt="Digital equipment">
                                    </div>
                                </a>
                                <span class="sale_banner">
                                    <span class="sale_text">-33.33%</span>
                                </span>
                            </div>
                            <div class="row-right">
                                <div class="product-title"><a class="title-5" href="product.html">Office furniture</a></div>
                                <div class="rating-star">
                                    <span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span class="price_sale"><span class="money" data-currency-usd="$200.00">$200.00</span></span>
                                    <del class="price_compare"> <span class="money" data-currency-usd="$300.00">$300.00</span></del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bestseller-item">
                    <div class="row-container ">
                        <div class="product home_product">
                            <div class="row-left">
                                <a href="product.html" class="container_item">
                                    <div class="hoverBorderWrapper">
                                        <img src="assets/images/trending_03.jpg" class="not-rotation img-responsive front" alt="Digital equipment">
                                        <div class="mask"></div>
                                        <img src="assets/images/trending_05.jpg" class="rotation img-responsive" alt="Digital equipment">
                                    </div>
                                </a>
                                <span class="sale_banner">
                                    <span class="sale_text">-33.33%</span>
                                </span>
                            </div>
                            <div class="row-right">
                                <div class="product-title"><a class="title-5" href="product.html">Today's trending</a></div>
                                <div class="rating-star">
                                    <span class="spr-badge" data-rating="5.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i><i class="spr-icon spr-icon-star" style=""></i></span><span class="spr-badge-caption">1 review</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span class="price_sale"><span class="money" data-currency-usd="$200.00">$200.00</span></span>
                                    <del class="price_compare"> <span class="money" data-currency-usd="$300.00">$300.00</span></del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- end san pham ban chay --}}
    {{-- tags --}}
    
    <div class="sidebar-block blog-tags clearfix">
        <h3 class="sidebar-title"><span>Tags</span></h3>
        <div class="sidebar-content">
            <ul class="tags-inner tags">
                {{-- <li class="active"><a href="blog.html">All</a></li> --}}
                @foreach($tags as $tag)
                    <li >
                    <a class="{{Request::segment(3) == $tag-> id ? 'active-khala' : " "}}" href="{{route('list.news.tags',['slug' => slugify($tag -> name,'-'),'id' => $tag -> id])}}" >{{$tag -> name}}</a>
                    </li>
                @endforeach
                
            </ul>
        </div>
    </div>
    {{-- end tags --}}
</div>