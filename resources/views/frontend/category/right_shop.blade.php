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
                    <span class="toolbar_title"><a href="#" onclick="location.href='{{url()->current()}}';" style="color:#ef1e1e;">Bỏ lọc</a></span>
                    
                </div>
                <!-- Sort by -->
                <div class="sortBy">
                    
                    <span class="toolbar_title">Sắp xếp:</span>
                    <form method ="get" action="{{url()->current()}}">   
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
                        {{-- <input type="hidden" name="category_id" value="{{Request::get('category_id')?Request::get('category_id') : 0}}"> --}}
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
                                                  
                                                    <button class="btn select-option btn-add-cart" type="button" value = "{{$product -> id.'khala'.$product -> product_code . 'khala'.$product -> title.'khala'.$product_price}}" url="{{url('add-cart')}}"><i class="fa fa-bars fa-khala"></i></button>
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
                                <div class="product-title"><a class="title-5" href="{{url('/danh-muc-san-pham/'.slugify($product -> category -> title,'-').'/'.$product -> category -> id)}}">{{$product -> title}}</a></div>
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

{{-- <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
    <!-- Shop Top Area Start -->
    <div class="shop-top-bar">
        <!-- Left Side start -->
        <div class="shop-tab nav mb-res-sm-15">
            
            <a href="#" onclick="location.href='{{url()->current()}}';" style="color:#ef1e1e;">Bỏ lọc</a>
            <p>Có {{$products_count -> count()}} sản phẩm  </p>
            @if(Request::get('price'))
            <p>Giá từ <b style="color: red;">{{ Request::get('price')}}</b></p>
            @endif
        </div>
        <!-- Left Side End -->
        <!-- Right Side Start -->
        <div class="select-shoing-wrap">
            <div class="shot-product">
                <p>Sắp xếp:</p>
            </div>
            <div class="shop-select">
                <form method ="get" action="{{url()->current()}}">
                    <select name="orderby" class="form-control" onchange="this.form.submit()">
                        <option value="created_at" {{Request::get('orderby') == 'created_at'?'selected':''}}>Mới nhất</option>
                        <option  value="title_tang" {{Request::get('orderby') == 'title_tang'?'selected':''}}>A đến Z</option>
                        <option  value="title_giam" {{Request::get('orderby') == 'title_giam'?'selected':''}}> Z đến A</option>
                        
                    </select>
                    <!-- gan filter theo nhan hieu và tổng sản phẩm hiện theo trang -->
                    <input type="hidden" name="count" value="{{Request::get('count')?Request::get('count') : 12}}">
                    <input type="hidden" name="brand_filter" value="{{Request::get('brand_filter')?Request::get('brand_filter') : 0}}">
                    <input type="hidden" name="price" value="{{Request::get('price')?Request::get('price') : 0}}">
                    
                    <!-- end gan filter theo nhan hieu và tổng sản phẩm hiện theo trang -->
                </form>
            </div>
        </div>
        <!-- Right Side End -->
    </div>
    <!-- Shop Top Area End -->

    <!-- Shop Bottom Area Start -->
    <div class="shop-bottom-area mt-35">
        <!-- Shop Tab Content Start -->
        <div class="tab-content jump">
            <!-- Tab One Start -->
            <div id="shop-1" class="tab-pane active">
                <div class="row">
                    @forelse($products as $product)
                    <!-- kiem tra xem product co giam gia hay khong? -->
                    @if(!empty($product -> discount))
                    @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                    @else
                    @php $product_price = $product -> price; @endphp
                    @endif
                    <!-- end kiem tra xem product co giam gia hay khong? -->
                    <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6 col-xs-12">
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{url('/san-pham/'.slugify($product -> title,'-').'/'.$product -> id)}}" class="thumbnail">
                                    <img class="first-img" src="{{asset('uploads/products-daidien/'.$product -> image)}}" alt="{{$product -> title}}" />
                                    
                                </a>
                                <div class="quick-view">
                                    <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                        <i class="ion-ios-search-strong"></i>
                                    </a>
                                </div>
                            </div>
                            @if(!empty($product -> new))
                            <ul class="product-flag">
                                <li class="new">Mới</li>
                            </ul>
                            @endif
                            <div class="product-decs">
                                <a class="inner-link" href="{{url('/danh-muc-san-pham/'.slugify($product -> category -> title,'-').'/'.$product -> category -> id)}}"><span>{{$product -> category -> title}}</span></a>
                                <h2><a href="{{url('/san-pham/'.slugify($product -> title,'-').'/'.$product -> id)}}" class="product-link">{{$product -> title}}</a></h2>
                                <div class="padding-left-start-khala">
                                    <!-- hien thi rating -->
                                    <?php 
                                    $avg_rating = 0;
                                    if($product -> pro_total_rating){
                                                                        // tru 1 vi de mac dinh cac cot do la 1 de khong che up len heroku khi de mac dinh la 0
                                        $total_number = $product -> pro_total_number - 1;
                                        $total_rating = $product -> pro_total_rating - 1 ;
                                        if($total_number <> 0 && $total_rating <> 0){
                                           $avg_rating = round($total_number/$total_rating,2);
                                       }
                                       
                                   }
                                   
                                   ?>

                                   <span class="rating-stars selected" >
                                    @for($i = 1; $i <= 5; $i++)
                                    <a class="star-{{$i}} {{$i <= $avg_rating ? 'active':''}} ">{{$i}}</a>
                                    @endfor
                                    
                                </span>
                                <!-- end hien thi rating -->
                            </div>
                            <div class="pricing-meta">
                                <ul>
                                 <!-- hien thi gia -->
                                 @if(!empty($product -> discount))
                                 
                                 <li class="old-price">{{formatMoney($product -> price)}}</li>
                                 <li class="current-price">{{formatMoney($product -> price * (100 - $product -> discount)/100) }}</li>
                                 
                                 <li class="discount-price">-{{$product -> discount}}%</li>
                                 @else
                                 
                                 <li class="old-price not-cut">{{formatMoney($product -> price)}}</li>
                                 
                                 @endif
                                 <!-- end hien thi gia -->
                             </ul>


                         </div>
                     </div>
                     <div class="add-to-link">
                        <ul>
                            <li class="cart"><a class="cart-btn btn-add-cart" href="{{url('add-cart')}}" value = "{{$product -> id.'khala'.$product -> product_code.'khala'.$product -> title.'khala'.$product_price}}">THÊM VÀO GIỎ HÀNG </a></li>
                            
                        </ul>
                    </div>
                </article>
            </div>
            @empty
            <p>Chưa có sản phẩm</p>
            @endforelse
            
        </div>
    </div>
    <!-- Tab One End -->
    
</div>
<!-- Shop Tab Content End -->
<!--  Pagination Area Start -->
<div class="text-center">
    {!! $products -> links() !!}
</div>
<!--  Pagination Area End -->
</div>
<!-- Shop Bottom Area End -->
</div> --}}