@extends('admin.layout.app')

@section('title', ' | Hiển thị chi tiết danh mục sản phẩm')

@section('content')

<section class="content-header">
   <div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading" >Danh mục sản phẩm</strong></div>
    <div class="panel-body">
        <h1>
            Danh mục sản phẩm <strong class="panel-color-id" >#{{ $category->id }}</strong>

        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="{{ url('/khalaadmin/categories') }}"> Danh mục sản phẩm </a></li>
            <li class="active">Hiện</li>
        </ol>
        <a href="{{ url('/khalaadmin/categories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

        <a href="{{ url('/khalaadmin/categories/' . $category->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

        
        <form method="POST" action="{{ url('khalaadmin/categories' . '/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Xóa danh mục sản phẩm" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
        </form>
    </div>
</div>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Thông tin chi tiết</strong></div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>

                            <tr>
                                <th>ID</th><td>{{ $category->id }}</td>
                            </tr>
                            <tr><th> Tên </th><td> {{ $category->title }} </td></tr>
                            <tr>
                                <th> Tên danh mục cha </th>
                                <?php
                                $parent_cates = DB::table('categories')->select('title')->where('id',$category->parent_id)->get();
                                ?>
                                <td> 
                                    <?php if($category -> parent_id != 0){?>
                                    @foreach($parent_cates as $parent_cate)
                                    {{$parent_cate->title}}
                                    @endforeach
                                    <?php 
                                }else{
                                    echo 'Không có danh mục cha';
                                }
                                ?> 
                            </td>
                        </tr>
                        <tr>
                            <th> Hình ảnh </th>
                            
                            <td> 
                                <img src="{{ url('uploads/categories/' . $category->image) }}"  width="200" height="200" />
                            </td>
                        </tr>


                        <tr><th> Mô tả </th><td> {{ $category->description }} </td> 
                         
                        </tr>

                        
                        <tr><th> Hiển thị </th><td> {{ $category -> is_active == 1 ? 'Có':'Không' }} </td>
                            <tr><th colspan="2">Các đặc tính</th></tr>
                            
                            @foreach($category -> features as $feature)
                            <tr><td></td><td>{{ $feature -> field_title }}</td></tr>
                            
                            @endforeach
                            
                            
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
@endsection