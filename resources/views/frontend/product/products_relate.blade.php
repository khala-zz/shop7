<div class="collection-colpro-content">
    <span class="colpro_title">Sản phẩm cùng danh mục</span>
    <div class="colpro_content colpro_1_index-collection-product">
        @forelse($products_related as $product)
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
            <p>Đang cập nhật</p>
        @endforelse
    </div>
</div>