@extends('admin.layout.app')

@section('title', ' | Liệt kê slider')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Slider</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Slider</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Danh sách slider</strong></div>
            <div class="panel-body">

                @include('admin.includes.flash_message')

                <a href="{{ url('/khalaadmin/sliders/create') }}" class="btn btn-success btn-sm pull-right" title="Add New user">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a>

                <form method="GET" action="{{ url('/khalaadmin/sliders') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">

                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text"  name="filter_by_title" class="form-control" placeholder="Tên slider..." value="{{ request('filter_by_title') }}">

                    </div>
                    <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                    <a href="{{ url('/khalaadmin/sliders') }}" class="btn btn-primary"> Làm mới</a>

                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên slider</th>
                                <th>Mô tả</th>
                                <th>Hình ảnh</th>
                                <th>Hiển thị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $item)

                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td>
                                    @if(!empty($item->image_name))

                                    <img src="{{ url('uploads/sliders/' . $item->image_name) }}"  width="200" height="200" />
                                    @else
                                    <p> Không có hình ảnh </p>
                                    @endif
                                </td>
                                <td>{{ $item -> is_active == 1 ? 'Có':'Không' }}</td>
                                <td>
                                    <!-- Xem -->
                                    <a href="{{ url('/khalaadmin/sliders/' . $item->id) }}" title="Xem chi tiết"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    <!-- Sửa -->
                                    <a href="{{ url('/khalaadmin/sliders/' . $item->id . '/edit') }}" title="Sửa slider "><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                    <!-- Xóa -->
                                   <a href="" data-url="{{ route('slider.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $sliders->appends(['search' => Request::get('search')])->render() !!} </div>
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