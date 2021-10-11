

<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">
        <!-- ma giảm giá -->
        <div class="form-group {{ $errors->has('coupon_code') ? 'has-error' : ''}}">
            <label for="coupon_code" class="control-label">{{ 'Mã giảm giá' }}</label>
            <input class="form-control" name="coupon_code" type="text" id="coupon_code" value="{{ isset($coupon->coupon_code) ? $coupon->coupon_code : old('coupon_code')}}" >
            {!! $errors->first('coupon_code', '<p class="help-block">:message</p>') !!}
        </div>

        <!-- Số lượng -->
        <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
            <label for="amount" class="control-label">{{ 'Số lượng' }}</label>
            <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($coupon->amount) ? $coupon->amount : old('amount')}}" >
            {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
        </div>
        <!-- loại giam giá -->

        <div class="form-group {{ $errors->has('amount_type') ? 'has-error' : ''}}">
            <label for="amount_type" class="control-label">{{ 'Loại mã giảm giá' }}</label>
           

            <select id="amount_type" name="amount_type" class="form-control" >
                <option value="Phần trăm" {{ $formMode == 'create'?"selected":($coupon->amount_type == "Phần trăm"?"selected":"") }} >Phần trăm</option>
                <option value="Cố định" {{ $formMode == 'edit'?($coupon->amount_type == "Cố định"?"selected":""):"" }}>Cố định</option>
            </select>

            {!! $errors->first('amount_type', '<p class="help-block">:message</p>') !!}
        </div>
        <!-- ngày kết thúc giảm giá -->
        <!-- format lai dinh dạng đẻ hiển thị cho date picker không bị lỗi khi edit-->
        @if(isset($coupon->expiry_date))    
        <?php $convert_date_end = date("m/d/Y", strtotime($coupon->expiry_date)) ?>
        @endif
        <div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : ''}}">
            <label for="expiry_date" class="control-label">{{ 'Ngày kết thúc giảm giá' }}</label>
            <input class="form-control" name="expiry_date" type="text" id="expiry_date" value="{{ isset($coupon->expiry_date) ? $convert_date_end : old('expiry_date')}}" >
            {!! $errors->first('expiry_date', '<p class="help-block">:message</p>') !!}
        </div>
        <!-- is active -->
        <div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}}">
            <label for="is_active" class="control-label">{{ 'Hiển thị' }}</label>
            <select id="is_active" name="is_active" class="form-control" >
                <option value="0" {{ $formMode == 'create'?"selected":($coupon->is_active == 0?"selected":"") }} >Không</option>
                <option value="1" {{ $formMode == 'edit'?($coupon->is_active == 1?"selected":""):"" }}>Có</option>
            </select>
            {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
        </div>
        <!-- button submit -->
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Cập nhật' : 'Lưu' }}">
        </div>
    </div>
</div>


@section('scripts')

<script src="{{ url('admins/js/coupon/form.js') }}"></script>
@endsection


