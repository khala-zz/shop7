 <div class="sidebar-block blogs-bestseller">
        <h3 class="sidebar-title"><span>Bán chạy</span></h3>
        <div class="sidebar-content bestseller-content">
            <div class="bestseller-item-inner">
                @foreach(getBestSeller() as $product)
                    <div class="bestseller-item">
                        <div class="row-container ">
                            <div class="product home_product">
                                <div class="row-left">
                                    <a href="{{url('/san-pham/'.slugify($product  -> title,'-').'/'.$product ->  id)}}" class="container_item">
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
                            </div>
                        </div>
                    </div>
                @endforeach
               
            </div>
        </div>
    </div>
