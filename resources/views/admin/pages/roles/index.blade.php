@extends('admin.layout.app')

@section('title', ' | List Roles')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Vai trò</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Vai trò</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Danh sách vai trò</strong></div>
            <div class="panel-body">

                @include('admin.includes.flash_message')

                <a href="{{ url('/khalaadmin/roles/create') }}" class="btn btn-success btn-sm pull-right" title="Add New role">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a>

                <form method="GET" action="{{ url('/khalaadmin/roles') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Từ khóa..." value="{{ request('search') }}">
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
                                <th>#</th><th>Tên</th><th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ url('/khalaadmin/roles/' . $item->id) }}" title="View role"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    <a href="{{ url('/khalaadmin/roles/' . $item->id . '/edit') }}" title="Edit role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

                                    <!-- Xóa -->
                                   <a href="" data-url="{{ route('role.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $roles->appends(['search' => Request::get('search')])->render() !!} </div>
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