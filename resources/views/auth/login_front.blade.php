@extends('frontend.layouts.master')
@section('title')
<title>Thành viên</title>
@endsection

@section('content')
<!-- Main Content -->
<div class="page-container" id="PageContainer">
    <main class="main-content" id="MainContent" role="main">
        <section class="collection-heading heading-content ">
            <div class="container">
                <div class="row">
                    <div class="collection-wrapper">
                        <h1 class="collection-title"><span>Đăng nhập</span></h1>
                        <div class="breadcrumb-group">
                            <div class="breadcrumb clearfix">
                                <span >
                                    <a href="{{ url('/') }}" title="Bridal 1" itemprop="url">
                                        <span itemprop="title">Trang chủ</span>
                                    </a>
                                </span>
                                <span class="arrow-space">></span>
                                <span >
                                    
                                        <span itemprop="title">Đăng nhập</span>
                                    
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="login-content">
            <div class="login-content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="login-content-inner">
                            <div id="customer-login">
                                @if($errors)
                                    <div class="col-md-12 mb-4">
                                       
                                        {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}
                                        {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}
                                    </div>
                                    <br />
                                @endif
                                <div id="login" class="">
                                    <form id="customer_login1" method="post" action="{{ route('front-login') }}" accept-charset="UTF-8">
                                        @csrf
                                        <br />
                                        <label for="customer_email" class="label">Email *</label>
                                        <input type="email" name="email" id="customer_email" class="text" value = "{{old('email')}}" required>
                                        <label for="customer_password" class="label">Mật khẩu *</label>
                                        <input type="password"  name="password" id="customer_password" class="text" size="16" required>
                                        
                                        <div class="action_bottom">
                                            <input class="btn" type="submit" value="Đăng nhập">
                                            <a href="#" onclick="showRecoverPasswordForm();return false;">Quên mật khẩu?</a>
                                        </div>
                                    </form>
                                </div>
                                <div id="recover-password" style="display:none;" class="">
                                    <h2>Reset Password</h2>
                                    <p class="note">We will send you an email to reset your password.</p>
                                    <form method="post">
                                        <input type="hidden" value="recover_customer_password" name="form_type">
                                        <input type="hidden" name="utf8" value="✓">
                                        <label class="label">Email</label>
                                        <input type="email" value="" size="30" name="email" id="recover-email" class="text">
                                        <div class="action_bottom">
                                            <input class="btn" type="submit" value="Submit"> or
                                            <span class="note"><a href="#" onclick="hideRecoverPasswordForm();return false;">Cancel</a></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            function showRecoverPasswordForm() {
                document.getElementById('recover-password').style.display = 'block';
                document.getElementById('login').style.display = 'none';
            }

            function hideRecoverPasswordForm() {
                document.getElementById('recover-password').style.display = 'none';
                document.getElementById('login').style.display = 'block';
            }

            if (window.location.hash == '#recover') {
                showRecoverPasswordForm()
            }
        </script>
    </main>
</div>

<!-- Breadcrumb Area End -->
<!-- login area start -->
{{-- <div class="login-register-area mb-60px mt-53px">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="{{Request::get('login') == 1?'active':''}}" data-toggle="tab" href="#lg1">
                            <h4>Đăng nhập</h4>
                        </a>
                        <a class="{{Request::get('login') == 0?'active':''}}" data-toggle="tab" href="#lg2">
                            <h4>Đăng kí</h4>
                        </a>
                    </div>
                    @if($errors)
                        <div class="col-md-12 mb-4">
                           
                            {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}
                            {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}
                        </div>
                    @endif
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane {{Request::get('login') == 1?'active':''}}">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('front-login') }}">
                                        @csrf
                                        
                                       <input type="email" name = "email"  placeholder="Email *" value = "{{old('email')}}" required>
                                       <input type="password" name = "password"  placeholder="Mật khẩu *" required>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" />
                                                <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Đăng nhập</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane {{Request::get('login') == 0?'active':''}}">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('front-register') }}">
                                        @csrf
                                        <input name = "name" id="name" type="text" placeholder="Tên *" value = "{{old('name')}}"required>
                                        {!! $errors->first('name', '<p class="help-block" style="color:red;">:message</p>') !!}

                                        <input type="email" name = "email"  placeholder="Email *" value = "{{old('email')}}" required>
                                        {!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}

                                        <input type="password" name = "password"  placeholder="Mật khẩu *" required>
                                        {!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}

                                        <input type="password" name = "password_confirmation"  placeholder="Nhập lại mật khẩu *" required>
                                        {!! $errors->first('password_confirmation', '<p class="help-block" style="color:red;">:message</p>') !!}

                                        <div class="button-box">
                                            <button type="submit"><span>Đăng kí</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}




@endsection

