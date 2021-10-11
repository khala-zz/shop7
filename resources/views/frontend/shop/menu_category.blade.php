
@foreach($childs as $index => $child)
    
        @if(count($child -> children))
            <li class="active toggle-content">
                <a href="{{ url('cua-hang?category_id='.$child -> id) }}" class="menu-a-before">{{$child->title}}<span class="caret"></span></a>
                <ul class="sub-menu level-{{$index + 2}}" style="display: none;">
                    @include('frontend.shop.menu_category',['childs' => $child -> children])
                </ul>
        @else
                 
            <li >
                <a href="{{ url('cua-hang?category_id='.$child -> id) }}" class="menu-a-before">{{$child->title}}</a>
           
        @endif    
           
            </li>    
       
@endforeach

 