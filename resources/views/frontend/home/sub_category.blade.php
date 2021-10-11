 
 @foreach($childs as $child)
 
    <li>
        <ul class="mb-20px">
            <li class="{{count($child->children)?'mega-menu-title':''}}">
            	<a href="{{route('category.product',['slug' => slugify($child -> title,'-'),'id' => $child -> id]) }}">{{$child->title}}</a>
            	@if(count($child->children))
		            @include('frontend.home.sub_category',['childs' => $child -> children])
		       		
		        @endif
            </li>
        
        </ul>    
    </li>

@endforeach

 