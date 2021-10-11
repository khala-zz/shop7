@extends('admin.layout.app')

@section('title', ' | Edit My Profile')

@section('content')


    <section class="content-header">
        <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
        <div class="panel-body">
        <h1>
            Sửa trang cá nhân
        </h1>
        <a href="{{ url('/khalaadmin/my-profile') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
    </div>
</div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Nhập các thông tin bên dưới</strong></div>
        <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/khalaadmin/my-profile/edit/') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="control-label">{{ 'Tên' }}</label>
                                <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}" >
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email" class="control-label">{{ 'Email' }}</label>
                                <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : ''}}" >
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                <label for="password" class="control-label">{{ 'Mật khẩu' }}</label>
                                <input class="form-control" name="password" type="password" id="password" value="" >
                                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                            </div>
                            

                            @if(!empty($user->image))
                                <img src="{{ url('uploads/users/' . $user->image) }}" width="200" height="180"/>
                            @endif

                            <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                                <label for="image" class="control-label">{{ 'Hình ảnh' }}</label>
                                <input class="form-control" name="image" type="file" id="image" >
                                {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Cập nhật">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection