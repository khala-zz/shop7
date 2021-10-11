@if($categoryParent -> categoryChildrent -> count())
<ul role="menu" class="sub-menu">
	@foreach($categoryParent -> categoryChildrent as $categoryChild)
		<li>
			<a href="shop.html">{{ $categoryChild -> name }}</a>
			@if($categoryChild -> categoryChildrent -> count())
			@include('frontend.components.child_menu',['categoryParent' => $categoryChild])
			@endif	
		</li>
		

	@endforeach

</ul>
@endif