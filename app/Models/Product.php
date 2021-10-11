<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ["title","description","price","amount","discount","discount_start_date","discount_end_date","created_by","category_id","brand_id","product_code","featured","is_active","new","additional","noi_bat"];
    protected $appends = ["description_short"];

    //thoc category nao
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->with('features');
    }

    //thuoc user nao
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    //co nhieu features
    public function features()
    {
        return $this->hasMany(ProductFeature::class, 'product_id') ;
    }

    //co nhieu hinh anh
    public function gallery()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    //co nhieu reivew
    //co nhieu hinh anh
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    // thuoc ve brand nao
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    //thuoc ve tag nao
    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }
    //get du lieu tu bang category feature
    public function categoryFeature()
    {
        //return $this->hasManyThrough(Category::class, CategoryFeature::class);

        return $this->hasManyThrough(
            Category::class,
            CategoryFeature::class,
            'category_id', // Foreign key on the environments table...
            'category_id', // Foreign key on the deployments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
    }  
    //cắt nọn hiển hị mô tả chỗ chi tiết sản phẩm
    public function getDescriptionShortAttribute()
    {
        return mb_substr(strip_tags($this->description), 0, 170);
    } 

    public function orderProducts(){
      return $this->belongsToMany(OrdersProducts::class,'product_id')->selectRaw('product_id, COALESCE(sum(product_qty),0) total')->groupBy('product_id');
   }

     
}
