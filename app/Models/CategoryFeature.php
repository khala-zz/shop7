<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFeature extends Model
{
    use HasFactory;
    protected $table = 'category_features';
    protected $fillable = ["field_title","field_type","category_id"];
    protected $hidden = ["created_at", "updated_at"];
}
