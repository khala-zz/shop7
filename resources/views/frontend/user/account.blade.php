@extends('frontend.layouts.master')
@section('title')
<title>Tài khoản</title>
@endsection

@section('content')
    <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
            <section class="collection-heading heading-content ">
                <div class="container">
                    <div class="row">
                        <div class="collection-wrapper">
                            <h1 class="collection-title"><span>Trang tài khoản</span></h1>
                            <div class="breadcrumb-group">
                                <div class="breadcrumb clearfix">
                                    <span><a href="{{ url('/') }}" title="Bridal 1" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                                    </span>
                                    <span class="arrow-space">></span>
                                    <span >
                                        <span itemprop="title">Tài khoản</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cart-content account">
                
                            
                                            
                                               
                <div class="page-content mb-10">
                    <div class="container pt-1">
                        <div class="tab tab-vertical">
                            <ul class="nav nav-tabs mb-4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#dashboard">Điều khiển</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#orders">Đơn hàng</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#address">Địa chỉ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#account">Thông tin tài khoản</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/front-logout') }}">Đăng xuất</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!--hien thi thong bao -->
                                @if(Session::has('flash_message_error'))
                                    <div class="alert alert-danger alert-dark alert-round alert-inline">
                                        
                                        {!! session('flash_message_error')!!}
                                        
                                    </div>
                                @endif

                                @if(Session::has('flash_message_success'))
                                    <div class="alert alert-success alert-dark alert-round alert-inline">
                                        <h4 class="alert-title">Thành công :</h4>
                                        {!! session('flash_message_success')!!}
                                        
                                    </div>
                                @endif
                                <!-- end hien thi thong bao -->
                                <div class="tab-pane active" id="dashboard">
                                    <p class="mb-2">
                                        Chào <span>{{$userDetails -> name}}</span> 
                                    </p>
                                    <p>
                                        Từ bảng điều khiển này bạn có thể xem <a href="#orders"
                                            class="link-to-tab text-secondary">những đơn hàng gần đây</a>, quản lý thông tin <a
                                            href="#address" class="link-to-tab text-secondary">địa chỉ của bạn</a>, và <a href="#account" class="link-to-tab text-secondary">chỉnh sửa thông tin tài khoản của bạn</a>.
                                    </p>
                                </div>
                                <div class="tab-pane" id="orders">
                                    @if($orders -> isEmpty())
                                    <p class=" b-2">Chưa có đơn hàng nào</p>
                                    <a href="{{url('/')}}" class="btn btn-primary">Mua sắm</a>
                                    @else
                                    <div class="table-responsive">
                                        <table class="table" >
                                            <thead>
                                                <tr>
                                                    <th scope="col" >Mã đơn hàng</th>
                                                    <th scope="col">Sản phẩm</th>
                                                    <th scope="col">Phương thức thanh toán</th>
                                                    <th scope="col">Tổng tiền thanh toán</th>
                                                    <th scope="col">Ngày đặt hàng</th>

                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr style="border-bottom: 1px solid #eee;">
                                                    <td class="code-order-khala" scope="row" >{{$order -> ma_order}}</td>
                                                    <td class="product-order-khala">
                                                        @foreach($order -> orders as $pro)
                                                           
                                                        <div class="accordion  accordion-boxed accordion-plus">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <a  onclick="return false;" class="account-order-toggle-khala" data-index="{{$pro -> product_code}}">{{$pro -> product_code}}({{$pro -> product_qty}})</a>
                                                                </div>
                                                                <div  class="collapse-{{$pro -> product_code}}">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">{{$pro -> product_name}}</p>
                                                                            <p>({{$pro -> product_price}})</p>
                                                                            <p>({{$pro -> product_color}})</p>
                                                                            <p>({{$pro -> product_size}})</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                         </div>   
                                                        @endforeach    
                                                    </td>
                                                    <td class="payment-order-khala">{{$order -> payment_method}}</td>
                                                    <td class="total-order-khala">{{$order -> total_price}}</td>
                                                    <td class="day-order-khala">{{$order -> created_at}}</td>
                                                    
                                                </tr>
                                                @endforeach()
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif

                                </div>
                                
                                <div class="tab-pane" id="address">
                                    <p class="mb-2">Thông tin địa chỉ bên dưới dùng cho lúc giao hàng và thanh toán.
                                    </p>
                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <div class="card card-address">
                                                <div class="card-body">
                                                    <h5 class="card-title">Địa chỉ thanh toán</h5>
                                                    <form method = "post" action="{{url('change-address')}}" class="form" >
                                                        @csrf
                                                        
                                                        <label>Tên *</label>
                                                        <input type="text" class="form-control mb-0" name="name" required value="{{$userDetails -> name}}">
                                                        <br />

                                                        <label>Email*</label>
                                                        <input type="email" class="form-control" name="email" required value="{{$userDetails -> email}}">

                                                        <label>Điện thoại *</label>
                                                        <input type="text" class="form-control" name="mobile" required value="{{$userDetails -> mobile}}">

                                                        <label>Tỉnh/Thành phố</label>
                                                        <select class="form-control" name="city">
                                                            <option value="0">Chọn thành phố/tỉnh</option>
                                                            @foreach($citys as $city)
                                                            <option 
                                                            value="{{ $city -> name }}" 
                                                            {{ $city->name  == $userDetails -> city ?"selected":""}}>
                                                            {{ $city -> name }}</option>
                                                            @endforeach       
                                                        </select>

                                                        <label>Quận/huyện</label>
                                                        <input type="text" class="form-control mb-0" name="state" required value="{{$userDetails -> state}}">
                                                        <br />
                                                       <label>Địa chỉ</label>
                                                        <input type="text" class="form-control mb-0" name="address" required value="{{$userDetails -> address}}">

                                                        
                                                        <br />
                                                        <button type="submit" class="btn btn-primary btn-reveal-right">LƯU THAY ĐỔI <i
                                                                class="d-icon-arrow-right"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <div class="card card-address">
                                                <div class="card-body">
                                                    <h5 class="card-title">Địa chỉ giao hàng</h5>
                                                    <form method = "post" action="{{url('change-address-ship')}}" class="form" >
                                                        @csrf
                                                        
                                                        <label>Tên *</label>
                                                        <input type="text" class="form-control mb-0" name="name" required value="{{isset($address_ship -> name)?$address_ship -> name:''}}">
                                                        <br />

                                                        <label>Email*</label>
                                                        <input type="email" class="form-control" name="email" required value="{{isset($address_ship -> user_email)?$address_ship -> user_email:''}}">

                                                        <label>Điện thoại *</label>
                                                        <input type="text" class="form-control" name="mobile" required value="{{isset($address_ship -> mobile)?$address_ship -> mobile:''}}">

                                                        <label>Tỉnh/Thành phố</label>

                                                        <select class="form-control" name="city">
                                                            <option value="0">Chọn thành phố/tỉnh</option>
                                                            @foreach($citys as $city)
                                                                @if(isset($address_ship -> city))
                                                                    <option 
                                                                    value="{{ $city -> name }}" 
                                                                    {{ $city->name  == $address_ship -> city ?"selected":""}}>
                                                                    {{ $city -> name }}
                                                                    </option>
                                                                @else
                                                                     <option 
                                                                    value="{{ $city -> name }}" 
                                                                    >
                                                                    {{ $city -> name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach       
                                                        </select>

                                                        <label>Quận/huyện</label>
                                                        <input type="text" class="form-control mb-0" name="state" required value="{{isset($address_ship -> state)?$address_ship -> state:''}}">
                                                        <br />
                                                       <label>Địa chỉ</label>
                                                        <input type="text" class="form-control mb-0" name="address" required value="{{isset($address_ship -> address)?$address_ship -> address:''}}">

                                                        
                                                        <br />
                                                        <input type="hidden" name="address_id" value="{{isset($address_ship -> id)?$address_ship -> id:''}}">
                                                        <button type="submit" class="btn btn-primary btn-reveal-right">LƯU THAY ĐỔI <i
                                                                class="d-icon-arrow-right"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <form method = "post" action="{{url('change-password')}}" class="form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="old_pass" value="{{$userDetails -> password}}">
                                        <label>Tên *</label>
                                        <input type="text" class="form-control mb-0" name="name" required value="{{$userDetails -> name}}">
                                        

                                        <label>Email*</label>
                                        <input type="email" class="form-control" name="email" required value="{{$userDetails -> email}}">

                                        <label>Mật khẩu hiện tại (Để trống nếu bạn không muốn thay đổi)</label>
                                        <input type="password" class="form-control" name="current_password">

                                        <label>Mật khẩu mới(Để trống nếu bạn không muốn thay đổi)</label>
                                        <input type="password" class="form-control" name="new_password">

                                        @if(!empty($userDetails->image))
                                            <img src="{{ url('uploads/users/' . $userDetails->image) }}" width="200" height="180"/>
                                        @endif

                                        <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                            <label for="image" class="control-label">{{ 'Hình ảnh' }}</label>
                                            <input class="form-control" name="image" type="file" id="image" >
                                            
                                        </div>
                                        

                                        <button type="submit" class="btn btn-primary btn-reveal-right">LƯU THAY ĐỔI <i
                                                class="d-icon-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                        
                       
            </section>
        </main>
    </div>
    @endsection

