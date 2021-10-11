@extends('frontend.layouts.master')
	@section('title')
		<title>Shop | Checkout</title>
	@endsection
	
    @section('content')
    <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
            <section class="collection-heading heading-content ">
                <div class="container">
                    <div class="row">
                        <div class="collection-wrapper">
                            <h1 class="collection-title"><span>Trang thanh toán</span></h1>
                            <div class="breadcrumb-group">
                                <div class="breadcrumb clearfix">
                                    <span ><a href="{{ url('/') }}" title="Trang chủ" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                    </span>
                                    <span class="arrow-space">></span>
                                    <span >
                                        <span itemprop="title">Thanh toán</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cart-content">
                <div class="cart-wrapper">
                    <div class="container">
                        <div class="row">
                            <div id="shopify-section-cart-template" class="shopify-section">
                                <div class="cart-inner">
                                    <div id="cart">
                                        <div class="cart-form">
                                            <form method = "post" action="{{url('/checkout')}}" class="form" id="form-checkout">
                                                @csrf
                                                <div class="group-checkout-input ">
                                                    <div class="checkout-buttons col-sm-6 col-xs-12">
                                                       
                                                            <h3>Thông tin thanh toán</h3>
                                                            <!-- thong tin thanh toan -->
                                                            
                                                                <p class="field">
                                                                    <label for="billing_name">Tên *</label>
                                                                    <input type="text" name="billing_name" required value="{{$userDetails -> name}}">
                                                                </p>
                                                                <p class="field">
                                                                    <label for="billing_email">Email *</label>
                                                                    <input type="email" name="billing_email" required value="{{$userDetails -> email}}">
                                                                </p>
                                                                <p class="field">
                                                                    <label for="billing_mobile">Điện thoại *</label>
                                                                    <input type="text" name="billing_mobile" required value="{{$userDetails -> mobile}}">
                                                                </p>
                                                                
                                                                <p class="field">
                                                                    <label for="billing_city">Tỉnh/Thành phố</label>
                                                                    <select  name="billing_city">
                                                                        <option value="0">Chọn thành phố/tỉnh</option>
                                                                        @foreach($citys as $city)
                                                                        <option 
                                                                        value="{{ $city -> name }}" 
                                                                        {{ $city->name  == $userDetails -> city ?"selected":""}}>
                                                                        {{ $city -> name }}</option>
                                                                        @endforeach       
                                                                    </select>
                                                                </p>

                                                                <p class="field">
                                                                    <label for="billing_state">Quận/huyện</label>
                                                                    <input type="text" name="billing_state" required value="{{$userDetails -> state}}">
                                                                </p>

                                                                <p class="field">
                                                                    <label for="billing_address">Địa chỉ</label>
                                                                    <input type="text" name="billing_address" required value="{{$userDetails -> address}}">
                                                                </p>
                                                                
                                                            
                                                            <!-- end thong tin thanh toan -->
   
                                                            <div class="checkout-account">
                                                                <input class="checkout-toggle" type="checkbox" name="different_address"/>
                                                                <label>Giao hàng đến địa chỉ khác?</label>
                                                            </div>
                                                            <div class="different-address open-toggle mt-30">
                                                                
                                                                    <!-- dia chi khac-->
                                                                    <p class="field">
                                                                    <label for="shipping_name">Tên *</label>
                                                                    <input type="text" name="shipping_name"  value="{{empty($shipping_details -> name) ?' ':$shipping_details -> name}}">
                                                                    </p>
                                                                    <p class="field">
                                                                        <label for="shipping_email">Email *</label>
                                                                        <input type="email" name="shipping_email"  value="{{empty($shipping_details -> user_email)?' ':$shipping_details -> user_email}}">
                                                                    </p>
                                                                    <p class="field">
                                                                        <label for="shipping_mobile">Điện thoại *</label>
                                                                        <input type="text" name="shipping_mobile" value="{{empty($shipping_details -> mobile)?' ':$shipping_details -> mobile}}">
                                                                    </p>
                                                                    
                                                                    <p class="field">
                                                                        <label for="billing_city">Tỉnh/Thành phố</label>
                                                                        <select  name="shipping_city">
                                                                            <option value="0">Chọn thành phố/tỉnh</option>
                                                                            @foreach($citys as $city)
                                                                                <option value="{{ $city -> name }}" 
                                                                                    {{!empty($shipping_details -> city) && ($shipping_details -> city == $city -> name)?'selected':' '}}>
                                                                                {{ $city -> name }}
                                                                                </option>
                                                                            @endforeach       
                                                                        </select>
                                                                    </p>

                                                                    <p class="field">
                                                                        <label for="billing_state">Quận/huyện</label>
                                                                        <input type="text" name="shipping_state" value="{{!empty($shipping_details -> state) ?$shipping_details -> state:' '}}">
                                                                    </p>

                                                                    <p class="field">
                                                                        <label for="billing_address">Địa chỉ</label>
                                                                        <input type="text" name="shipping_address" value="{{!empty($shipping_details -> address) ?$shipping_details -> address:' '}}">
                                                                    </p>
      
                                                                
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="shipping-calculator col-sm-6 col-xs-12 ">
                                                        <div id="shipping-calculator">
                                                            <div class="your-order-area">

                                                                <h3>Đơn hàng 1</h3>
                                                                <div class="your-order-wrap gray-bg-4">
                                                                    <div class="your-order-product-info">
                                                                        <div class="your-order-top">
                                                                            <ul>
                                                                                <li>Sản phẩm</li>
                                                                                <li>Tổng</li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="your-order-middle">
                                                                            <?php $total_amount = 0; ?>
                                                                            <ul>
                                                                                <!-- product cart -->
                                                                                @foreach($userCart as $item)
                                                                                    <li><span class="order-middle-left">{{$item -> product_name}} X {{$item -> quantity}}</span> <span class="order-price">{{formatMoney($item -> price * $item -> quantity)}} </span></li>
                                                                                
                                                                                <?php $total_amount = $total_amount + ($item -> price * $item -> quantity);?>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>

                                                                        {{-- <div class="your-order-bottom">
                                                                            <ul>
                                                                                <li class="your-order-shipping">Giao hàng</li>
                                                                                <li>Miễn phí</li>
                                                                            </ul>
                                                                        </div> --}}
                                                                        <!-- coupon -->
                                                                        <div class="your-order-bottom">
                                                                            <ul>
                                                                                <li class="your-order-shipping">Mã giảm giá</li>
                                                                                <li>
                                                                                    @if(!empty(Session::get('CouponAmount')))
                                                                                        {{formatMoney(Session::get('CouponAmount'))}} 
                                                                                    @else
                                                                                        0 đ
                                                                                    @endif
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="your-order-total">
                                                                            <ul>
                                                                                <li class="order-total">
                                                                                    Tổng tiền thanh toán
                                                                                </li>
                                                                                <li class="total-amount-checkout">
                                                                                    {{formatMoney($total_amount - Session::get('CouponAmount'))}}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="payment-method">
                                                                        <div class="payment-accordion element-mrg">
                                                                            <div class="panel-group" id="accordion">
                                                                                <div class="panel payment-accordion">
                                                                                    <div class="panel-heading" id="method-one">
                                                                                        <h4 class="panel-title">
                                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#method1">
                                                                                                Qua ngân hàng
                                                                                            </a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div id="method1" class="panel-collapse collapse show">
                                                                                        <div class="panel-body">
                                                                                            <p>Vui lòng sử dụng Mã đơn hàng khi bạn chuyển khoản</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                               
                                                                                <div class="panel payment-accordion">
                                                                                    <div class="panel-heading" id="method-three">
                                                                                        <h4 class="panel-title">
                                                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method3">
                                                                                                Sau khi nhận hàng
                                                                                            </a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div id="method3" class="panel-collapse collapse">
                                                                                        <div class="panel-body">
                                                                                            <p>Sau khi nhận hàng và kiểm tra hàng xong mới trả tiền</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" cart-buttons">
                                                    <div class="buttons clearfix">
                                                        <input onclick="document.getElementById('form-checkout').submit(); return false;" type="button" id="checkout" class="btn" name="checkout" value="Đặt hàng">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="grand_total" value="{{$total_amount - Session::get('CouponAmount')}}">
                                                <input type="hidden" name="paymentMethod" value="Sau khi nhận hàng" id="paymentMethod">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    @endsection


	

	
	