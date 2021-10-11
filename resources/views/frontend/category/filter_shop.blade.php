<div class="collection-leftsidebar sidebar col-sm-3 clearfix">
    <div class="sidebar-block collection-block">
        <div class="sidebar-title">
            <span>Danh mục sản phẩm</span>
            <i class="fa fa-caret-down show_sidebar_content" aria-hidden="true"></i>
        </div>
        <div class="sidebar-content ">
            <!-- danh muc san pham -->
            <ul class="toggle-menu list-menu">
                @foreach($categories_share as $index => $item)
                    @if($item -> parent == null) 
                        @if(count($item -> children))
                            <li class="active toggle-content">
                                <a href="{{ url('danh-muc-san-pham/'.slugify($item -> title,'-').'/'.$item -> id) }}" class="{{Request::segment(3) == $item -> id?'active-khala':''}}">{{$item->title}}<span class="caret"></span></a>
                                <ul class="sub-menu level-{{$index + 1}}" style="display: none;">
                                    @include('frontend.category.menu_category',['childs' => $item -> children])
                                </ul>
                        @else
                                 
                            <li >
                                <a href="{{ url('danh-muc-san-pham/'.slugify($item -> title,'-').'/'.$item -> id) }}" class="{{Request::segment(3) == $item -> id?'active-khala':''}}">{{$item->title}}</a>
                           
                        @endif    
                           
                            </li>    
                    @endif    
                @endforeach
            </ul>
            <!-- end danh muc san pham -->  
            
        </div>
    </div>

    <div class="sidebar-block filter-block">
        <div class="sidebar-title">
            <span>Bộ lọc</span>
            <i class="fa fa-caret-down show_sidebar_content" aria-hidden="true"></i>
        </div>
        <div id="tags-filter-content" class="sidebar-content">
            <!-- filter tags group -->
            <div class="filter-tag-group">
                <div class="tag-group" id="coll-filter-1">
                    <p class="title">
                        <span class="filter-title">Giá</span>
                        <span class="show_filter_content">+</span>
                    </p>
                    
                    <!-- gia -->
                    <ul class="filter-content">
                        
                        <li>
                            @if(Request::get('brand_filter')  || (Request::get('brand_filter') && Request::get('price')) 
                            
                            )
                                <a href="{{url()->current().'?price=1000-500000&brand_filter='.Request::get('brand_filter')}}" class="{{Request::get('price') == '1000-500000'?'active-khala':''}}">
                                    0-500.000 đ
                                </a>
                            @else
                                <a href="{{url()->current().'?price=1000-500000'}}" class="{{Request::get('price') == '1000-500000'?'active-khala':''}}">
                                    0-500.000 đ
                                </a>
                            @endif

                        </li>
                        <li>
                            @if(Request::get('brand_filter')  
                            
                            || (Request::get('brand_filter') && Request::get('price')) 
                            
                            )
                                <a href="{{url()->current().'?price=500000-1000000&brand_filter='.Request::get('brand_filter')}}" class="{{Request::get('price') == '500000-1000000'?'active-khala':''}}">
                                    500.000 - 1.000.000 đ
                                </a>
                                @else
                                <a href="{{url()->current().'?price=500000-1000000'}}" class="{{Request::get('price') == '500000-1000000'?'active-khala':''}}">
                                    500.000 - 1.000.000 đ
                                </a>
                                @endif
                                
                        </li>
                        <li>
                                @if(Request::get('brand_filter')  
                            
                                || (Request::get('brand_filter') && Request::get('price')) 
                            
                                )
                                    <a href="{{url()->current().'?price=1000000-2000000&brand_filter='.Request::get('brand_filter')}}" class="{{Request::get('price') == '1000000-2000000'?'active-khala':''}}">
                                        1.000.000 - 2.000.000 đ
                                    </a>
                                    @else
                                    <a href="{{url()->current().'?price=1000000-2000000'}}" class="{{Request::get('price') == '1000000-2000000'?'active-khala':''}}">
                                        1.000.000 - 2.000.000 đ
                                    </a>
                                    @endif

                        </li>
                        <li>
                                    @if(Request::get('brand_filter')  
                            
                                    || (Request::get('brand_filter') && Request::get('price')) 
                                    
                                    )
                                        <a href="{{url()->current().'?price=2000000-4000000&brand_filter='.Request::get('brand_filter')}}" class="{{Request::get('price') == '2000000-4000000'?'active-khala':''}}">
                                            2.000.000 - 4.000.000 đ
                                        </a>
                                        @else
                                        <a href="{{url()->current().'?price=2000000-4000000'}}" class="{{Request::get('price') == '2000000-4000000'?'active-khala':''}}">
                                            2.000.000 - 4.000.000 đ
                                        </a>
                                        @endif
                                        
                        </li>
                        <li>
                                        @if(Request::get('brand_filter')  
                            
                                        || (Request::get('brand_filter') && Request::get('price')) 
                                        
                                        )
                                            <a href="{{url()->current().'?price=4000000-40000000&brand_filter='.Request::get('brand_filter')}}" class="{{Request::get('price') == '4000000-40000000'?'active-khala':''}}">
                                             Trên 4.000.000 đ
                                         </a>
                                         @else
                                         <a href="{{url()->current().'?price=4000000-40000000'}}" class="{{Request::get('price') == '4000000-40000000'?'active-khala':''}}">
                                             Trên 4.000.000 đ
                                         </a>
                                         @endif
                                         
                        </li>
                    </ul> 
                    
                </div>
                <div class="tag-group" id="coll-filter-2">
                    <p class="title">
                        <span class="filter-title">Nhãn hiệu</span>
                        <span class="show_filter_content">+</span>
                    </p>
                    <ul class="filter-content">
                        @foreach($brands_count as $brand)
                        <li >                                                           
                                @if(Request::get('price')  || (Request::get('brand_filter') && Request::get('price')) )
                                    <a href="{{url()->current().'?price='.Request::get('price').'&brand_filter='.$brand -> id}}" class="{{Request::get('brand_filter') == $brand -> id?'active-khala':''}}">
                                    {{ $brand -> title}}<span>({{ $brand -> products_count}})</span> 
                                    </a>
                                @else
                                    <a href="{{url()->current().'?brand_filter='.$brand -> id}}" class="{{Request::get('brand_filter') == $brand -> id?'active-khala':''}}">
                                    {{ $brand -> title}}<span>({{ $brand -> products_count}})</span> 
                                    </a>
                                @endif
                                
                            
                        </li>
                        @endforeach
                        
                        
                    </ul>
                </div>
                
            </div>
           {{--  <script>
                $(function() {
                    $("#coll-filter-1 ul li a, #coll-filter-2 ul li a, #coll-filter-3 ul li a, #coll-filter-4 ul li a").click(function(event) {
                        event.preventDefault();
                        var url = $(this).attr('href');
                        $.ajax({
                            type: 'GET',
                            url: url,
                            data: {},
                            beforeSend: function(xhr) {
                                $("#tags-load").show();
                            },
                            complete: function(data) {
                                $('#collection').html($("#collection", data.responseText).html());
                                history.pushState({
                                    page: url
                                }, url, url);
                                $("#tags-load").hide();
                                handleGridList();
                                toggleTagsFilter();
                            }
                        });
                    });
                });
            </script> --}}
        </div>
    </div>
    <!-- best seller -->
    @include('frontend.shop.best_seller')
    
    

