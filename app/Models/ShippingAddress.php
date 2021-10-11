<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $table = 'shipping_addresses';
    protected $fillable = ["address","country","city","postal_code","mobile","is_primary","user_id"];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
