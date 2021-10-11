<div class="panel panel-default">
	<div class="panel-heading"><strong class="panel-color-heading" >Nhập thông tin bên dưới</strong></div>
	<div class="panel-body">
		<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
			<label for="name" class="control-label">{{ 'Tên' }}</label>
			<input class="form-control" name="name" type="text" id="name" value="{{ isset($permission->name) ? $permission->name : old('name')}}" required>
			{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
		</div>


		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Thêm mới' }}">
		</div>
	</div>
</div>