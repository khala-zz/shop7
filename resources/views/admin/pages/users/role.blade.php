@extends('admin.layout.app')

@section('title', ' | Select role')

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
        <div class="panel-body">
            <h1>
                Chọn vai trò
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li><a href="{{ url('/khalaadmin/users') }}"> Tài khoản </a></li>
                <li class="active">Chọn vai trò</li>
            </ol>
            <a href="{{ url('/khalaadmin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản : {{$user -> name}}</strong></div>
                <div class="panel-body">
                    
                    

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ url('/khalaadmin/users/role/' . $user->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
                            <label for="role_id" class="control-label">{{ 'Vai trò' }}</label>

                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">Chọn vai trò</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ isset($user->roles[0]) && $role->id == $user->roles[0]->id?"selected":"" }}>{{ $role->name }}</option>
                                @endforeach
                            </select>

                            {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
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