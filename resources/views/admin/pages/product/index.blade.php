@extends('admin.layout.app')

@section('title', ' | Liệt kê sản phẩm')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">

@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Sản phẩm</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Sản phẩm</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Danh sách sản phẩm</strong><a href="{{ url('/khalaadmin/products/create') }}" class="btn btn-success btn-sm pull-right" title="Thêm sản phẩm">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a></div>
                <div class="panel-body">

                    @include('admin.includes.flash_message')

                    <form method="GET" action="{{ url('/khalaadmin/products') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                        <!-- tieu de -->
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text"  name="title" class="form-control" placeholder="Tên sản phẩm..." value="{{ request('title') }}">
                        </div>
                        <!-- from price -->
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number"  name="from_price" class="form-control" placeholder="Giá từ..." value="{{ request('from_price') }}">
                        </div>
                        <!-- to price -->
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number"  name="to_price" class="form-control" placeholder="Đến giá..." value="{{ request('to_price') }}">
                        </div>
                        <!-- cdanh mục -->
                        <div class="form-group mx-sm-3 mb-2">
                           <select  name="category_id" style="margin:0px 10px" class="form-control mb-2">
                            <option value="">Chọn danh mục</option>
                            {!! $htmlOption !!}
                        </select>
                        <!-- category search -->
                    </div>

                    <input type="submit" value="Tìm kiếm"  class="btn btn-primary mb-2">
                    <a href="{{ url('/khalaadmin/products') }}" class="btn btn-primary"> Làm mới</a>
                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Kho</th>
                                <th>Danh mục</th>
                                <th>Hiển Thị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)

                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}<br />
                                   
                                </td>

                                <td>
                                    @if(!empty($item->image))

                                    <img src="{{ url('uploads/products-daidien/' . $item->image) }}" width="200" height="200" />
                                    @else
                                    <p> Không có hình ảnh </p>
                                    @endif
                                </td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->amount }}</td>
                                <!-- optional($productItem -> category) dam bao chay ko lỗi khi productItem -> category ko co category tuong ung trong bang category -->
                                <td>{{ optional($item -> category) -> title }}</td>
                                <td>{{ $item -> is_active == 1 ? 'Có':'Không' }}</td>
                                <td>
                                    <!-- Xem -->
                                    <a href="{{ url('/khalaadmin/products/' . $item->id) }}" title="Xem chi tiết"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    <!-- Sửa -->
                                    <a href="{{ url('/khalaadmin/products/' . $item->id . '/edit') }}" title="Sửa slider "><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                    <!-- Xóa -->
                                   <a href="" data-url="{{ route('product.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $products->appends(['search' => Request::get('search')])->render() !!} </div>
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