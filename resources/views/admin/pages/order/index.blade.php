@extends('admin.layout.app')

@section('title', ' | Liệt kê các đơn hàng')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Đơn hàng</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Các đơn hàng</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Danh sách đơn hàng</strong></div>
                <div class="panel-body">

                    @include('admin.includes.flash_message')

                   

                    <form method="GET" action="{{ url('/khalaadmin/orders') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">

                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text"  name="ma_order" class="form-control" placeholder="Mã đơn hàng..." value="{{ request('ma_order') }}">

                        </div>
                        <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                        <a href="{{ url('/khalaadmin/orders') }}" class="btn btn-primary"> Làm mới</a>

                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Khách hàng</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->ma_order }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item -> status == 'Đang xử lý' ? 'Đang xử lý':'Hoàn thành' }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    
                                    <td>
                                        <!-- Sửa -->
                                        <a href="{{ url('/khalaadmin/orders/' . $item->id . '/edit') }}" title="Sửa setting"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                         <!-- xóa -->
                                    <a href="" data-url="{{ route('order.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>
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