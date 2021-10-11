{{-- danh muc san pham dien thoai --}}
@foreach($childs as $index => $child)
    
        @if(count($child -> children))
            <li class="li-sub-mega navigation_mobile_2">
                <a href="blog.html" class="menu-mobile-link">
                    <span>{{$child->title}}111</span>
                </a>
                <a href="javascript:void(0)" class="arrow_2">
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu-mobile-container_2" style="display: none;">
                    
                    @include('frontend.home.mobile_menu',['childs' => $item -> children])
                    
                </ul>

        @else
            <li class=" li-sub-mega">
                <a tabindex="-1" href="{{ url('danh-muc-san-pham/'.slugify($child -> title,'-').'/'.$child -> id) }}">{{$child->title}}</a>

        @endif    
           
        </li>        
        
@endforeach 

