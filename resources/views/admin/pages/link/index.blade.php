@extends('admin.layout.app')

@section('title', ' | Liệt kê Link')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Các liên kết</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Liên kết</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Danh sách liên kết</strong></div>
                <div class="panel-body">

                    @include('admin.includes.flash_message')

                    <a href="{{ url('/khalaadmin/links/create') }}" class="btn btn-success btn-sm pull-right" title="Add New user">
                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                    </a>

                    <form method="GET" action="{{ url('/khalaadmin/links') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">


                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text"  name="filter_by_title" class="form-control" placeholder="Tên banner..." value="{{ request('filter_by_title') }}">

                        </div>
                       

                    <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                    <a href="{{ url('/khalaadmin/links') }}" class="btn btn-primary"> Làm mới</a>


                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên </th>                               
                                <th>Link</th>
                                <th>Vị trí</th>
                                <th>Hiển thị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($links as $item)
                           
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                     {{ $item->link }}
                                </td>
                                <td>

                                    @if( $item -> position == 1 )
                                        Về chúng tôi
                                    @elseif( $item -> position == 2 )
                                        Thông tin
                                    @elseif( $item -> position == 3 )
                                        Tài khoản
                                    @else
                                        Chính sách
                                    @endif

                                </td>
                                <td>{{ $item -> is_active == 1 ? 'Có':'Không' }}</td>
                                <td>

                                   
                                    <!-- Sửa -->
                                    <a href="{{ url('/khalaadmin/links/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                    <!-- Xóa -->
                                    <a href="" data-url="{{ route('link.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                    
                                </td>
                        </tr>
                        @empty
                        <tr><td colspan="6"> Chưa có banner</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $links->appends(['search' => Request::get('search')])->render() !!} </div>
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