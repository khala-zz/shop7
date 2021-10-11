@foreach($childs as $index => $child)
    
        @if(count($child -> children))
            <li class="nav-item dropdown navigation _icon">
                <a href="{{ route('category.product',['slug' => slugify($child -> title,'-'),'id' => $child -> id])}}" class="dropdown-toggle dropdown-link" data-toggle="dropdown">
                    <span>{{$child->title}}</span>
                    <i class="fa fa-angle-down"></i>
                    <i class="sub-dropdown1  visible-sm visible-md visible-lg"></i>
                    <i class="sub-dropdown visible-sm visible-md visible-lg"></i>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                    @include('frontend.home.menu_category',['childs' => $child -> children])
                </ul>
        @else

            <li class="li-sub-mega">
            <a tabindex="-1" href="{{ route('category.product',['slug' => slugify($child -> title,'-'),'id' => $child -> id])}}">
                <span>{{$child->title}}</span>
            </a>     
            
           
        @endif    
           
            </li>    
      
@endforeach 



 