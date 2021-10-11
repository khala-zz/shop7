@extends('admin.layout.app')

@section('title', ' | Liệt kê các đánh giá')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Đánh giá</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Các đánh giá</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Danh sách đánh giá</strong></div>
                <div class="panel-body">

                    @include('admin.includes.flash_message')

                   

                    <form method="GET" action="{{ url('/khalaadmin/reviews') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">

                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text"  name="ma_order" class="form-control" placeholder="Đánh giá..." value="{{ request('content') }}">

                        </div>
                        <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                        <a href="{{ url('/khalaadmin/reviews') }}" class="btn btn-primary"> Làm mới</a>

                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Thành viên</th>
                                    <th>Sản phẩm</th>
                                    <th>Đánh giá</th>
                                    <th>Bình luận</th>
                                    <th>Ngày đánh giá</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user -> name }}</td>
                                    <td>{{ $item->product -> title }}</td>
                                    <td>{{ $item->rating }}</td>
                                    <td>{{ $item -> comment }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    
                                    <td>
                                        
                                         <!-- xóa -->
                                    <a href="" data-url="{{ route('review.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $reviews->appends(['search' => Request::get('search')])->render() !!} </div>
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