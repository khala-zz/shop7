@extends('admin.layout.app')

@section('title', ' | Hiển thị chi tiết sản phẩm')

@section('content')

    <section class="content-header">
        <h1>
            Sản phẩm #{{ $product->id }}

        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="{{ url('/khalaadmin/products') }}">Danh sách sản phẩm </a></li>
            <li class="active">Hiện</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        

                        <a href="{{ url('/khalaadmin/products') }}" title="Quay lại"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

                        <a href="{{ url('/khalaadmin/products/' . $product->id . '/edit') }}" title="Sửa sản phẩm"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

                        
                        <form method="POST" action="{{ url('khalaadmin/products' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Xóa sản phẩm" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                        </form>
                        
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <th>ID</th><td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Tên sản phẩm </th><td> {{ $product -> title }} </td>
                                    </tr>
                                    <tr>
                                        <th> Mã sản phẩm </th><td> {{ $product -> product_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Số lượng </th><td> {{ $product -> amount }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nhãn hiệu </th><td> {{ $product -> brand -> title }} </td>
                                    </tr>
                                    <tr>
                                        <th> Hình ảnh đại diện </th>
                                        
                                        <td> 
                                            <img src="{{ url('uploads/products-daidien/' . $product->image) }}" width="200" height="200" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Giá </th><td> {{ $product -> price }} </td>
                                    </tr>
                                    <tr>
                                        <th> Giảm giá </th><td> {{ $product -> discount }} </td>
                                    </tr>
                                    <tr>
                                        <th> Ngày bắt đầu giảm giá </th><td> {{ $product -> discount_start_date }} </td>
                                    </tr>
                                    <tr>
                                        <th> Ngày kết thúc giảm giá </th><td> {{ $product -> discount_end_date }} </td>
                                    </tr>
                                    <tr>
                                        <th> Danh mục sản phẩm </th><td> {{ $product -> category -> title }} </td>
                                    </tr>
                                    <tr>
                                        <th> Các đặc tính </th>
                                        <td> 
                                            @foreach($product -> features as $feature)
                                            {{ $feature -> field_value }}---
                                            @endforeach 
                                        </td>
                                    </tr>
                                    
                                    <tr><th> Mô tả </th><td> {{ $product->description }} </td> 
                                       
                                    </tr>
                                    <tr>
                                        <th> Gallery </th>
                                        
                                        <td> 
                                             @foreach($product -> gallery as $image_gallery)
                                           
                                            <img src="{{ url('uploads/'.$product -> id.'/small/' . $image_gallery->image) }}"  width="100" height="100" />
                                            @endforeach 
                                            
                                        </td>
                                    </tr>
                                   
                                    
                                    <tr><th> Hiển thị </th><td> {{ $product -> is_active == 1 ? 'Có':'Không' }} </td>
                                    <tr><th> Hiển thị các đặc tính </th><td> {{ $product -> featured == 1 ? 'Có':'Không' }} </td>    
                                    
                                   
                                    
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection