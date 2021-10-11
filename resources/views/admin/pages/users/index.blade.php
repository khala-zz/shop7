@extends('admin.layout.app')

@section('title', ' | List users')
@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách tài khoản
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Tài khoản</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
            <div class="panel-body">

                @include('admin.includes.flash_message')

                <a href="{{ url('/khalaadmin/users/create') }}" class="btn btn-success btn-sm pull-right" title="Add New user">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a>

                <form method="GET" action="{{ url('/khalaadmin/users') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tài khoản..." value="{{ request('search') }}">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>

                                <th>Admin</th>
                                <th>Active / Banned</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>

                                <td>{!! $item->is_admin == 1? '<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>' !!}</td>
                                <td>{!! $item->is_active == 1? '<i class="fa fa-check"></i>':'<i class="fa fa-ban"></i>' !!}</td>
                                <td>@if(isset($item->roles[0])) <span class="label label-success">{{ $item->roles[0]->name }}</span> @endif</td>
                                <td>
                                    <a href="{{ url('/khalaadmin/users/' . $item->id) }}" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    <a href="{{ url('/khalaadmin/users/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

                                    <a href="{{ url('/khalaadmin/users/role/' . $item->id) }}" title="Select role"><button class="btn bg-purple btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Chọn vai trò</button></a>

                                    @if($item->is_admin == 0)
                                    <!-- Xóa -->
                                   <a href="" data-url="{{ route('user.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('scripts')

<!-- Sweet-Alert  -->
<script src="{{asset('admins/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admins/js/jquery.sweet-alert.custom.js')}}"></script>

@endsection