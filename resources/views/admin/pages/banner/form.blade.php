<!-- tên banner -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Tên Banner' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($banner->title) ? $banner->title : old('title')}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<!-- link -->
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="link" type="text" id="link" value="{{ isset($banner->link) ? $banner->link : old('link')}}" >
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>


<!-- image -->
@if(isset($banner->image) && !empty($banner->image))
    <img src="{{ url('uploads/banners/' . $banner->image) }}" width="200" height="180"/>
@endif

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Hình ảnh' }}</label>
    <input class="form-control" name="image" type="file" id="image" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<!-- is active -->

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="1" {{ $formMode == 'create'?"selected":($banner->is_active == 1?"selected":"") }} >Có</option>
                        <option value="0" {{ $formMode == 'edit'?($banner->is_active == 0?"selected":""):"" }}>Không</option>
                      </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>










   





<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
</div>

