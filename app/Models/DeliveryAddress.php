<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;
    protected $table = 'delivery_address';
    protected $fillable = ["user_id","user_email","name","address","city","state","mobile","postal_code"];
}
