<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">
<!-- tên slider -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Tên Slider' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($slider->name) ? $slider->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<!-- tên 2 slider -->
<div class="form-group {{ $errors->has('nametwo') ? 'has-error' : ''}}">
    <label for="nametwo" class="control-label">{{ 'Tên Slider 2' }}</label>
    <input class="form-control" name="nametwo" type="text" id="nametwo" value="{{ isset($slider->nametwo) ? $slider->nametwo : old('nametwo')}}" >
    {!! $errors->first('nametwo', '<p class="help-block">:message</p>') !!}
</div>
<!-- tên 3 slider -->
<div class="form-group {{ $errors->has('namethree') ? 'has-error' : ''}}">
    <label for="namethree" class="control-label">{{ 'Tên Slider 3' }}</label>
    <input class="form-control" name="namethree" type="text" id="namethree" value="{{ isset($slider->namethree) ? $slider->namethree : old('namethree')}}" >
    {!! $errors->first('namethree', '<p class="help-block">:message</p>') !!}
</div>

<!-- tên 4 slider -->
<div class="form-group {{ $errors->has('namefour') ? 'has-error' : ''}}">
    <label for="namefour" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="namefour" type="text" id="namefour" value="{{ isset($slider->namefour) ? $slider->namefour : old('namefour')}}" >
    {!! $errors->first('namefour', '<p class="help-block">:message</p>') !!}
</div>

<!-- Mô tả -->

    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label for="description" class="control-label">{{ 'Mô tả' }}</label>
       <textarea id="description" name="description" class="form-control" >
           {{ isset($slider->description) ? $slider->description : old('description')}}
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
    {{ isset($slider->content) ? $slider->content : old('content')}}

</textarea>

</div>

<!-- image -->
@if(isset($slider->image_name) && !empty($slider->image_name))
    <img src="{{ url('uploads/sliders/' . $slider->image_name) }}" width="200" height="180"/>
@endif

<div class="form-group {{ $errors->has('image_name') ? 'has-error' : ''}}">
    <label for="image_name" class="control-label">{{ 'Hình ảnh' }}</label>
    <input class="form-control" name="image_name" type="file" id="image_name" >
    {!! $errors->first('image_name', '<p class="help-block">:message</p>') !!}
</div>
                      

<!-- is active -->
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="0" {{ $formMode == 'create'?"selected":($slider->is_active == 0?"selected":"") }} >Không</option>
                        <option value="1" {{ $formMode == 'edit'?($slider->is_active == 1?"selected":""):"" }}>Có</option>
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

@endsection


