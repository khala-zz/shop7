<div class="collection-mainarea col-sm-9 clearfix">
      
    <div class="collection_toolbar">
        <div class="toolbar_left">
            Hiển thị {{ $products->firstItem() }} đến {{ $products->lastItem() }}
            của tổng {{$products->total()}} sản phẩm
        </div>
        <div class="toolbar_right">
            <div class="group_toolbar">
                <!-- View as -->
                <div class="grid_list">
                    <span class="toolbar_title"><a href="{{url('cua-hang')}}" style="color:#ef1e1e;">Bỏ lọc</a></span>
                    
                </div>
                <!-- Sort by -->
                <div class="sortBy">
                    
                    <span class="toolbar_title">Sắp xếp:</span>
                    <form method ="get" action="{{url('cua-hang')}}">   
                        <select name="orderby"  class="toolbar_title" onchange="this.form.submit()">
                                
                            <option  value="title_tang" {{Request::get('orderby') == 'title_tang'?'selected':''}}>A đến Z</option>
                            <option  value="title_giam" {{Request::get('orderby') == 'title_giam'?'selected':''}}> Z đến A</option>
                            <option  value="price_tang" {{Request::get('orderby') == 'price_tang'?'selected':''}}>Giá thấp đến cao</option>
                            <option  value="price_giam" {{Request::get('orderby') == 'price_giam'?'selected':''}}> Giá cao đến thấp</option>
                            <option value="created_at_latest" {{Request::get('orderby') == 'created_at_latest'?'selected':''}}>Mới nhất</option>
                            <option value="created_at_oldest" {{Request::get('orderby') == 'created_at_oldest'?'selected':''}}>Cũ nhất</option>                                    
                        </select>
                        <!-- gan filter theo nhan hieu và tổng sản phẩm hiện theo trang -->
                        <input type="hidden" name="count" value="{{Request::get('count')?Request::get('count') : 12}}">
                        <input type="hidden" name="brand_filter" value="{{Request::get('brand_filter')?Request::get('brand_filter') : 0}}">
                        <input type="hidden" name="price" value="{{Request::get('price')?Request::get('price') : 0}}">
                        <input type="hidden" name="category_id" value="{{Request::get('category_id')?Request::get('category_id') : 0}}">
                        <!-- end gan filter theo nhan hieu và tổng sản phẩm hiện theo trang -->             
                    
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
