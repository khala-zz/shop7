<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Product;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
   
    
    private $slider;
    private $product;
    private $category;
    private $banner;

    public function __construct(Slider $slider,Product $product, Banner $banner,Category $category){
    	
    	$this -> slider = $slider;
    	$this -> product =$product;
        
        $this -> banner = $banner;
        $this -> category = $category;
    
    }
    public function home(){
    	

        //get 2 banner
        $banners = $this -> banner -> select('title','link','image') -> where('is_active',1) ->whereIn('id',[1,2])->get();
         //get 2 banner thinh hanh
        $banners_trend = $this -> banner -> select('title','link','image') -> where('is_active',1) ->whereIn('id',[3,4])->get();

        //get 1 banner
        $bannerOne = $this -> banner 
                        -> select('title','link','image')
                        -> where([
                        ['is_active',1],
                        ['id',3],]) -> first();

    	//get slider
    	$sliders = $this -> slider -> select('name','nametwo','description','namefour','image_name') -> where('is_active',1) -> get();

        //san pham mới về
        $products_arrivals =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['new',1],
                                            ]) -> latest() -> take(5) -> get();

        $products_arrivals_2 = $products_arrivals -> slice(3,2);

        $products_arrivals_3 = $products_arrivals -> slice(0,3);

        //end san pham mới về

        ///////////// get product bán chạy ////////////////////

        $products_selling = $this -> product 
                                    -> leftJoin('categories','products.category_id','=','categories.id')
                                    ->leftJoin('orders_products','products.id','=','orders_products.product_id')
                                    
                                    ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
                                    ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

                                    ->orderBy('total','desc')
                                    ->where('products.is_active',1)
                                    
                                    ->take(5)
                                    ->get(); 

        $products_selling_2 = $products_selling -> slice(3,2);

        $products_selling_3 = $products_selling -> slice(0,3);

        ///////////// end get product bán chạy ////////////////////

        //end san pham ban chay

        

        //////////////// san pham thoi trang /////////////////////

        //get category de show hinh anh va link 
        $category_fashion = $this -> category -> select('id','title','image') -> where('id',1) -> first();

        //ban chay
        $products_fashion_selling = $this -> product 
                                            -> leftJoin('categories','products.category_id','=','categories.id')
                                            ->leftJoin('orders_products','products.id','=','orders_products.product_id')
                                            
                                            ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
                                            ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

                                            ->orderBy('total','desc')
                                            ->where([['products.is_active',1],['products.category_id',1]])
                                            
                                            ->take(12)
                                            ->get(); 

        // moi ve
        $products_fashion_arrivals =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['new',1],
                                            ['category_id',1],
                                            ]) -> latest() -> take(12) -> get();

        //noi bat

        $products_fashion_featured =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['featured',1],
                                            ['category_id',1],
                                            ]) -> latest() -> take(12) -> get();

        //danh gia nhieu

        $products_fashion_reviews =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['category_id',1],
                                            ]) -> orderBy('pro_total_number','desc') -> take(12) -> get();
        ///////////////// end san pham thoi trang //////////////////

        ///////////////// san pham the thao ///////////////////////

         //get category de show hinh anh va link 
        $category_sport = $this -> category -> select('id','title','image') -> where('id',2) -> first();

        //ban chay
        $products_sport_selling = $this -> product 
                                            -> leftJoin('categories','products.category_id','=','categories.id')
                                            ->leftJoin('orders_products','products.id','=','orders_products.product_id')
                                            
                                            ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
                                            ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

                                            ->orderBy('total','desc')
                                            ->where([['products.is_active',1],['products.category_id',2]])
                                            
                                            ->take(12)
                                            ->get(); 

        // moi ve
        $products_sport_arrivals =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['new',1],
                                            ['category_id',2],
                                            ]) -> latest() -> take(12) -> get();

        //noi bat

        $products_sport_featured =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['featured',1],
                                            ['category_id',2],
                                            ]) -> latest() -> take(12) -> get();

        //danh gia nhieu

        $products_sport_reviews =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['category_id',2],
                                            ]) -> orderBy('pro_total_number','desc') -> take(12) -> get();
        //////////////// end san pham the thao //////////////////////

        //////////////// san pham dien tu /////////////////////

         //get category de show hinh anh va link 
        $category_ele = $this -> category -> select('id','title','image') -> where('id',3) -> first();

        //ban chay
        $products_ele_selling = $this -> product 
                                            -> leftJoin('categories','products.category_id','=','categories.id')
                                            ->leftJoin('orders_products','products.id','=','orders_products.product_id')
                                            
                                            ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
                                            ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

                                            ->orderBy('total','desc')
                                            ->where([['products.is_active',1],['products.category_id',3]])
                                            
                                            ->take(12)
                                            ->get(); 

        // moi ve
        $products_ele_arrivals =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['new',1],
                                            ['category_id',3],
                                            ]) -> latest() -> take(12) -> get();

        //noi bat

        $products_ele_featured =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['featured',1],
                                            ['category_id',3],
                                            ]) -> latest() -> take(12) -> get();

        //danh gia nhieu

        $products_ele_reviews =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['category_id',3],
                                            ]) -> orderBy('pro_total_number','desc') -> take(12) -> get();
        ///////////////// end san pham dien tu //////////////////

        //////////////// san pham cong nghe /////////////////////

         //get category de show hinh anh va link 
        $category_tech = $this -> category -> select('id','title','image') -> where('id',4) -> first();

        //ban chay
        $products_tech_selling = $this -> product 
                                            -> leftJoin('categories','products.category_id','=','categories.id')
                                            ->leftJoin('orders_products','products.id','=','orders_products.product_id')
                                            
                                            ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
                                            ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

                                            ->orderBy('total','desc')
                                            ->where([['products.is_active',1],['products.category_id',4]])
                                            
                                            ->take(12)
                                            ->get(); 

        // moi ve
        $products_tech_arrivals =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['new',1],
                                            ['category_id',4],
                                            ]) -> latest() -> take(12) -> get();

        //noi bat

        $products_tech_featured =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['featured',1],
                                            ['category_id',4],
                                            ]) -> latest() -> take(12) -> get();

        //danh gia nhieu

        $products_tech_reviews =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['category_id',4],
                                            ]) -> orderBy('pro_total_number','desc') -> take(12) -> get();
        ///////////////// end san pham cong nghe //////////////////

        //////////////// san pham noi that /////////////////////

         //get category de show hinh anh va link 
        $category_fur = $this -> category -> select('id','title','image') -> where('id',5) -> first();

        //ban chay
        $products_fur_selling = $this -> product 
                                            -> leftJoin('categories','products.category_id','=','categories.id')
                                            ->leftJoin('orders_products','products.id','=','orders_products.product_id')
                                            
                                            ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
                                            ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

                                            ->orderBy('total','desc')
                                            ->where([['products.is_active',1],['products.category_id',5]])
                                            
                                            ->take(12)
                                            ->get(); 

        // moi ve
        $products_fur_arrivals =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['new',1],
                                            ['category_id',5],
                                            ]) -> latest() -> take(12) -> get();

        //noi bat

        $products_fur_featured =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['featured',1],
                                            ['category_id',5],
                                            ]) -> latest() -> take(12) -> get();

        //danh gia nhieu

        $products_fur_reviews =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['category_id',5],
                                            ]) -> orderBy('pro_total_number','desc') -> take(12) -> get();
        ///////////////// end san pham cong nghe //////////////////

        //////////////// san pham thinh hanh /////////////////////
      
        //ban chay
        $products_trend_selling = $this -> product 
                                            -> leftJoin('categories','products.category_id','=','categories.id')
                                            ->leftJoin('orders_products','products.id','=','orders_products.product_id')
                                            
                                            ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
                                            ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

                                            ->orderBy('total','desc')
                                            ->where([['products.is_active',1],['products.trend',1]])
                                            
                                            ->take(12)
                                            ->get(); 

        // moi ve
        $products_trend_arrivals =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['new',1],
                                            ['trend',1],
                                            ]) -> latest() -> take(12) -> get();

        //noi bat

        $products_trend_featured =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['featured',1],
                                            ['trend',1],
                                            ]) -> latest() -> take(12) -> get();

        //danh gia nhieu

        $products_trend_reviews =  $this -> product 
                                    -> select('id','image','title','price','discount','category_id','product_code') 

                                    -> where([
                                            ['is_active',1],
                                            ['trend',1],
                                            ]) -> orderBy('pro_total_number','desc') -> take(12) -> get();
        ///////////////// end san pham thinh hanh //////////////////

        

        // count review
        $review_count = $this -> product -> withCount('reviews')->get();

    	return view('frontend.home.home',compact('sliders','review_count','banners_trend',
            'category_tech','category_fur','category_ele','category_sport','category_fashion',
            'products_fashion_selling','products_fashion_arrivals','products_fashion_featured','products_fashion_reviews',
            'products_trend_selling','products_trend_arrivals','products_trend_featured','products_trend_reviews',
            'products_sport_selling','products_sport_arrivals','products_sport_featured','products_sport_reviews',
            'products_ele_selling','products_ele_arrivals','products_ele_featured','products_ele_reviews',
            'products_tech_selling','products_tech_arrivals','products_tech_featured','products_tech_reviews',
            'products_fur_selling','products_fur_arrivals','products_fur_featured','products_fur_reviews',
            'banners','bannerOne','products_arrivals_2','products_arrivals_3','products_selling_2','products_selling_3'));
    }

    

    public function searchProducts(Request $request){

        
        
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
        
        $products = $query-> where('is_active',1)  -> paginate(12) ->  appends($request -> query());

        //end get product
        $keyword = $request -> search_product;
        return view('frontend.product.search',compact('products','keyword'));

    }

    //fileter
    private function filterAndResponse($request, $query)
    {
        

        if($request->has('search_product') && $request->has('poscats') && $request -> search_product <> '' &&  $request -> poscats <> ''){
            
            
            $query -> where('category_id',$request -> poscats)
                   -> where(function ($query) use ($request) {
                            $query->where('title', "like", "%" . $request -> search_product . "%");
                            $query->orWhere('description', "like", "%" . $request-> search_product . "%");
                        }); 

        }
        if($request->has('search_product') && $request -> search_product <> ''){
             $query-> where('title', 'like', "%" . $request -> search_product . "%") -> orWhere('description', 'like', "%" . $request -> search_product . "%") ;
        }
        if($request->has('poscats') &&  $request -> poscats <> ''){

            $query -> where('category_id', $request -> poscats);
        }

        
        

        

        

        
    }
}
