<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ["user_id","status","note","payment_method_id","shipping_address_id","total_price","paypal_order_identifier","paypal_email","paypal_given_name","paypal_payer_id","name","address","city","state","user_email","mobile","postal_code","shipping_charges","coupon_code","coupon_amount","payment_method","ma_order","product_id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address_id');
    }
    public function orders()
    {
        return $this->hasMany(OrdersProducts::class, 'order_id');
    }

    
}
