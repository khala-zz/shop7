<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
//use App\Models\CategoryFeature;


class CategoryController extends Controller
{
    private $category;
    private $product;
    private $brand;
    //private $categoryFeature;
    public $check_con = 0;
    public $check_parent = 0;
    //CategoryFeature $categoryFeature
    public function __construct(Category $category,Product $product,Brand $brand){
        
        $this -> category = $category;
        //$this -> categoryFeature = $categoryFeature;
        $this -> product =$product;
        $this -> brand = $brand;
    }
    public function index($slug,$id,Request $request)
    {
        //get category
        $category = $this -> category -> select('id','image','title','description') ->  where([
                          ['is_active',1],
                          ['id',$id],
                          ]) -> first();
        $category_con = $this -> category -> with('children') -> select('id','image','title') -> where('parent_id',$id) ->get();
        /*
        //get tat ca category feature size dua vao category id
        $category_feature_sizes = $this -> categoryFeature -> select('id','field_title','field_type','category_id') -> where('category_id',$id) -> where('field_type',1) -> get();

        //get tat ca category feature color dua vao category id
        $category_feature_colors = $this -> categoryFeature -> select('id','field_title','field_type','category_id') -> where('category_id',$id) -> where('field_type',2) -> get();
        */

        // danh sach brand bao gom bao nhieu san pham trong brand
         $brands_count = $this -> brand -> withCount('products')->get();

        //get product
        //get tong san pham tren moi trang
        if($request -> count){
            $itemPerPage = $request -> count;
        }
        else {
            $itemPerPage = 12;
        }
        //sap xếp
        if($request -> orderby){
            $orderBy = $request -> orderby;
        }
        else {
            $orderBy = 'created_at';
        } 

         //get product 
        //dùng appends($request -> query()) để giử lại query tren url khi click qua trang khác
                
        $query = $this -> product -> with('category');

        $this->filterAndResponse($request, $query);

        //xu ly cho sap xep a-z,z-a,moi nhat,cu nhat
        if($orderBy == 'title_giam'){
            $query->orderBy('title', 'DESC');
        }
        elseif ($orderBy == 'title_tang') {
            $query->orderBy('title', 'ASC');
        }
        elseif ($orderBy == 'created_at_oldest') {
            $query->orderBy('created_at', 'ASC');
        }
        elseif ($orderBy == 'created_at_latest') {
            $query->orderBy('created_at', 'DESC');
        }
        elseif ($orderBy == 'price_tang') {
            $query->orderBy('price', 'ASC');
        }
        elseif ($orderBy == 'price_giam') {
            $query->orderBy('price', 'DESC');
        }
        else{
            $query->orderBy($orderBy, 'DESC');
        }

        

        $products = $query-> 
                          where([
                          ['is_active',1],
                          ['category_id',$id],
                          ]) -> paginate($itemPerPage) -> appends($request -> query());
        //end get product
        

        return view('frontend.category.list',compact('products','category','brands_count','category_con'));
    }

    //shop
    public function shop(Request $request){

       
       //get tong san pham tren moi trang
        if($request -> count){
            $itemPerPage = $request -> count;
        }
        else {
            $itemPerPage = 12;
        }
        
        //sap xếp
        if($request -> orderby){
            $orderBy = $request -> orderby;
        }
        else {
            $orderBy = 'created_at';
        }

        //get product 
        //dùng appends($request -> query()) để giử lại query tren url khi click qua trang khác
                
        $query = $this -> product -> with('category');

        $this->filterAndResponse($request, $query);

        //xu ly cho sap xep a-z,z-a,moi nhat,cu nhat
        if($orderBy == 'title_giam'){
            $query->orderBy('title', 'DESC');
        }
        elseif ($orderBy == 'title_tang') {
            $query->orderBy('title', 'ASC');
        }
        elseif ($orderBy == 'created_at_oldest') {
            $query->orderBy('created_at', 'ASC');
        }
        elseif ($orderBy == 'created_at_latest') {
            $query->orderBy('created_at', 'DESC');
        }
        elseif ($orderBy == 'price_tang') {
            $query->orderBy('price', 'ASC');
        }
        elseif ($orderBy == 'price_giam') {
            $query->orderBy('price', 'DESC');
        }
        else{
            $query->orderBy($orderBy, 'DESC');
        }

        
        $products = $query-> where('is_active',1)  -> paginate($itemPerPage) -> appends($request -> query());

        //end get product

        // danh sach brand bao gom bao nhieu san pham trong brand
        $brands_count = $this -> brand -> withCount('products')->get();

        return view('frontend.shop.shop',compact('products','brands_count'));
        //return view('frontend.home.shop');
    }

    //fileter
    private function filterAndResponse($request, $query)
    {
        if($request->has('brand_filter') && $request -> brand_filter != 0) {
            //kiểm tra xem brand_filter khác 0 mới filter dữ liệu theo brand vì ngoài frontend có set mặc định là 0 cho các filter khác         
            $query->where('brand_id', $request-> brand_filter);
            
        }

        if($request->has('price') && $request -> price != 0) {
            
                $priceRange = explode('-',$request -> price);
                
                $query->whereBetween('price',[ $priceRange[0],$priceRange[1] ]);
            
        }

        if($request->has('category_id') && $request->category_id != 0 ) {
            $query->where('category_id', $request->category_id);
        }

        
    }

    
}
