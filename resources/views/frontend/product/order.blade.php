@extends('frontend.layouts.master')
@section('title')
<title>Shop | Order</title>
@endsection

@section('content')

<div class="page-container" id="PageContainer">
	<main class="main-content" id="MainContent" role="main">
		<section class="collection-heading heading-content ">
			<div class="container">
				<div class="row">
					<div class="collection-wrapper">
						<h1 class="collection-title"><span>Đơn hàng của bạn</span></h1>
						<div class="breadcrumb-group">
							<div class="breadcrumb clearfix">
								<span >
									<a href="{{ url('/') }}" title="Trang chủ" itemprop="url">
										<span itemprop="title">Trang chủ</span>
									</a>
								</span>
								<span class="arrow-space">></span>
								<span >
									
										<span itemprop="title">Đơn hàng của bạn</span>
									
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="customer-heading">
			<div class="customer-heading-wrapper">
				<div class="container">
					<div class="row">
						<div class="customer-heading-inner">
							<div id="customer-order">
								
								<div class="group_order">
									<h1 >Cám ơn</h1>
				                    <p>
				                      Đơn hàng của bạn đã được tiếp nhận.Mã đơn hàng là <b>{{Session::get('order_id')}}</b><span class="note order_date">— {{date('d-m-Y')}}</span>.
				                      Đến trang
				                      <a href="{{ url('my-account') }}" class="btn-link"><b>Tài khoản để xem đơn hàng</b></a>.
				                    </p>
				                    <a href="{{url('/cua-hang')}}" class="btn btn-icon-left btn-back btn-md mb-4"><i class="d-icon-arrow-left"></i> Tiếp tục mua sắm</a>


								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>



{{Session::forget('grand_total')}}
{{Session::forget('order_id')}}
<?php 
	//DB::table('cart') -> where('user_email',Auth::user() -> email) ->delete();
DB::table('cart') -> where('session_id',Session::get('session_cart_id')) ->delete();
?>

@endsection


