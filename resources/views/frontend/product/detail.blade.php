@extends('frontend.layouts.master')
	@section('title')
		<title>{{$product -> title}}</title>
	@endsection

	@section('js')
		
		<script type="text/javascript">
			//dung cho ajax review
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
</script>
		
		
	@endsection

	@section('content')
		<div class="page-container" id="PageContainer">
		<main class="main-content" id="MainContent" role="main">
			<section class="collection-heading heading-content ">
				<div class="container">
					<div class="row">
						<div class="collection-wrapper">
							<h1 class="collection-title">
								
									{{$product -> title}}
								
							</h1>
							<div class="breadcrumb-group">
								<div class="breadcrumb clearfix">
									<span ><a href="{{ url('/') }}" title="Khala shop" itemprop="url"><span itemprop="title">Trang chủ</span></a>
									</span>
									<span class="arrow-space">></span>
									<span >
										<a href="{{url('danh-muc-san-pham/'.slugify($product -> category -> title,'-').'/'.$product -> category -> id)}}" title="All Products" itemprop="url"><span itemprop="title">{{$product -> category -> title}}</span></a>
									</span>
									<span class="arrow-space">></span>
									<strong>{{$product -> title}}</strong>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="product-detail-content">
				<div class="detail-content-wrapper">
					<div class="container">
						<div class="row">
							<div id="shopify-section-product-template" class="shopify-section">
								<div class="detail-content-inner" itemscope="" itemtype="http://schema.org/Product">
									{{-- <meta itemprop="name" content="Today's trending">
									<meta itemprop="url" content="./product.html">
									<meta itemprop="image" content="./assets/images/trending_05.jpg"> --}}
									<div id="product" class="neque-porro-quisquam-est-qui-dolor-ipsum-quia-9 detail-content">
										<div class="col-md-12 info-detail-pro clearfix">
											<div class="col-md-5" id="product-image">
												<div class="show-image-load" style="display: none;">
													<div class="show-image-load-inner">
														<i class="fa fa-spinner fa-pulse fa-2x"></i>
													</div>
												</div>
												<!--galerry -->
												<div id="featuted-image" class="image featured">
													<!--galerry -->
                                					@forelse($product -> gallery as $index => $imageGallery)
														<div class="image-item">
															<a href="#" class="thumbnail" id="thumbnail-product-{{$index + 1}}" data-toggle="modal" data-target="#lightbox"> 
																<img src="{{asset('uploads/'.$product->id.'/'.$imageGallery -> image)}}" alt="{{$imageGallery -> image}}" data-item="{{$index + 1}}">
															</a>
															<span class="image-title-zoom" data-zoom="thumbnail-product-{{$index + 1}}">
																<i class="fa fa-search-plus"></i>
																Click để xem hình lớn
															</span>
														</div>
														
													@empty
														<p>Chưa có gallery</p>
													@endforelse
													
												</div>
											</div>
											<div class="col-md-7" id="product-information">
												<!--hien thi thong bao -->
												@if(Session::has('flash_message_error'))
													<div class="alert alert-danger alert-dark alert-round alert-inline">
					                                    
					                                    {!! session('flash_message_error')!!}
					                                    <button type="button" class="btn btn-link btn-close">
					                                        <i class="d-icon-times"></i>
					                                    </button>
					                                </div>
												@endif
												@if(!empty($product -> discount))
		                                        	<!-- danh cho reset gia ban dau -->
					                                <?php $product_price_reset = $product -> price * (100 - $product -> discount)/100; ?>
					                            @else
					                            	<?php $product_price_reset = $product -> price ; ?>
					                            @endif
												<h1 itemprop="name" class="title">{{ $product -> title}}</h1>
												<div class="description" itemprop="description">
													{!!$product -> description_short!!}
												</div>
												<form method="post" action = "{{url('/add-cart')}}" id="myform" class="variants">
													@csrf
													<!-- cac input field dể add đến cart -->
													<input type="hidden" name="product_id" value="{{ $product -> id }}">
													<input type="hidden" name="product_name" value="{{ $product -> title }}">
													<input type="hidden" name="product_code" value="{{ $product -> product_code }}">
													<!-- end input field -->
													<div class="product-options ">
														{{-- <meta itemprop="priceCurrency" content="USD">
														<link itemprop="availability" href="http://schema.org/InStock"> --}}
														<div class="vendor-type">
															<span class="product_vendor"><span class="_title">Danh mục:</span> {{ $product -> category -> title }}</span>
															<span class="product_type"><span class="_title">Nhãn hiệu:</span> {{ $product -> brand -> title }}</span>
															<span class="product_sku"><span class="_title">Mã sản phẩm: </span>{{ $product -> product_code }}</span>
														</div>
														<div class="rating-star">
															<span class="spr-badge" data-rating="0.0">
																<div class="pro-details-rating-wrap">
								                                    <div class="rating-product">
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

																		<span class="rating-stars selected">
																			@for($i = 1; $i <= 5; $i++)
																			<a class="star-{{$i}} {{$i <= $avg_rating ? 'active':''}} ">{{$i}}</a>
																			@endfor
																			
																		</span>
																		<!-- end hien thi rating -->
								                                        
								                                    </div>
								                                    
								                                </div> 
																<span class="spr-badge-caption">Đánh giá({{ $reviews -> count() }})</span>
															</span>
														</div>
														<div class="product-type">
															<!-- size va mau san pham -->
															@if($categoryFeatures)
																
																<!-- size san pham -->
																@if($check_size == 1)
																	<div class="swatch swatch clearfix" data-option-index="0">
																		<div class="header">Kích cỡ</div>
																		@forelse($categoryFeatures  as $categorySizeFeature)
																				
																		<!-- kiem tra field_type =1 la ma text de hien thi text cho sp -->
																			@if($categorySizeFeature -> field_type == 1)
																					
																				<div data-url="{{ route('change-price',['value' => $categorySizeFeature -> id]) }}" data-value="{{$categorySizeFeature -> field_title}}" class="change-price swatch-element {{$categorySizeFeature -> field_title}} available" >
																					<input id="swatch-0-{{$categorySizeFeature -> field_title}}" type="radio" name="option-0" value="{{$categorySizeFeature -> field_title}}" data-url="{{ route('change-price',['value' => $categorySizeFeature -> id]) }}" data-value="{{$categorySizeFeature -> field_title}}">
																					<label for="swatch-0-l">
																						{{$categorySizeFeature -> field_title}}
																						<img class="crossed-out" src="{{asset('images/soldout.png')}}" alt="">
																					</label>
																				</div>
																			@endif
																		
																		@empty
																			<p>Kích cỡ đang cập nhật</p>	
																		@endforelse
																		<div class="header">
																			<a href="#" onclick="return false;" class="change-price" data-url="{{ route('change-price-reset',['value' => $product_price_reset]) }}">Giá ban đầu</a>
																		</div>
																		
																	</div>
																	
																@endif

																<!-- mau san pham -->
																@if($check_color == 1)
																	<div class="swatch swatch color clearfix" data-option-index="1">
																		<div class="header">Màu</div>
																		@forelse($categoryFeatures  as $categoryColorFeature)
																			
																		<!-- kiem tra xem gia tri co bat dau bang # neu bang # la ma mau de hien thi cac mau cho sp -->
																			@if($categoryColorFeature -> field_type == 2)
																				<a class="color change-color" data-src="images/demos/demo7/products/big1.jpg"
																				href="#"  style="background-color: {{$categoryColorFeature -> field_title}}" data-value ="{{$categoryColorFeature -> field_title}}"></a>
																				<div data-value="{{$categoryColorFeature -> field_title}}" class="swatch-element color {{$categoryColorFeature -> field_title}} available change-color">
																					<input id="swatch-1-{{$categoryColorFeature -> field_title}}" type="radio" name="option-1" value="{{$categoryColorFeature -> field_title}}" >
																					<label data-toggle="tooltip" data-placement="top" data-original-title="{{$categoryColorFeature -> field_title}}" for="swatch-1-{{$categoryColorFeature -> field_title}}" style="background-color: {{$categoryColorFeature -> field_title}}; border-color: {{$categoryColorFeature -> field_title}}; background-image: url({{asset('images/'.$categoryColorFeature -> field_title.'png')}})">
																						<img class="crossed-out" src="{{asset('images/soldout.png')}}" alt="">
																					</label>
																				</div>
																				
																			@endif
																		@empty
																			<p>Đang cập nhật</p>	
																		@endforelse
																
																
																  <script>
																	$(function() {
																		$(".swatch-element").click(function() {
																			if (!$(this).hasClass('active')) {
																				$(".swatch-element.active").removeClass("active");
																				$(this).addClass("active");
																			}
																		});
																	});
																</script>
															</div> 	
																	
																@endif
															@endif
															<!-- end size va mau san pham -->


															
														</div>
														<div class="product-price">
															

															<!-- hien thi gia -->
					                                        @if(!empty($product -> discount))
					                                        	
					                                       		<h2 class="price" id="price-preview">
																	<span class="price_sale">
																		<!-- class new-price lay ket qua tu xu ly ajax change price -->
																		<span class="money new-price" >{{formatMoney($product -> price * (100 - $product -> discount)/100) }}
																			<!-- price xu ly cho form -->
					                                            <input type="hidden" id = "product_price" name="product_price" value="{{ $product -> price * (100 - $product -> discount)/100 }}">

																		</span>
																	</span>
		                                                            <del class="price_compare"> 
		                                                            	<span class="money">{{formatMoney($product -> price)}}</span>
		                                                            </del>
                                                        		</h2>
                                                        		
					                                        @else
					                                        	
					                                         	<!-- class new-price lay ket qua tu xu ly ajax change price -->
					                                         	<h2 class="price" id="price-preview"><span class="money new-price">
					                                            	{{formatMoney($product -> price)}}
					                                            	<!-- price xu ly cho form -->
					                                         	<input type="hidden" id = "product_price" name="product_price" value="{{ $product -> price }}">
					                                            	  	</span></h2>
					                                            
					                                     
					                                        @endif
					                                        <!-- end hien thi gia -->
														</div>
														<div class="purchase-section multiple">
															<div class="quantity-wrapper clearfix">
																<div class="wrapper">
																	<input id="quantity" type="text" name="product_quantity" value="1" maxlength="5" size="5" class="item-quantity">
																</div>
															</div>
															<div class="purchase">
																<button id="add-to-cart" class="btn add-to-cart" type="submit" name="add"><i class="fa fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
															</div>
														</div>
													</div>
												</form>
												
												<div class="supports-fontface">
													<div class="social-sharing is-clean">
														<a target="_blank" href="product.html" class="share-facebook">
															<span class="icon icon-facebook"></span>
															<span class="share-title">Share</span>     
														</a>
														<a target="_blank" href="product.html" class="share-twitter">
															<span class="icon icon-twitter"></span>
															<span class="share-title">Tweet</span>
														</a>
														<a target="_blank" href="product.html" class="share-pinterest">
															<span class="icon icon-pinterest"></span>
															<span class="share-title">Pin it</span>
														</a>
														<a target="_blank" href="product.html" class="share-fancy">
															<span class="icon icon-fancy"></span>
															<span class="share-title">Fancy</span>
														</a>
														<a target="_blank" href="product.html" class="share-google">
															<!-- Cannot get Google+ share count with JS yet -->
															<span class="icon icon-google-plus"></span>
															<span class="share-count is-loaded">+1</span>
														</a>
													</div>
												</div>
											</div>
										</div>
										<div id="tabs-information" class="col-md-12">
											<div class="information_content panel panel-default">
												<div class="panel-heading" role="tab" id="heading_des">
													<h4 class="panel-title" data-toggle="collapse" href="#collapse_des" aria-expanded="true" aria-controls="collapse_des">
														Mô tả
														<i class="fa-icon fa fa-angle-up"></i>
													</h4>
												</div>
												<div id="collapse_des" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_des">
													<div class="panel-body">
														{!! $product -> description !!}
													</div>
												</div>
											</div>
											<div class="information_content panel panel-default">
												<div class="panel-heading" role="tab" id="heading_tags">
													<h4 class="panel-title" data-toggle="collapse" href="#collapse_tags" aria-expanded="true" aria-controls="collapse_tags">
														Thông tin thêm
														<i class="fa-icon fa fa-angle-up"></i>
													</h4>
												</div>
												<div id="collapse_tags" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_tags">
													<div class="panel-body">
														{!! $product -> additional !!}
													</div>
												</div>
											</div>
											<div class="information_content panel panel-default">
												<div class="panel-heading" role="tab" id="heading_review">
													<h4 class="panel-title" data-toggle="collapse" href="#collapse_review" aria-expanded="true" aria-controls="collapse_review">
														Đánh giá({{ $reviews -> count() }})
														<i class="fa-icon fa fa-angle-up"></i>
													</h4>
												</div>
												<div id="collapse_review" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_review">

													<div class="panel-body">

														<div id="customer_review">
															<div class="preview_content">
																<div id="shopify-product-reviews" data-id="6537875078">
																	<div class="spr-container">
																		<div class="spr-header">
																			<h2 class="spr-header-title">Khách hàng đánh giá</h2>
																			<!-- kiem tra dang nhap rui thi cho danh gia san pham -->
								                                        	@if(Auth::check())
									                                            <div class="ratting-form-wrapper pl-50">	
										                                            <div class="ratting-form">
										                                                <form action="#">
										                                                    <div class="star-box">
										                                                        {{-- <span>Đánh giá của bạn:</span> --}}
										                                                        <span class="rating-stars selected">
																									@for($i = 1; $i <= 5; $i++)
																									<a class="star-{{$i}} start-a" href="#" data-key = "{{$i}}">{{$i}}</a>
																									@endfor
																									
																								</span>


																								<select name="rating" id="rating" required="" style="display: none;">
																									<option value="">Rate…</option>
																									<option value="5">Tuyệt vời quá</option>
																									<option value="4">Rất tốt</option>
																									<option value="3">Bình thường</option>
																									<option value="2">Tạm được</option>
																									<option value="1">Không thích</option>
																								</select>

										                                                    </div>
										                                                    <br />
										                                                    <div class="row">
										                                                        
										                                                        <div class="col-md-12">
										                                                            <div class="rating-form-style form-submit">
										                                                               <input type="hidden"  class="number_rating">
																										<textarea id="reply-message" cols="30" rows="4"
																											class="form-control mb-4" placeholder="Đánh giá của bạn"
																											required></textarea>
																										
																										
																										<a href="{{route('post.review.product',$product -> id)}}" class="btn btn-primary btn-md btn-khala" id="submit_review">Gửi<i
																												 ></i></a>
										                                                            </div>
										                                                        </div>
										                                                    </div>
										                                                </form>
										                                            </div>
										                                        </div>
								                                            @else
								                                            	<h3>Đăng nhập để thêm đánh giá</h3>
								                                            	<div class="formaccount formlogin">
																                    @if($errors)

																                        {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}
																                        {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}
																                               
																                    @endif
																                    <div class="form-vertical block">
																                        <form method="post" action="{{ route('front-login') }}"  accept-charset="UTF-8">

																                            @csrf
																                       
																                            <label for="CustomerEmail">Email</label>
																                            <input type="email" name="email" placeholder="Email *" value = "{{old('email')}}" required autofocus>

																                          
																                            <label for="CustomerPassword">Mật khẩu</label>
																                            <input type="password"  name = "password" id="password" placeholder="Mật khẩu *" required>
																                          

																                            <div class="submit">

																                                <input type="submit" class="btn" value="Đăng nhập">
																                            </div>

																                        </form>
																                    </div>

																                </div>
								                                            @endif

																			
																		</div>
																		<br />
																		<div class="spr-content">
																			@if($reviews -> count() > 0)
								                                        		@foreach($reviews as $review)
								                                            		<div class="single-review">
										                                                <div class="review-img">
										                                                    <img src="{{ url('uploads/users/' . $review -> user -> image) }}" alt="{{$review -> user -> name}}" width="100px" height="100px" />
										                                                </div>
										                                                <div class="review-content">
										                                                    <div class="review-top-wrap">
										                                                        <div class="review-left">
										                                                            <div class="review-name">
										                                                                <h4>{{$review -> user -> name}}</h4>
										                                                            </div>
										                                                            <div class="rating-product">
										                                                                <div class="comment-rating ratings-container mb-0">
																											<span class="rating-stars selected">
																												@for($i = 1; $i <= 5; $i++)
																												<a class="star-{{$i}} {{$i <= $review -> rating ? 'active-tab-review':''}} ">{{$i}}</a>
																												@endfor
																												
																											</span>
																											
																										</div>
										                                                            </div>
										                                                        </div>
										                                                        
										                                                    </div>
										                                                    <div class="review-bottom">
										                                                        <p>
										                                                            {{$review -> comment}}
										                                                        </p>
										                                                    </div>
										                                                </div>
								                                            		</div>
								                                            	@endforeach
								                                            @else
																				<p>Chưa có đánh giá</p>
																			@endif
																		
																			
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<script>
												$(".information_content .panel-title").click(function() {
													if ($(this).find("i").hasClass("fa-angle-up")) {
														$(this).find("i").removeClass("fa-angle-up");
														$(this).find("i").addClass("fa-angle-down");
													} else {
														$(this).find("i").removeClass("fa-angle-down");
														$(this).find("i").addClass("fa-angle-up");
													}
												});
											</script>
										</div>
										{{-- co the ban thich --}}
										@include('frontend.home.components.you_like')
										
									</div>
								</div>
							</div>
						</div>
						<script>
							/*function active_review_form(){
								if($("#form_6537875078").attr('style')=='display: none;'){
									$("#form_6537875078").css('display','block');
								}
								else {
									$("#form_6537875078").css('display','none');
								}
							}*/
							jQuery(document).ready(function($){
								$('#gallery-images div.image').on('click', function() {
									var $this = $(this);
									var parent = $this.parents('#gallery-images');
									parent.find('.image').removeClass('active');
									$this.addClass('active');
								});
							});
						</script>
					</div>
				</div>
			</section>
			<div id="shopify-section-index-collection-product" class="shopify-section index-section index-section-colpro">
				<section class="collection-colpro">
					<div class="collection-colpro-wrapper">
						<div class="container">
							<div class="row">
								<div class="collection-colpro-inner">
									{{-- san pham xem nhieu --}}
									@include('frontend.product.products_view')

									{{-- san pham lien quan --}}
									@include('frontend.product.products_relate')
									
									
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</main>
		</div>
		<!-- Lightbox -->
		<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
				<div class="modal-content">
					<div class="modal-body">
						<img src="{{asset('uploads/products-daidien/'.$product->image)}}" alt="{{$product -> title}}" />
					</div>
				</div>
			</div>
		</div>
	@endsection
	

	
	