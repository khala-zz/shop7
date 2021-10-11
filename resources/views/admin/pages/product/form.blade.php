<div class="row">
    <!-- thong tin co bản panel -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin cơ bản</div>
            <div class="panel-body">
                <!-- tên sản phẩm -->
                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                    <label for="title" class="control-label">{{ 'Tên sản phẩm' }}</label>
                    <input class="form-control" name="title" type="text" id="title" value="{{ isset($product->title) ? $product->title : old('title')}}" >
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- Danh mục  -->
                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                    <label for="category_id" class="control-label">{{ 'Danh mục sản phẩm' }}</label>
                    <select class="form-control" name="category_id" id="changeCategory">
                        <option value="">Chọn danh mục</option>
                        {!! $htmlOption !!}
                    </select>
                    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- Mã sản phẩm -->
                <div class="form-group {{ $errors->has('product_code') ? 'has-error' : ''}}">
                    <label for="product_code" class="control-label">{{ 'Mã sản phẩm' }}</label>
                    <input class="form-control" name="product_code" type="text" id="product_code" value="{{ isset($product->product_code) ? $product->product_code : old('product_code')}}">
                    {!! $errors->first('product_code', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- san pham moi ? -->
                <div class="form-group {{ $errors->has('new') ? 'has-error' : ''}}">
                    <label for="new" class="control-label">{{ 'Mới' }}</label>
                    <select id="new" name="new" class="form-control" >
                        <option value="0" {{ $formMode == 'create'?"selected":($product->new == 0?"selected":"") }} >Không</option>
                        <option value="1" {{ $formMode == 'edit'?($product->new == 1?"selected":""):"" }}>Có</option>
                    </select>
                    {!! $errors->first('new', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- san pham noi bat ? -->
                <div class="form-group {{ $errors->has('noi_bat') ? 'has-error' : ''}}">
                    <label for="noi_bat" class="control-label">{{ 'Nổi bật' }}</label>
                    <select id="noi_bat" name="noi_bat" class="form-control" >
                        <option value="0" {{ $formMode == 'create'?"selected":($product->noi_bat == 0?"selected":"") }} >Không</option>
                        <option value="1" {{ $formMode == 'edit'?($product->noi_bat == 1?"selected":""):"" }}>Có</option>
                    </select>
                    {!! $errors->first('noi_bat', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- san pham thinh hanh ? -->
                <div class="form-group {{ $errors->has('trend') ? 'has-error' : ''}}">
                    <label for="trend" class="control-label">{{ 'Thịnh hành' }}</label>
                    <select id="trend" name="trend" class="form-control" >
                        <option value="0" {{ $formMode == 'create'?"selected":($product->trend == 0?"selected":"") }} >Không</option>
                        <option value="1" {{ $formMode == 'edit'?($product->trend == 1?"selected":""):"" }}>Có</option>
                    </select>
                    {!! $errors->first('trend', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- nhãn hiệu  -->
                <div class="form-group {{ $errors->has('brand_id') ? 'has-error' : ''}}">
                    <label for="brand_id" class="control-label">{{ 'Nhãn hiệu' }}</label>
                    <select class="form-control" name="brand_id">
                        <option value="0">Chọn nhãn hiệu</option>
                        @foreach($brands as $brand)
                        <option 
                        value="{{ $brand -> id }}" 
                        {{isset($product->brand_id) && $product->brand_id  == $brand -> id ?"selected":""}}>
                        {{ $brand -> title }}</option>
                        @endforeach       
                    </select>
                    {!! $errors->first('brand_id', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- image -->
                @if(isset($product->image) && !empty($product->image))
                    <img src="{{ url('uploads/products-daidien/' . $product->image) }}" width="200" height="180"/>
                @endif

                <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
                    <label for="image" class="control-label">{{ 'Hình ảnh' }}</label>
                    <input class="form-control" name="image" type="file" id="image" >
                    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
    <!-- thông ting gia panel -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Thông tin giá</div>
            <div class="panel-body">
                <!-- giá -->
                <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                    <label for="price" class="control-label">{{ 'Giá' }}</label>
                    <input class="form-control" name="price" type="text" id="price" value="{{ isset($product->price) ? $product->price : old('price')}}" >
                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                </div>

                <!-- số lượng -->
                <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                    <label for="amount" class="control-label">{{ 'Số lượng' }}</label>
                    <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($product->amount) ? $product->amount : old('amount')}}" >
                    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- giam giá -->

                <div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
                    <label for="discount" class="control-label">{{ 'Giảm giá' }}</label>
                    <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($product->discount) ? $product->discount : old('discount')}}" >
                    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
                </div>
                <!-- ngày bắt đầu giảm giá -->
                <!-- format lai dinh dạng đẻ hiển thị cho date picker không bị lỗi khi edit-->
                @if(isset($product->discount_start_date))    
                <?php $convert_date_start = date("m/d/Y", strtotime($product->discount_start_date)) ?>
                @endif
                <div class="form-group {{ $errors->has('discount_start_date') ? 'has-error' : ''}}">
                    <label for="discount_start_date" class="control-label">{{ 'Ngày bắt đầu giảm giá' }}</label>
                    <input class="form-control" name="discount_start_date" type="text" id="discount_start_date" value="{{ isset($product->discount_start_date) ? $convert_date_start : old('discount_start_date')}}" >
                    {!! $errors->first('discount_start_date', '<p class="help-block">:message</p>') !!}
                </div>

                <!-- ngày kết thúc giảm giá -->
                <!-- format lai dinh dạng đẻ hiển thị cho date picker không bị lỗi khi edit-->
                 @if(isset($product->discount_end_date))    
                <?php $convert_date_end = date("m/d/Y", strtotime($product->discount_end_date)) ?>
                @endif
                
                <div class="form-group {{ $errors->has('discount_end_date') ? 'has-error' : ''}}">
                    <label for="discount_end_date" class="control-label">{{ 'Ngày kết thúc giảm giá' }}</label>
                    <input class="form-control" name="discount_end_date" type="text" id="discount_end_date" value="{{ isset($product->discount_end_date) ? $convert_date_end : old('discount_end_date')}}" >
                    {!! $errors->first('discount_end_date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- các đặc tính -->
<div class="panel panel-default">
    <div class="panel-heading">Các đặc tính(<i>Chỉ hiển thị khi chọn danh mục có đặc tính</i>)</div>
    <div class="panel-body">
        <p><strong>Muốn bỏ thuộc tinh size nào thì để trống thuộc tính đó</strong></p>
        <p><strong>Muốn bỏ thuộc tinh color nào thì chọn theo màu Red:251 - Green:254 - Blue:254</strong></p>
        @if(isset($check_features) && !empty($check_features))
        
            <div class="form-group" id="frame-feature">
                 
            @foreach($check_features  as $features)
                <!-- lay lay du lieu tu bang catetory features -->
                @foreach($features -> features as $key => $feature)

                <!-- lay du lieu tu bang product feature voi dieu kien field_id bang voi id cua bang category_feature-->
                <?php
               
                    $product_feature_value = $product -> features() -> where('field_id',$feature  -> id) ->get();
               
                ?>
               
                @if($feature -> field_type == 1)

                    <label  class="control-label">{{ $feature  -> field_title }}</label>

                    <input type="text" value = "{{isset($product_feature_value[0] -> field_value)?$product_feature_value[0] -> field_value:''}}" name="features[{{ $feature  -> id }}]" class="form-control" >

                            
                            
                @elseif($feature  -> field_type == 2)
                    <label  class="control-label">{{ $feature ->  field_title }}</label>
                    <input type="color" value = "{{isset($product_feature_value[0] -> field_value)?$product_feature_value[0] -> field_value:'#FBFEFE'}}" name="features[{{ $feature  -> id }}]" class="form-control">
                            
                @endif      
                        
                @endforeach
            @endforeach
            </div>
        @else   
            <div class="form-group" id="frame-feature">
            </div>
        @endif     
        
    </div>
</div>

<!-- multi upload -->
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Các hình ảnh</strong>
        <span style="font-size: 12px">(Chọn nhiều hình ảnh)</span>
    </div>
    <div class="panel-body">
       
      <div class="row" id="preview">
        <div class="gallery" >
        </div>
         
      </div>


      <input type="file" class="form-control" name="multi-image[]" multiple accept="image/*" id="gallery-photo-add"/>
      <!-- hien thi nhieu image -->
      <div class="row" >
      @if(isset($image_gallery) && !empty($image_gallery))
        @foreach($image_gallery as $gallery)
                <div class="col-lg-3 delete-ele-{{$gallery -> id}}">
                    <img src="{{ url('uploads/'.$product -> id.'/large/' . $gallery->image) }}" class="photo_preview" />
                    <a href="#" class="btn btn-danger remove-feature-product"  title="xóa" data-value="{{ $gallery -> id}}"><i class="fa fa-remove"></i></a>
                </div>
        @endforeach     
       @endif       
         </div>
     </div> 

</div>
      
                  

<!-- Mô tả -->
<div class="panel panel-default">
    <div class="panel-heading">Mô tả</div>
    <div class="panel-body">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">

           <textarea id="description" name="description" class="form-control tinymce_editor_init" rows="20">
               {{ isset($product->description) ? $product->description : old('description')}}
           </textarea>
           {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
       </div>  
   </div>
</div>

<!-- Thông tin thêm -->
<div class="panel panel-default">
    <div class="panel-heading">Thông tin thêm</div>
    <div class="panel-body">
        <div class="form-group {{ $errors->has('additional') ? 'has-error' : ''}}">

           <textarea id="additional" name="additional" class="form-control" rows="15">
               {{ isset($product->additional) ? $product->additional : old('additional')}}
           </textarea>
           {!! $errors->first('additional', '<p class="help-block">:message</p>') !!}
       </div>  
   </div>
</div>
                
<!-- tuy chon hien thi panel -->
<div class="panel panel-default">
    <div class="panel-heading">Tùy chọn hiển thị</div>
    <div class="panel-body">
        <!-- is active -->
        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
            <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
            <select id="is_active" name="is_active" class="form-control" >
                <option value="0" {{ $formMode == 'create'?"selected":($product->is_active == 0?"selected":"") }} >Không</option>
                <option value="1" {{ $formMode == 'edit'?($product->is_active == 1?"selected":""):"" }}>Có</option>
            </select>
            {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
        </div>
        <!-- is featured -->
        <div class="form-group {{ $errors->has('featured') ? 'has-error' : ''}}">
            <label for="featured" class="control-label">{{ 'Hiển thị các đặc tính' }}</label>
            <select id="featured" name="featured" class="form-control" >
                <option value="0" {{ $formMode == 'create'?"selected":($product->featured == 0?"selected":"") }} >Không</option>
                <option value="1" {{ $formMode == 'edit'?($product->featured == 1?"selected":""):"" }}>Có</option>
            </select>
            {!! $errors->first('featured', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
</div>

@section('scripts')

<script src="{{ asset('admins/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admins/js/tinymce/init_tinymce.js') }}"></script>
<script src="{{ asset('admins/js/product/form.js') }}"></script>
@endsection


