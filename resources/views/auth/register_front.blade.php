@extends('frontend.layouts.master')
@section('title')
<title>Đăng kí</title>
@endsection

@section('content')
<div class="page-container" id="PageContainer">
    <main class="main-content" id="MainContent" role="main">
        <section class="collection-heading heading-content ">
            <div class="container">
                <div class="row">
                    <div class="collection-wrapper">
                        <h1 class="collection-title"><span>Đăng kí tài khoản</span></h1>
                        <div class="breadcrumb-group">
                            <div class="breadcrumb clearfix">
                                <span >
                                    <a href="{{ url('/') }}" title="Bridal 1" itemprop="url">
                                        <span itemprop="title">Trang chủ</span>
                                    </a>
                                </span>
                                <span class="arrow-space">></span>
                                <span >
                                    
                                        <span itemprop="title">Đăng kí tài khoản</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="register-content">
            <div class="register-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="register-inner">
                            <div id="customer-register">
                                <div id="register" class="">
                                    <form method="post" action="{{ route('front-register') }}" id="create_customer" accept-charset="UTF-8">
                                        @csrf
                                        <div id="first_name1" class="clearfix large_form">
                                            <label for="first_name2" class="label">Tên *</label>
                                            <input type="text" value="{{old('name')}}" name="name" id="first_name2" class="text" size="30"  required>
                                            
                                            {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </div>
                                        
                                        <div id="email1" class="clearfix large_form">
                                            <label for="email2" class="label">Email *</label>
                                            <input type="email" value="{{old('email')}}" name="email" id="email2" class="text" size="30" required>
                                            
                                            {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </div>
                                        <div id="password1" class="clearfix large_form">
                                            <label for="password2" class="label">Mật khẩu * </label>
                                            <input type="password"  name="password" id="password2" class="password text" size="30" required>
                                            
                                            {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        </div>

                                        <div  class="clearfix large_form">
                                            <label for="password2" class="label">Nhập lại mật khẩu * </label>
                                            <input type="password"  name="password_confirmation" id="password2" class="password text" size="30" required>
                                            
                                            {!! $errors->first('password_confirmation', '<p class="help-block" style="color:red;">:message</p>') !!}

                                            
                        
                                        </div>

                                        <div class="action_bottom">
                                            <input class="btn" type="submit" value="Đăng kí"> hoặc
                                            <span class="note"><a href="{{ url('/') }}">Quay về trang chủ</a></span>
                                        </div>
                                    </form>
                                </div>
                                <!-- #register -->
                            </div>
                            <!-- #customer-register -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
{{-- <main class="main">
    <div class="page-content">

        <div class="col-lg-12 col-md-12 col-xs-12">
           
            <form class="ml-lg-2 pt-8 pb-10 pl-4 pr-4 pl-lg-6 pr-lg-6" method="POST" action="{{ route('front-register') }}">
                 @csrf
                <h3 class="ls-m mb-1">Đăng kí tài khoản</h3>
                <p class="text-grey">Các thông tin có dấu * là bắt buộc nhập
                </p>
                <div class="row">
                    
                    <div class="col-md-12 mb-4">
                        <input class="form-control" name = "name" id="name" type="text" placeholder="Tên *" value = "{{old('name')}}"required>
                        {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="email" name = "email" id="email" placeholder="Email *" value = "{{old('email')}}" required>
                        {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="password" name = "password" id="password" placeholder="Mật khẩu *" required>
                        {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="password" name = "password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu *" required>
                        {!! $errors->first('password_confirmation', '<p class="help-block" style="color:red;">:message</p>') !!}
                    </div>


                </div>
                <button type = "submit" class="btn btn-md btn-primary mb-2">Đăng kí</button>
            </form>
        </div>


    </div>
</main> --}}



@endsection

