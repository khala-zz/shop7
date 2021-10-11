<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    use HasFactory;
    protected $table = 'orders_products';
    protected $fillable = ["user_id","order_id","product_id","product_code","product_name","product_size","product_price","product_qty","product_color"];
}
