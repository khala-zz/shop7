@extends('admin.layout.app')

@section('title', ' | Hiển thị chi tiết tin tức')

@section('content')

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tin tức</strong></div>
        <div class="panel-body">
            <h1>
                Tin tức <strong class="panel-color-id" >#{{ $news->id }}</strong>

            </h1>

            <ol class="breadcrumb">
                <li><a href="{{ url('/khalaadmin/') }}"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li><a href="{{ url('/khalaadmin/news') }}">Tin tức </a></li>
                <li class="active">Hiện</li>
            </ol>
            <a href="{{ url('/khalaadmin/news') }}" title="Quay lại"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

            <a href="{{ url('/khalaadmin/news/' . $news->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>


            <form method="POST" action="{{ url('khalaadmin/news' . '/' . $news->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Xóa tin tức" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
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
                                    <th width="50%">ID</th><td>{{ $news->id }}</td>
                                </tr>
                                <tr>
                                    <th> Tiêu đề </th><td> {{ $news->title }} </td>
                                </tr>

                                <tr>
                                        <th> Danh mục tin tức</th><td> {{  isset($news -> cat_news -> title)?$news -> cat_news -> title:"Không có danh mục" }} </td>
                                    </tr>

                                <tr>
                                    <th> Hình ảnh </th>

                                    <td> 
                                        <img src="{{ url('uploads/news/' . $news->image_name) }}"  width="200" height="200" />
                                    </td>
                                </tr>
                                <tr>
                                    <th> Mô tả </th><td> {{ $news->description }} </td> 

                                </tr>
                                <tr>
                                    <th> Nội dung </th><td> {!! $news->content !!} </td> 

                                </tr>

                                <tr><th> Hiển thị </th><td> {{ $news -> is_active == 1 ? 'Có':'Không' }} </td></tr>

                            </tbody>
                        </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection