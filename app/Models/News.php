<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public function cat_news()
    {
        return $this->belongsTo(CatNews::class, 'cat_news_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //tag
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable') -> withTimestamps();
    }
}
