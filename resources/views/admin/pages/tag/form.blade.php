<!-- tên tag -->
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Tên tag' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($tag->name) ? $tag->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
</div>

