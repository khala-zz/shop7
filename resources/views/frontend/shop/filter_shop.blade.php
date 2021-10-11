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
                                <a href="{{ url('cua-hang?category_id='.$item -> id) }}" class="{{Request::segment(3) == $item -> id?'active-khala':''}}">{{$item->title}}<span class="caret"></span></a>
                                <ul class="sub-menu level-{{$index + 1}}" style="display: none;">
                                    @include('frontend.shop.menu_category',['childs' => $item -> children])
                                </ul>
                        @else
                                 
                            <li >
                                <a href="{{ url('cua-hang?category_id='.$item -> id) }}" class="{{Request::segment(3) == $item -> id?'active-khala':''}}">{{$item->title}}</a>
                           
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
                    {{-- <ul class="filter-content">
                        
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
                    </ul> --}}
                    <ul class="filter-content">
            
                        <li>
                         @if(Request::get('brand_filter') || Request::get('category_id') 
                            || (Request::get('brand_filter')&&Request::get('category_id')) 
                            || (Request::get('brand_filter') && Request::get('price')) 
                            || (Request::get('brand_filter') && Request::get('price') && Request::get('category_id'))
                            )
                            <a href="{{url()->current().'?price=1000-500000&brand_filter='.Request::get('brand_filter').'&category_id='.Request::get('category_id')}}" class="{{Request::get('price') == '1000-500000'?'active-khala':''}}">
                                0-500.000 đ
                            </a>
                            @else
                            <a href="{{url()->current().'?price=1000-500000'}}" class="{{Request::get('price') == '1000-500000'?'active-khala':''}}">
                                0-500.000 đ
                            </a>
                            @endif

                        </li>
                        <li>
                            @if(Request::get('brand_filter') || Request::get('category_id') 
                                || (Request::get('brand_filter')&&Request::get('category_id')) 
                                || (Request::get('brand_filter') && Request::get('price')) 
                                || (Request::get('brand_filter') && Request::get('price') && Request::get('category_id'))
                                )
                                <a href="{{url()->current().'?price=500000-1000000&brand_filter='.Request::get('brand_filter').'&category_id='.Request::get('category_id')}}" class="{{Request::get('price') == '500000-1000000'?'active-khala':''}}">
                                    500.000 - 1.000.000 đ
                                </a>
                                @else
                                <a href="{{url()->current().'?price=500000-1000000'}}" class="{{Request::get('price') == '500000-1000000'?'active-khala':''}}">
                                    500.000 - 1.000.000 đ
                                </a>
                                @endif
                                
                        </li>
                        <li>
                            @if(Request::get('brand_filter') || Request::get('category_id') 
                                || (Request::get('brand_filter')&&Request::get('category_id')) 
                                || (Request::get('brand_filter') && Request::get('price')) 
                                || (Request::get('brand_filter') && Request::get('price') && Request::get('category_id'))
                                )
                                <a href="{{url()->current().'?price=1000000-2000000&brand_filter='.Request::get('brand_filter').'&category_id='.Request::get('category_id')}}" class="{{Request::get('price') == '1000000-2000000'?'active-khala':''}}">
                                    1.000.000 - 2.000.000 đ
                                </a>
                                @else
                                <a href="{{url()->current().'?price=1000000-2000000'}}" class="{{Request::get('price') == '1000000-2000000'?'active-khala':''}}">
                                    1.000.000 - 2.000.000 đ
                                </a>
                                @endif

                        </li>
                        <li>
                            @if(Request::get('brand_filter') || Request::get('category_id') 
                                || (Request::get('brand_filter')&&Request::get('category_id')) 
                                || (Request::get('brand_filter') && Request::get('price')) 
                                || (Request::get('brand_filter') && Request::get('price') && Request::get('category_id'))
                                )
                                <a href="{{url()->current().'?price=2000000-4000000&brand_filter='.Request::get('brand_filter').'&category_id='.Request::get('category_id')}}" class="{{Request::get('price') == '2000000-4000000'?'active-khala':''}}">
                                    2.000.000 - 4.000.000 đ
                                </a>
                                @else
                                <a href="{{url()->current().'?price=2000000-4000000'}}" class="{{Request::get('price') == '2000000-4000000'?'active-khala':''}}">
                                    2.000.000 - 4.000.000 đ
                                </a>
                                @endif
                                
                        </li>
                        <li>
                            @if(Request::get('brand_filter') || Request::get('category_id') 
                                || (Request::get('brand_filter')&&Request::get('category_id')) 
                                || (Request::get('brand_filter') && Request::get('price')) 
                                || (Request::get('brand_filter') && Request::get('price') && Request::get('category_id'))
                                )
                                <a href="{{url()->current().'?price=4000000-40000000&brand_filter='.Request::get('brand_filter').'&category_id='.Request::get('category_id')}}" class="{{Request::get('price') == '4000000-40000000'?'active-khala':''}}">
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
                            
                                @if(Request::get('price') || Request::get('category_id') 
                                || (Request::get('price')&&Request::get('category_id')) 
                                || (Request::get('brand_filter') && Request::get('price')) 
                                || (Request::get('brand_filter') && Request::get('price') && Request::get('category_id'))
                                )
                                    <a href="{{url()->current().'?price='.Request::get('price').'&brand_filter='.$brand -> id.'&category_id='.Request::get('category_id')}}" class="{{Request::get('brand_filter') == $brand -> id?'active-khala':''}}">
                                        {{ $brand -> title}}<span>({{ $brand -> products_count}})</span> 
                                    </a>
                                @else
                                    <a href="{{url()->current().'?brand_filter='.$brand -> id}}" class="{{Request::get('brand_filter') == $brand -> id?'active-khala':''}}">
                                        {{ $brand -> title}}<span>({{ $brand -> products_count}})</span> 
                                    </a>
                                @endif   
                                {{-- @if(Request::get('price')  || (Request::get('brand_filter') && Request::get('price')) )
                                    <a href="{{url()->current().'?price='.Request::get('price').'&brand_filter='.$brand -> id}}" class="{{Request::get('brand_filter') == $brand -> id?'active-khala':''}}">
                                    {{ $brand -> title}}<span>({{ $brand -> products_count}})</span> 
                                    </a>
                                @else
                                    <a href="{{url()->current().'?brand_filter='.$brand -> id}}" class="{{Request::get('brand_filter') == $brand -> id?'active-khala':''}}">
                                    {{ $brand -> title}}<span>({{ $brand -> products_count}})</span> 
                                    </a>
                                @endif    --}}
                                
                            
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
 