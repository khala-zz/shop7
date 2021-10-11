@extends('frontend.layouts.master')
	@section('title')
		<title>Shop | Giỏ hàng</title>
	@endsection
	
	@section('content')
    <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
            <section class="collection-heading heading-content ">
                <div class="container">
                    <div class="row">
                        <div class="collection-wrapper">
                            <h1 class="collection-title"><span>Giỏ hàng của bạn</span></h1>
                            <div class="breadcrumb-group">
                                <div class="breadcrumb clearfix">
                                    <span><a href="{{ url('/') }}" title="Bridal 1" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                    </span>
                                    <span class="arrow-space">></span>
                                    <span >
                                        <span itemprop="title">Giỏ hàng</span>
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
                                            <!--hien thi thong bao -->
                                            @if(Session::has('flash_message_error'))
                                                <div class="alert alert-dark alert-danger alert-round alert-inline">
                                                    
                                                    {!! session('flash_message_error')!!}
                                                    
                                                </div>
                                            @endif

                                            @if(Session::has('flash_message_success'))
                                                <div class="alert alert-dark alert-success alert-round alert-inline">
                                                    
                                                    {!! session('flash_message_success')!!}
                                                   
                                                </div>
                                            @endif
                                            <!-- end hien thi thong bao -->
                                            <form action="{{route('update.cart')}}" method="post" id="updateQty">
                                                @csrf
                                                <table class="cart-items">
                                                    <thead>
                                                        <tr>
                                                            <th class="image text-left">Sản phẩm</th>
                                                            <th class="price">Giá</th>
                                                            <th class="qty">Số lượng</th>
                                                            <th class="total">Tổng</th>
                                                            <th class="remove"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- show du lieu cart -->
                                                        <?php 
                                                            //khai báo biến tổng để tính tổng
                                                            $total_amount = 0;
                                                            $cart_id = [];
                                                        ?>
                                                        @foreach($userCart as $item)
                                                            @php $cart_id[] = $item -> id ;@endphp
                                                            {{-- dành cho phần cập nhật giỏ hàng --}}
                                                            <input type="hidden" name="cart_id[]" value="{{$item -> id}}">
                                                            <tr>
                                                                <td class="title text-left">
                                                                    <ul class="list-inline">
                                                                        <li class="image">

                                                                            <a href="{{ route('product.detail',['slug' => slugify($item -> product_name,'-'),'id' => $item -> product_id]) }}">
                                                                                <img src="{{ asset('uploads/products-daidien/'.$item -> image) }}" alt="{{$item -> product_name}}" width="139px" height="160px">
                                                                            </a>
                                                                        </li>
                                                                        <li class="link">
                                                                            <a href="{{ route('product.detail',['slug' => slugify($item -> product_name,'-'),'id' => $item -> product_id]) }}">
                                                                                <p>{{$item -> product_name}}</p>
                                                                                @if(!empty($item -> size) || !empty($item -> product_color) )
                                                                                    
                                                                                
                                                                                <span class="variant_title">{{$item -> size}} / {{$item -> product_color}}</span>
                                                                                @endif
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td class="price"><span class="money" >{{formatMoney($item -> price)}}</span></td>
                                                                <td class="qty">
                                                                    <div class="quantity-wrapper">
                                                                        <div class="wrapper">
                                                                            <input type="text" size="4" name="qtybutton[]" value="{{$item -> quantity}}" class="tc item-quantity">
                                                                        </div>
                                                                        <!--End wrapper-->
                                                                    </div>
                                                                    <!--End quantily wrapper-->
                                                                </td>
                                                                <td class="total title-1"><span class="money">{{formatMoney($item -> price * $item -> quantity)}}</span></td>
                                                                <td class="remove"><a href="{{url('/cart/delete-product/'.$item -> id)}}" class="cart"><i class="fa fa-trash"></i></a></td>
                                                            </tr>
                                                            <!-- tinh tong -->
                                                            <?php $total_amount = $total_amount + ($item -> price * $item -> quantity);?>
                                                        @endforeach
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="summary">
                                                            <td class="total-action" colspan="4"><input type="submit" id="update-cart" class="btn" name="update" value="Cập nhật giỏ hàng" form="updateQty"></td>
                                                            <td class="" colspan="1"><span class="total"><strong><span class="money" ><a href="{{ url('/cua-hang') }}" class="get-rates btn button">Tiếp tục mua sắm</a></span></strong>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="group-checkout-input">
                                                    <div class="checkout-buttons col-sm-6 col-xs-12">
                                                        <label for="note">Nhập mã khuyến mãi tại đây.</label>
                                                        
                                                        
                                                        <form >
                                                            @csrf
                                                            <input type="text" required="" name="coupon_code"  placeholder="Nhập mã giảm giá"/>
                                                            <br /><br />
                                                            <button type="submit" formaction="{{ url('/cart/apply-coupon') }}" method='post' class="btn btn--secondary khala-btn-coupon">Gửi</button>

                                                        </form>
                                                    </div>
                                                    <div class="shipping-calculator col-sm-6 col-xs-12 ">
                                                        <div id="shipping-calculator">

                                                            <h3>Giỏ hàng</h3>
                                                            <div>
                                                                <p class="field">
                                                                    
                                                                    <label>Tổng tiền <span><?php echo formatMoney($total_amount); ?></span></label>

                                                                    <!-- kiem tra neu có coupon thi hiện ra -->
                                                                    @if(!empty(Session::get('CouponAmount')))
                                                                        
                                                                        <label>Giảm giá<span> <?php echo formatMoney(Session::get('CouponAmount')); ?></span></label>
                                                                            
                                                                        
                                                                        <label >Tổng tiền thanh toán <span><?php echo formatMoney($total_amount - Session::get('CouponAmount')); ?></span></label>
                                                                    @else
                                                                        <label>Tổng tiền thanh toán <span><?php echo formatMoney($total_amount); ?></span></label>
                                                                    @endif
                                                                </p>
                                                                
                                                                <p class="field">
                                                                   
                                                                    <a href="{{ url('/checkout') }}" class="get-rates btn button">Thanh toán</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class=" cart-buttons">
                                                    <div class="buttons clearfix">
                                                        <input type="submit" id="checkout" class="btn" name="checkout" value="Check Out">
                                                    </div>
                                                </div> --}}
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

    

	
	