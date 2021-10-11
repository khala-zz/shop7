<div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading">Nhập các thông tin bên dưới</strong></div>
    <div class="panel-body">


<h3 class="box-title m-b-0">Khách hàng {{ $order -> name}}</h3>
<p class="text-muted m-b-30 font-13"> Đơn hàng {{ $order -> ma_order}} </p>
<!-- show thong tin -->

<!-- end show thong tin -->  

<div class="table-responsive">
    <table  class="table" >

        <tbody>
            @foreach($order -> orders as $pro)
            <tr>
                <td  width="60%">
                    

                        {!!
                            $pro -> product_name .'(Ma san pham: <strong>'.$pro -> product_code.'</strong>)<p><small>'.$pro -> product_size .' | '. $pro -> product_color.'</small></p>'
                            !!}    
                        
                    </td>
                    <td width="15%">
                        {{ $pro  -> product_price }} đ
                    </td>
                    <td width="5%">
                        x
                    </td>
                    <td width="15%">
                       {{$pro -> product_qty}} cai
                   </td>
                   <td width="5%">{{ $pro -> product_price * $pro -> product_qty}}</td>


               </tr>

               @endforeach

           </tbody>
           <tfoot>
            <tr>
                <td colspan="3">

                </td>
                <td><p>Tổng tiền</td>
                    <td >
                        {{$order -> total_price}}
                        <div class="text-right">

                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">

                    </td>
                    <td><p>Giảm giá</td>
                        <td >
                            @if($order -> coupon_amount !='')
                            {{$order -> coupon_amount}}
                            @else
                            <span>0</span>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">

                        </td>
                        <td><p>Thanh toán</td>
                            <td >
                                {{$order -> total_price - ($order -> coupon_amount != ''?$order -> coupon_amount:0)}}
                                <div class="text-right">

                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div> 

            <!-- chú thích -->
<div class="form-group {{ $errors->has('status_message') ? 'has-error' : ''}}">
    <label for="status_message" class="control-label">{{ 'Chú thích' }}</label>

    <textarea 

    class="form-control"
    rows="10"
    name="status_message" required>
    {{ isset($order->status_message) ? $order->status_message : old('status_message')}}
</textarea>

    
    {!! $errors->first('status_message', '<p class="help-block">:message</p>') !!}
</div>

<!-- is active -->
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Tình trạng đơn hàng' }}</label>
    <select id="status" name="status" class="form-control" >
                        <option value="Đang xử lý" {{ $order->status == 'Đang xử lý'?"selected":"" }} >Đang xử lý</option>
                        <option value="Hoàn thành" {{ $order->status == 'Hoàn thành'?"selected":"" }}>Hoàn thành</option>
                      </select>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
   

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Cập nhật">
</div>
</div>
</div>

