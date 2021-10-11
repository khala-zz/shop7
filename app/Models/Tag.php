<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = ["name"];
    /**
     * Get all of the news that are assigned this tag.
     */
    public function news()
    {
        return $this->morphedByMany(News::class, 'taggable')  -> withTimestamps();
    }
}
