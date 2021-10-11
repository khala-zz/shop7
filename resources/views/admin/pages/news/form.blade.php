@section('styles')

 <!-- dung tagsinput -->
 <link href=" {{ asset('admins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />

 @endsection
<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">
<!-- tên slider -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Tiêu đề' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($news-> title) ? $news-> title : old('title')}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

 <!-- Danh mục  -->
<div class="form-group {{ $errors->has('cat_news_id') ? 'has-error' : ''}}">
    <label for="cat_news_id" class="control-label">{{ 'Danh mục tin tức' }}</label>
    <select class="form-control" name="cat_news_id" >
        <option value="">Chọn danh mục</option>
        {!! $htmlOption !!}
    </select>
    {!! $errors->first('cat_news_id', '<p class="help-block">:message</p>') !!}
</div>


<!-- Mô tả -->

    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label for="description" class="control-label">{{ 'Mô tả' }}</label>
       <textarea id="description" name="description" class="form-control" >
           {{ isset($news->description) ? $news->description : old('description')}}
       </textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
<!-- content -->

<div class="form-group" {{ $errors->has('content') ? 'has-error' : ''}}>

    <label for="content" class="control-label">{{ 'Nội dung' }}</label>
    <textarea 

    class="form-control tinymce_editor_init @error('content') is-invalid @enderror"
    rows="20"
    name="content">
    {{ isset($news->content) ? $news->content : old('content')}}

</textarea>

</div>

<!-- image -->
@if(isset($news->image_name) && !empty($news->image_name))
    <img src="{{ url('uploads/news/' . $news->image_name) }}" width="200" height="180"/>
@endif

<div class="form-group {{ $errors->has('image_name') ? 'has-error' : ''}}">
    <label for="image_name" class="control-label">{{ 'Hình ảnh' }}</label>
    <input class="form-control" name="image_name" type="file" id="image_name" >
    {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
</div>
<!-- tag -->
<div class="form-group">
  <h5 >Nhập tags cho tin tức</h5>
  <select name = "tags[]"  class="form-control" multiple data-role="tagsinput">
    @if(isset($news -> tags) && !empty($news -> tags))
        @foreach($news -> tags as $newsTagItem)
          <option value="{{ $newsTagItem -> name}}" selected >{{ $newsTagItem -> name }}</option>
        @endforeach
    @else    
        <option value=""></option>
    @endif    
  </select>

</div>  



                      

<!-- is active -->
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="1" {{ $formMode == 'create'?"selected":($news->is_active == 1?"selected":"") }} >Có</option>
                        <option value="0" {{ $formMode == 'edit'?($news->is_active == 0?"selected":""):"" }}>Không</option>
                      </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
</div>

</div>
</div>

@section('scripts')


<script src="{{ url('admins') }}/js/tinymce/tinymce.min.js"></script>
<script src="{{ url('admins') }}/js/tinymce/init_tinymce.js"></script>
<!--tags input -->
    <script src="{{ url('admins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

@endsection


