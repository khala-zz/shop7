@extends('admin.admin')

@section('title')
    <title>Chỉnh sửa Menu</title>
@endsection

@section('content')
    <div class="container-fluid">
        @include('admin.content-header',['name' => 'Menu','key' => 'Sửa','link' => 'menu.index',
        'text_button' => 'Danh sách'])
        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Sửa Menu</h3>
                    <p class="text-muted m-b-30 font-13"> Điền đầy đủ thông tin bên dưới </p>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6">
                            <form action="{{ route('menu.update',['id' => $menu -> id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label> Tên menu</label>
                                    <input type="text" value ="{{ $menu -> name}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên danh mục">
                                    @error('name')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label >Menu cha</label>
                                    <select class="form-control" name="parent_id">
                                        <option value="0">Chọn Menu cha</option>
                                        {!! $htmlOption !!}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label >Trạng thái</label>
                                    <div >
                                        <input type="radio"  name="status"  value="0" {{ $menu -> status == 0?'checked':''}}>
                                        <label  >Ẩn</label>
                                    </div>
                                    <div >
                                        <input type="radio"  name="status"  value="1" {{ $menu -> status == 1?'checked':''}}>
                                        <label >Hiện</label>
                                    </div>
                                </div>
                                @error('status')
                                        <div class="alert alert-danger khala-alert">
                                            {{ $message }}
                                        </div>
                                @enderror

                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                <a href="{{ route('menu.index') }}" class="btn waves-effect waves-light btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection