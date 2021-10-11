@extends('admin.layout.app')

@section('title', ' | Liệt kê danh mục sản phẩm')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Danh mục sản phẩm</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Danh mục sản phẩm</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Danh sách danh mục sản phẩm</strong></div>
                <div class="panel-body">

                    @include('admin.includes.flash_message')

                    <a href="{{ url('/khalaadmin/categories/create') }}" class="btn btn-success btn-sm pull-right" title="Add New user">
                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                    </a>

                    <form method="GET" action="{{ url('/khalaadmin/categories') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">


                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text"  name="filter_by_title" class="form-control" placeholder="Tên danh mục..." value="{{ request('filter_by_title') }}">

                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                         <select  name="filter_by_parent_id" style="margin:0px 10px" class="form-control mb-2">
                            <option value="">Chọn danh mục cha</option>
                            {!! $htmlOption !!}
                        </select>
                        <!-- category search -->
                        </div>

                    <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                    <a href="{{ url('/khalaadmin/categories') }}" class="btn btn-primary"> Làm mới</a>


                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên danh mục</th>
                                <th>Tên danh mục cha</th>
                                <th>Các đặc tính</th>
                                <th>Hiển thị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $item)
                            <?php
                            $parent_cates = DB::table('categories')->select('title')->where('id',$item->parent_id)->get();
                            ?>
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <?php if($item -> parent_id != 0){?>
                                    @foreach($parent_cates as $parent_cate)
                                    {{$parent_cate->title}}
                                    @endforeach
                                    <?php 
                                }else{
                                    echo 'Không có danh mục cha';
                                }
                                ?>
                            </td>
                            <td>{{ $item -> featured == 1 ? 'Có':'Không' }}</td>
                            <td>{{ $item -> is_active == 1 ? 'Có':'Không' }}</td>
                            
                            
                            <td>

                                <!-- Xem -->
                                <a href="{{ url('/khalaadmin/categories/' . $item->id) }}" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                <!-- Sửa -->
                                <a href="{{ url('/khalaadmin/categories/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                <!-- Xóa -->
                                   <a href="" data-url="{{ route('category.delete',['id' => $item -> id]) }}" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper"> {!! $categories->appends(['search' => Request::get('search')])->render() !!} </div>
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