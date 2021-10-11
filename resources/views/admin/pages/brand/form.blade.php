<!-- tên nhãn hiệu -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Tên nhãn hiệu' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($brand->title) ? $brand->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<!-- is active -->
<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="0" {{ $formMode == 'create'?"selected":($brand->is_active == 0?"selected":"") }} >Không</option>
                        <option value="1" {{ $formMode == 'edit'?($brand->is_active == 1?"selected":""):"" }}>Có</option>
                      </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>
   

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
</div>

