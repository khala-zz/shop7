@extends('admin.layout.app')

@section('title', ' | Tạo sản phẩm')
@section('styles')
<link href="{{ url('admins/css/product/main.css') }}" rel="stylesheet">

@endsection
@section('content')

<section class="content-header">
   <div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading" >Sản phẩm</strong></div>
    <div class="panel-body">
        <h1>
            Thêm mới
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="{{ url('/khalaadmin/products') }}"> Sản phẩm</a></li>
            <li class="active">Thêm mới</li>
        </ol>
        <a href="{{ url('/khalaadmin/products') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
    </div>
</div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Nhập các thông tin bên dưới</strong></div>
                <div class="panel-body">

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ url('/khalaadmin/products') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf

                        @include ('admin.pages.product.form', ['formMode' => 'create'])

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection