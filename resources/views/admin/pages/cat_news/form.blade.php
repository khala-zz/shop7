<!-- tên danh mục -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Tên Danh mục' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($cat_news->title) ? $cat_news->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>


                                   
<!-- Danh mục cha -->
<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Danh mục tin tức cha' }}</label>
    <select class="form-control" name="parent_id">
        <option value="">Chọn danh mục cha</option>
        {!! $htmlOption !!}
    </select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>
<!-- image -->
@if(isset($cat_news->image) && !empty($cat_news->image))
    <img src="{{ url('uploads/cat_news/' . $cat_news->image) }}" width="200" height="180"/>
@endif

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Hình ảnh' }}</label>
    <input class="form-control" name="image" type="file" id="image" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<!-- Mô tả -->

    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label for="description" class="control-label">{{ 'Mô tả' }}</label>
       <textarea id="description" name="description" class="form-control" >
           {{ isset($cat_news->description) ? $cat_news->description : old('description')}}
       </textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>


                      

<!-- is active -->


<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="1" {{ $formMode == 'create'?"selected":($cat_news->is_active == 1?"selected":"") }} >Có</option>
                        <option value="0" {{ $formMode == 'edit'?($cat_news->is_active == 0?"selected":""):"" }}>Không</option>
                      </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>










   





<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
</div>

