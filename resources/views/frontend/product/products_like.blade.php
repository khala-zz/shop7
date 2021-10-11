 <section class="recent-add-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Section Title -->
                            <div class="section-title">
                                <h2>Có thể bạn thích</h2>
                                <p>Có {{$products_like -> count()}} sản phẩm:</p>
                            </div>
                            <!-- Section Title -->
                        </div>
                    </div>
                    <!-- Recent Product slider Start -->
                    <div class="recent-product-slider owl-carousel owl-nav-style">
                        <!-- Single Item -->
                        @forelse($products_like as $product)
                            <!-- kiem tra xem product co giam gia hay khong? -->
                            @if(!empty($product -> discount))
                                @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                            @else
                                @php $product_price = $product -> price; @endphp
                            @endif
                            <!-- end kiem tra xem product co giam gia hay khong? -->
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="{{url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id)}}" class="thumbnail">
                                        <img class="first-img" src="{{asset('uploads/products-daidien/'.$product -> image)}}" alt="{{$product -> title}}" />
                                       
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal">
                                            <i class="ion-ios-search-strong"></i>
                                        </a>
                                    </div>
                                </div>
                                @if($product -> new)
                                    <ul class="product-flag">
                                        <li class="new">Mới</li>
                                    </ul>
                                @endif
                                <div class="product-decs">
                                    <a class="inner-link" href="{{url('danh-muc-san-pham/'.slugify($product -> category -> title,'-').'/'.$product -> category -> id)}}"><span>{{$product -> category -> title}}</span></a>
                                    <h2><a href="{{url('san-pham/'.slugify($product -> title,'-').'/'.$product -> id)}}" class="product-link">{{$product -> title}}</a></h2>
                                    <div class="rating-product padding-left-start-khala">
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
                                        <li class="cart">
                                            <a class="cart-btn btn-add-cart" href="{{url('add-cart')}}" value = "{{$product -> id.'khala'.$product -> product_code.'khala'.$product -> title.'khala'.$product_price}}">THÊM VÀO GIỎ HÀNG </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </article>
                        @empty
                            Chưa có sản phẩm liên quan
                        @endforelse
                        
                    </div>
                    <!-- Recent product slider end -->
                </div>
            </section>