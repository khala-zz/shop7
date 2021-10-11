@extends('admin.layout.app')

@section('title', ' | Hiển thị chi tiết sản phẩm')

@section('styles')
<link href="{{ asset('admins/css/sweetalert.css') }}" rel="stylesheet">
@endsection

@section('content')

    <section class="content-header">
        <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Sản phẩm</strong></div>
        <div class="panel-body">
        <h1>
            Sản phẩm <strong class="panel-color-id" >#{{ $product->id }}</strong>

        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="{{ url('/khalaadmin/products') }}">Danh sách sản phẩm </a></li>
            <li class="active">Hiện</li>
        </ol>
        <a href="{{ url('/khalaadmin/products') }}" title="Quay lại"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

                        <a href="{{ url('/khalaadmin/products/' . $product->id . '/edit') }}" title="Sửa sản phẩm"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

                        <!-- Xóa -->
                                  

                        <form method="POST" action="{{ url('khalaadmin/products' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Xóa sản phẩm" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                        </form>
    </div></div>
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
                                        <th width="50%">ID</th><td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Tên sản phẩm </th><td> {{ $product -> title }} </td>
                                    </tr>
                                    <tr>
                                        <th> Mã sản phẩm </th><td> {{ $product -> product_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Sản phẩm mới ? </th><td> {{ $product -> new == 1 ? 'Có':'Không' }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nổi bật ? </th><td> {{ $product -> noi_bat == 1 ? 'Có':'Không' }} </td>
                                    </tr>
                                    <tr>
                                        <th> Thịnh hành ? </th><td> {{ $product -> trend == 1 ? 'Có':'Không' }} </td>
                                    </tr>
                                    <tr>
                                        <th> Số lượng </th><td> {{ $product -> amount }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nhãn hiệu </th><td> {{ isset($product -> brand -> title)?$product -> brand -> title:"Không có nhãn hiệu" }} </td>
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
                                        <th> Danh mục sản phẩm </th><td> {{  isset($product -> category -> title)?$product -> category -> title:"Không có danh mục" }} </td>
                                    </tr>
                                    <tr>
                                        <th> Các đặc tính </th>
                                        <td> 
            
                                            @if($product -> features->isEmpty())
                                                <p>Không có đặc tính</p>
                                            @else
                                                @foreach($product -> features as $feature)
                                                {{ $feature -> field_value }}---
                                                @endforeach
                                            @endif 
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
@section('scripts')

<!-- Sweet-Alert  -->
<script src="{{asset('admins/js/sweetalert.min.js')}}"></script>
<script src="{{asset('admins/js/jquery.sweet-alert.custom.js')}}"></script>

@endsection