<?php

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Links;


//kiem tra super admin
function superAdminCheck()
{
    return auth()->user()->is_super_admin == 1;
}
/**
 * upload file
 *
 *
 * @param $request
 * @param $name
 * @param string $destination
 * @return string
 */
function uploadFile($request, $name, $destination = '',$title = '')
{
    $image = $request->file($name);
    //dat ten image theo ten bai viết
    $title_image = str_replace(" ","_",$title);
    if($title == ''){
        $name = time().'_'.$title_image.'.'.$image->getClientOriginalExtension();
    }
    else{
        $name = $title_image.'.'.$image->getClientOriginalExtension();
    }
    
    

    if($destination == '') {
        $destination = public_path('/uploads');
    }

    $image->move($destination, $name);

    return $name;
}


//san pham ban chay
function getBestSeller()
{
    //get product bán chạy 
        $products_selling = Product::leftJoin('categories','products.category_id','=','categories.id')
        ->leftJoin('orders_products','products.id','=','orders_products.product_id')
        
        ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
        ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

        ->orderBy('total','desc')
        ->where('products.is_active',1)
        
        
        ->take(4) -> get(); 
    return  $products_selling;
}

//san pham co the thich
function getProductLike()
{
    $products_like = Product::select('id','image','title','price','discount','category_id','product_code') -> where('is_active',1) -> get() -> random(12);
    return  $products_like;
}

//san pham co the thich
function getProductViewed()
{
    $products_view = Product::select('id','image','title','price','discount','category_id','product_code') -> where('is_active',1) -> orderBy('views','desc') -> take(12) -> get();
    return  $products_view;
}
/**
 * add setting key and value
 *
 *
 * @param $key
 * @param $value
 * @return Setting|bool
 */
function addSetting($key, $value)
{
    if(Setting::where('setting_key', $key)->first() != null)
        return false;

    $setting = new Setting();

    $setting->setting_key = $key;

    $setting->setting_value = $value;

    $setting->save();

    return $setting;
}

/**
 * get setting value by key
 *
 * @param $key
 * @return mixed
 */
function getSetting($key)
{
    return ($setting = Setting::where('setting_key', $key)->first()) != null ? $setting->setting_value:null;
}

/*hien thi setting ngoai footer*/

function getSettings()
{
    //get setting
    $settings = Setting::select('setting_key','setting_value') -> where('is_active',1) -> take(5) ->get();
    return $settings;
}

//hien thi lien ket o footer
function getLinks($key)
{
    
    $links = Links::select('title','link') -> where([['is_active',1],['position',$key]]) -> get();
    return $links;
}


/**
 * check directory exists and try to create it
 *
 *
 * @param $directory
 */
function checkDirectory($directory)
{
    try {
        if (!file_exists(public_path('uploads/' . $directory))) {
            mkdir(public_path('uploads/' . $directory));

            chmod(public_path('uploads/' . $directory), 0777);
        }
    } catch (\Exception $e) {
        die($e->getMessage());
    }
}

/**
 * check if user has permission
 *
 *
 * @param $permission
 * @return bool
 */
function user_can($permission)
{
    return \Auth::user()->is_super_admin == 1 || \Auth::user()->can($permission);
}

// get order chưa xử ly
function getUnreadOrder()
{
    
    return DB::table('orders') -> where('status','Đang xử lý') -> get();
}

// get product cart 
function getProductCart()
{
    $userCart = DB::table('cart') -> where('session_id',Session::get('session_cart_id')) -> get();
    //them phan tu image vao bien userCart thong qua product_id
        foreach($userCart as $key => $products){
            $productDetail = DB::table('products') -> where('id',$products -> product_id) -> first();
            $userCart[$key] -> image = $productDetail -> image;
        }
    return $userCart;
}

//get tong tien price trong gio hang
function getTotalCart(){
    $total_cart = 0;
    $productCart = DB::table('cart') -> where('session_id',Session::get('session_cart_id')) -> get();
    foreach ($productCart as $value) {
        $total_cart = $total_cart + ($value -> price * $value -> quantity);
    }
    return $total_cart;
}

//get aLL product
function getProducts()
{
    return \App\Models\Product::all();
}

//get detail product
function getProductsDetail($id)
{
    return \App\Models\Product::where('id',$id) -> get();
}

//get all categories
function getCategories()
{
    return \App\Models\Category::all();
}

/**
 * get Users
 *
 *
 * @return mixed
 */
function getUsers()
{
    return \App\Models\User::where('is_admin', 0)->where('is_active', 1)->get();
}

function slugify($string, $separator = "-")
    {
        // Slug
        $string = mb_strtolower($string);
        $string = @trim($string);
        $replace = "/(\\s|\\" . $separator . ")+/mu";
        $subst = $separator;
        $string = preg_replace($replace, $subst, $string);

        // Remove unwanted punctuation, convert some to '-'
        $puncTable = [
            // remove
            "'"  => '',
            '"'  => '',
            '`'  => '',
            '='  => '',
            '+'  => '',
            '*'  => '',
            '&'  => '',
            '^'  => '',
            ''   => '',
            '%'  => '',
            '$'  => '',
            '#'  => '',
            '@'  => '',
            '!'  => '',
            '<' => '',
            '>'  => '',
            '?'  => '',
            // convert to minus
            '['  => '-',
            ']'  => '-',
            '{'  => '-',
            '}'  => '-',
            '('  => '-',
            ')'  => '-',
            ' '  => '-',
            ','  => '-',
            ';'  => '-',
            ':'  => '-',
            '/'  => '-',
            '|'  => '-',
            '\\' => '-',
        ];
        $string = str_replace(array_keys($puncTable), array_values($puncTable), $string);

        // Clean up multiple '-' characters
        $string = preg_replace('/-{2,}/', '-', $string);

        // Remove trailing '-' character if string not just '-'
        if ($string != '-') {
            $string = rtrim($string, '-');
        }

        return $string;
    }

//format money
function formatMoney($value)
{
    return number_format($value, 0, '', '.').' đ';
}