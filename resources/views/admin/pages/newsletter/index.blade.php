@extends('admin.layout.app')

@section('title', ' | Liệt kê email')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Email Newsletters</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Newsletter</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Danh sách email newsletter</strong></div>
            <div class="panel-body">

                @include('admin.includes.flash_message')

                <form method="GET" action="{{ url('/khalaadmin/newsletters') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">

                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text"  name="filter_by_title" class="form-control" placeholder="Tên..." value="{{ request('filter_by_title') }}">

                    </div>
                    <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                    <a href="{{ url('/khalaadmin/newsletters') }}" class="btn btn-primary"> Làm mới</a>

                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($newsletters as $item)

                            <tr>
                                <td>{{ $item->id }}</td>
                                
                                <td>
                                   {{ $item->email }}
                                </td>
                                <td>
                                    
                                    @if($item -> status == 1)
                                        <a href="{{ url('/khalaadmin/newsletters/xuly/' . $item -> id.'/0') }}" title="Đã xử lý"><button class="btn btn-success btn-sm"> Đã xử lý</button></a>
                                    @else
                                        <a href="{{ url('/khalaadmin/newsletters/xuly/' . $item -> id.'/1') }}" title="Chưa xử lý"><button class="btn btn-warning btn-sm"> Chưa xử lý</button></a>
                                    @endif
                                </td>
                                <td>
                                    <!-- Xóa -->
                                   <a href="" data-url="{{ route('newsletter.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                </td>
                            </tr>
                            @empty
                                <tr><td colspan="4">Chưa có dữ liệu</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $newsletters->appends(['search' => Request::get('search')])->render() !!} </div>
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