<!-- tên link -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Tên ' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($link->title) ? $link->title : old('title')}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<!-- link -->
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" name="link" type="text" id="link" value="{{ isset($link->link) ? $link->link : old('link')}}" >
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>

<!-- position -->

<div class="form-group {{ $errors->has('position') ? 'has-error' : ''}}">
    <label  class="control-label">{{ 'Vị trí' }}</label>
    <select name="position" class="form-control" >
        <option value="1" {{ $formMode == 'create'?"selected":($link -> position == 1?"selected":"") }} >Về chúng tôi</option>
        <option value="2" {{ $formMode == 'edit'?($link-> position == 2?"selected":""):"" }}>Thông tin</option>
        <option value="3" {{ $formMode == 'edit'?($link-> position == 3?"selected":""):"" }}>Tài khoản</option>
        <option value="4" {{ $formMode == 'edit'?($link-> position == 4?"selected":""):"" }}>Chính sách</option>
    </select>
    {!! $errors->first('position', '<p class="help-block">:message</p>') !!}
</div>


<!-- is active -->

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
    <select id="is_active" name="is_active" class="form-control" >
        <option value="1" {{ $formMode == 'create'?"selected":($link -> is_active == 1?"selected":"") }} >Có</option>
        <option value="0" {{ $formMode == 'edit'?($link -> is_active == 0?"selected":""):"" }}>Không</option>
    </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>










   





<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
</div>

