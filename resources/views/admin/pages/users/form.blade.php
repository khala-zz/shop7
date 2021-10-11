 <div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading" >Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="name" class="control-label">{{ 'Tên' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : old('name')}}" >
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>

        <!-- email -->
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label for="email" class="control-label">{{ 'Email' }}</label>
            <input class="form-control" name="email" type="text" id="email" value="{{ isset($user->email) ? $user->email : old('email')}}" >
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
        <!-- mat khau -->
        @if($formMode == 'create')
        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <label for="password" class="control-label">{{ 'Mật khẩu' }}</label>
            <input class="form-control" name="password" type="password" id="password" value="{{ isset($user->password) ? $user->password : ''}}" >
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
        @endif

        <!-- image -->
        @if(isset($user->image) && !empty($user->image))
        <img src="{{ url('uploads/users/' . $user->image) }}" width="200" height="180"/>
        @endif

        <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
            <label for="image" class="control-label">{{ 'Hình ảnh' }}</label>
            <input class="form-control" name="image" type="file" id="image" >
            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        </div>

        @if($formMode == 'create' || ($formMode == 'edit' && $user->is_admin == 0))
        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
            <label for="is_active" class="control-label">
                <input type="checkbox" name="is_active" id="is_active" value="1" class="minimal" {{ $formMode == 'create'?"checked":($user->is_active == 1?"checked":"") }}>
                {{ 'Hiện / Ẩn' }}
            </label>
            {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
        </div>
        @endif

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
        </div>
    </div>
</div>