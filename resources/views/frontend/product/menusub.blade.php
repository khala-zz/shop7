 
 @foreach($childs as $child)
 {{--
 <ul style="display: block">
     <li>
        <a href="{{ url('cua-hang?category_id='.$child -> id)}}" 
        	class="{{ count($child->children) ? 'show' :'' }} {{Request::get('category_id') == $child -> id ? 'active-filters' :''}}">{{$child->title}}</a>
        @if(count($child->children))
        	
            @include('frontend.news.menusub',['childs' => $child -> children])
           
        @endif

    </li>
</ul>
--}}
 <ul>
    <li>
        <div class="sidebar-widget-list-left">
            <a href="{{ url('cua-hang?category_id='.$child -> id)}}">{{$child->title}}<span>(17)</span> </a>
            
        </div>
        @if(count($child->children))
        	
            @include('frontend.product.menusub',['childs' => $child -> children])
           
        @endif
    </li>
    
    
</ul>
@endforeach