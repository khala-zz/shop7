<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatNews extends Model
{
    use HasFactory;
    protected $table = 'cat_news';
    protected $fillable = ["title"];
    
    
    public function news()
    {
        return $this->hasMany(News::class, 'news_id');
    }
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id','id');
    }
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
