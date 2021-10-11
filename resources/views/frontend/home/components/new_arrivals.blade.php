<div class="col-sm-6 procol_column">
  <div class="group-procol">
      <div class="group-inner">
          <div class="page-title">
              <img src="{{asset('images/home1_icon-new.png')}}" alt="Sản phẩm mới về">
              <h2>Sản phẩm mới về</h2>
          </div>
          <div class="column_content style_2">
              {{-- get 3 san pham --}}
              <div class="column_item">
                  <div class="row-container ">
                      @forelse($products_arrivals_3 as $index => $product)

                                      <div class="column_product">
                                          <div class="product home_product">
                                              <div class="row-left">
                                                  <a href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}" class="container_item">
                                                      <div class="hoverBorderWrapper">
                                                          <img src="{{asset('uploads/products-daidien/'.$product -> image)}}" class="img-responsive front" alt="{{$product -> title}}">
                                                          
                                                      </div>
                                                  </a>
                                                
                                                  @if(!empty($product -> discount))
                                                      <span class="sale_banner">
                                                        <span class="sale_text">-{{$product -> discount}}%</span>
                                                      </span>
                                                  @endif
                                              </div>
                                              <div class="row-right">
                                                  <div class="product-title"><a class="title-5" href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}">{{$product -> title}}</a></div>
                                                  <div class="rating-star">
                                                      <span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
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
                                          </div>
                                      </div>
                      @empty
                          <p>Sản phẩm đang cập nhật</p>
                      @endforelse
                  </div>
              </div>
             {{--  get 2 san pham con lai --}}
             <div class="column_item">
             @forelse($products_arrivals_2  as $index => $product)
                  <!-- kiem tra xem product co giam gia hay khong? -->
                  @if(!empty($product -> discount))
                  @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                  @else
                  @php $product_price = $product -> price; @endphp
                  @endif
                  <!-- end kiem tra xem product co giam gia hay khong? -->
                  @if($index == 3)    
                  <div class="column_product ">
                      <div class="row-container ">
                          <div class="product home_product">
                              <div class="row-left">
                                  <a href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}" class="container_item">
                                      <div class="hoverBorderWrapper">
                                          <img src="{{asset('uploads/products-daidien/'.$product -> image)}}" class="img-responsive front" alt="{{ $product -> title}}">
                                          
                                      </div>
                                  </a>
                                  @if(!empty($product -> discount))
                                      <span class="sale_banner">
                                        <span class="sale_text">-{{$product -> discount}}%</span>
                                      </span>
                                  @endif
                              </div>
                              <div class="row-right">
                                  <div class="product-title"><a class="title-5" href="{{ url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id) }}">{{ $product -> title}}</a></div>
                                  <div class="rating-star">
                                      <span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
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
                          </div>
                      </div>
                  </div>
                  @else
                  <div class="column_product product_full">
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
                                                          <div data-handle="neque-porro-quisquam-est-qui-dolor-ipsum-quia-11" data-target="#quick-shop-modal" class="quick_shop" data-toggle="modal">
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
                              <div class="rating-star">
                                  <span class="spr-badge" data-rating="0.0"><span class="spr-starrating spr-badge-starrating"><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i><i class="spr-icon spr-icon-star-empty" style=""></i></span><span class="spr-badge-caption">No reviews</span>
                                  </span>
                              </div>
                              <div class="product-price">
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
                  </div>
                  @endif
                      
             @empty
                  <p>Sản phẩm đang cập nhật</p>
              @endforelse
              </div>
          </div>
      </div>
  </div>
</div>