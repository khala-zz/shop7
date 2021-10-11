<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    use HasFactory;
    protected $table = 'product_features';
    protected $fillable = ["product_id","field_id","field_value"];
    protected $hidden = ["created_at", "updated_at"];
}
