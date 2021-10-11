<!-- tên danh mục -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Tên Danh mục' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($category->title) ? $category->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>


                                   
<!-- Danh mục cha -->
<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Danh mục sản phẩm cha' }}</label>
    <select class="form-control" name="parent_id">
        <option value="">Chọn danh mục cha</option>
        {!! $htmlOption !!}
    </select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>
<!-- image -->
@if(isset($category->image) && !empty($category->image))
    <img src="{{ url('uploads/categories/' . $category->image) }}" width="200" height="180"/>
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
           {{ isset($category->description) ? $category->description : old('description')}}
       </textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>


                      

<!-- is active -->


<div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
    <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
    <select id="is_active" name="is_active" class="form-control" >
                        <option value="0" {{ $formMode == 'create'?"selected":($category->is_active == 0?"selected":"") }} >Không</option>
                        <option value="1" {{ $formMode == 'edit'?($category->is_active == 1?"selected":""):"" }}>Có</option>
                      </select>
    {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
</div>
<!-- feature -->


<div class="form-group {{ $errors->has('featured') ? 'has-error' : ''}}">
    <label for="featured" class="control-label">{{ 'Đặc tính' }}</label>
    <select id="featured" name="featured" class="form-control" v-model="featured">
                        <option value="1" {{ $formMode == 'create'?"selected":($category->featured == 1?"selected":"") }} >Có</option>
                        <option value="0" {{ $formMode == 'edit'?($category->featured == 0?"selected":""):"" }}>Không</option>
                      </select>
    {!! $errors->first('featured', '<p class="help-block">:message</p>') !!}
</div>




<strong>Features</strong>
                 

<div>
  <div class="row" style="margin-bottom: 5px;">
    <div class="col-lg-12">
      <button type="button" class="btn btn-success btn-sm pull-right" id="btn-add-feature" style="margin-top:5px"><i class="fa fa-plus-square"></i> Add new Feature</button>
  </div>
</div>



<div id="frame-feature">
  <?php if(isset($features)){?>

    @foreach($features as $item)
        
        <div class="row container-feature-{{ $item->id }}" style="margin-bottom: 5px;">
            <div class="col-lg-4">
                <input type="text" name="field_title[]" class="form-control" placeholder="Feature title" value="{{ $item->field_title }}" />
            </div>
            <div class="col-lg-4">
                <select name="field_type[]" class="form-control" >
                    <option value="1" {{ $item->field_type==1?"selected":"" }}>Text</option>
                    <option value="2" {{ $item->field_type==2?"selected":"" }}>Màu sắc</option>
                </select>
            </div>
            <div class="col-lg-4"><a href="#" class="btn btn-sm btn-danger remove-feature" data-value={{ $item->id }}><i class="fa fa-remove"></i></a>
            </div>
        </div>
    @endforeach

  <?php }?>
</div>
</div>
   





<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
</div>

@section('scripts')


<script src="{{ url('admins') }}/views/category/form.js"></script>

@endsection