</div>
{{-- <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-res-md-60px mb-res-sm-60px">
    <div class="left-sidebar">
        <div class="sidebar-heading">
            <div class="main-heading">
                <h2>Bộ lọc</h2>
            </div>
           

                 
           
            <!-- Sidebar single item -->
            <div class="sidebar-widget">
                <h4 class="pro-sidebar-title">Danh mục sản phẩm</h4>
                <div class="sidebar-widget-list">
                     
                    <!--- menu categorry -->
                        
                    <nav class="category-menu">
                        <ul>
                        
                            @foreach($categories_share as $index => $item)

                                    @if($item -> parent == null)
                                        <li class="menu-item-has-children menu-item-has-children-{{$index + 1}}">
                                            <!--hien dau > -->
                                            @if(count($item -> children))
                                                <a href="{{ url('danh-muc-san-pham/'.slugify($item -> title,'-').'/'.$item -> id) }}" class="{{Request::segment(3) == $item -> id?'active-khala':''}}" >
                                                   
                                                    {{$item->title}} <i class="ion-ios-arrow-down"></i></span>
                                                </a>
                                            @else
                                                 <a href="{{ url('danh-muc-san-pham/'.slugify($item -> title,'-').'/'.$item -> id) }}" class="{{Request::segment(3) == $item -> id?'active-khala':''}}" >
                                                   
                                                   {{$item->title}}
                                                </a>
                                            @endif
                                            <!-- end hien dau > -->
                                            
                                            @if(count($item->children))
                                                 <ul class="category-mega-menu category-mega-menu-{{$index + 1}}">
                                                    @include('frontend.category.menu_category',['childs' => $item -> children])
                                                </ul>
                                            @endif
                                        </li>
                                    
                                    @endif

                           @endforeach()
                       
                        </ul>
       
        
                    </nav>
                
                    <!--- end menu categorry -->
                </div>
            </div>
            <!-- Sidebar single item -->
        </div>
        <!-- Sidebar single item -->
        <div class="sidebar-widget mt-20">
            <h4 class="pro-sidebar-title">Giá</h4>
            <div class="price-filter mt-10">
                <form action="{{url()->current()}}">
                    <div class="price-slider-amount">
                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                    </div>
                    <div id="slider-range"></div>

                    <button class="submit-khala" type="submit">Tìm kiếm</button>
                    
                    <input type="hidden" name="brand_filter" value="{{Request::get('brand_filter')?Request::get('brand_filter') : 0}}">
                </form>
            </div>
        </div>
        
        <!-- Sidebar single item -->
        <div class="sidebar-widget mt-30">
            <h4 class="pro-sidebar-title">Nhãn hiệu</h4>
            <div class="sidebar-widget-list">
                <ul>
                    @foreach($brands_count as $brand)
                    <li>
                        <div class="sidebar-widget-list-left">
                            <a href="{{url()->current().'?brand_filter='.$brand -> id}}" class="{{Request::get('brand_filter') == $brand -> id?'active-khala':''}}">
                                {{ $brand -> title}}
                            </a>
                            
                        </div>
                    </li>
                    @endforeach
                    
                    
                </ul>
            </div>
        </div>
        
    </div>
</div> --}}