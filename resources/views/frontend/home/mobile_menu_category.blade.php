

{{-- danh muc san pham dien thoai --}}
@foreach($childs as $index => $child)
    
        @if(count($child -> children))
            <li class="list-unstyled li-sub-mega">
                <a href="{{ url('danh-muc-san-pham/'.slugify($child -> title,'-').'/'.$child -> id) }}">
                  {{$child->title}}
                </a>
                <div class="menu-mobile-container" style="display: none;">
                    <ul class="sub-mega-menu">
                        <li class="mega1-collumn1">
                            <ul>    
              
                      
                                @include('frontend.home.mobile_menu_category',['childs' => $child -> children])
                            </ul>
                        </li>
                    </ul>
                </div>
                    
            
               
        @else
            <li class="list-unstyled li-sub-mega">     
            <a href="{{ url('danh-muc-san-pham/'.slugify($child -> title,'-').'/'.$child -> id) }}">
                {{$child->title}} 
            </a>
                
           
        @endif    
           
        </li>        
       
@endforeach

