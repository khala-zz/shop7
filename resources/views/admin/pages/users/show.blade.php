@extends('admin.layout.app')

@section('title', ' | Show user')

@section('content')

    <section class="content-header">
        <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
        <div class="panel-body">
        <h1>
            Tài khoản <strong class="panel-color-id" >#{{ $user->id }}</strong>
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="{{ url('/khalaadmin/users') }}"> Tài khoản </a></li>
            <li class="active">Hiện</li>
        </ol>
        <a href="{{ url('/khalaadmin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

                        <a href="{{ url('/khalaadmin/users/' . $user->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

                        @if($user->is_admin == 0)
                            <form method="POST" action="{{ url('khalaadmin/users' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete user" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                            </form>
                        @endif
    </div>
</div>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Thông tin chi tiết</strong></div>
        <div class="panel-body">

                        @include('admin.includes.flash_message')

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    @if(!empty($user->image))
                                        <tr>
                                            <td>
                                                <img src="{{ url('uploads/users/' . $user->image) }}" class="pull-right" width="200" height="200" />
                                            </td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <th>ID</th><td>{{ $user->id }}</td>
                                    </tr>
                                    <tr><th> Tên </th><td> {{ $user->name }} </td>
                                    </tr><tr><th> Email </th><td> {{ $user->email }} </td></tr>
                                    
                                    <tr><th> Is Admin </th><td> {!! $user->is_admin == 1? '<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' !!} </td></tr>
                                    <tr><th> Is Active </th><td> {!! $user->is_active == 1? '<i class="fa fa-check"></i>':'<i class="fa fa-ban"></i>' !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection