<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryFeature;
use App\Models\ProductFeature;
use App\Models\Coupon;
use App\Models\User;
use App\Models\City;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrdersProducts;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

//su dung notification
use Notification;
use App\Notifications\OffersNotification;


class ProductController extends Controller
{
	private $product;
	private $category;
	private $categoryFeature;
	private $setting;
	private $productFeature;
	private $coupon;
	private $delivery_address;
	private $order;
	private $review;

	public function __construct(Product $product,Category $category,CategoryFeature $categoryFeature, ProductFeature $productFeature, Coupon $coupon, DeliveryAddress $delivery_address, Order $order, Review $review, Setting $setting){
		$this -> product = $product;
		$this -> productFeature = $productFeature;
		$this -> category = $category;
		$this -> setting = $setting;
		$this -> categoryFeature = $categoryFeature;
		$this -> coupon = $coupon;
		$this -> delivery_address = $delivery_address;
		$this -> order = $order;
		$this -> review = $review;
	}

	public function detail($slug, $id)
	{
    	
    	//tang len 1 moi lan views
    	//dd('test');
    	$this -> product ->  where('id',$id) -> increment('views',1);

    	//get product detail
		$product = $this -> product ->  where('id',$id) -> first();
		
    	//dd($product -> features);
		$check_item_feature = [];
		foreach($product -> features as $productFeature){
			$check_item_feature[] = $productFeature -> field_id; 
		}

    	//get category features
		$categoryProduct = $product -> category;

		$categoryFeatures = $categoryProduct  -> features -> whereIn('id',$check_item_feature) -> all();

		//dung de kiem tra ngoai front end san pham co mau hoac kich co
		$check_size = 0;
		$check_color = 0;
		$color_size = $this -> categoryFeature -> select('field_type') -> whereIn('id',$check_item_feature) -> get();
		foreach($color_size as $item){
			if($item -> field_type == 1){
				$check_size = 1;
			}
			if($item -> field_type == 2){
				$check_color = 1;
			}
		}
    	//end dung de kiem tra ngoai front end san pham co mau hoac kich co

    	//get product noi bat
		$products_like = $this -> product -> select('id','title','image','price','product_code','new','discount','pro_total_rating','pro_total_number','category_id') -> where([
					['is_active',1],
					['id','<>',$product -> id],
					]) -> get() -> random(15);
		
    	//get product lien quan
		$products_related = $this -> product 
			-> select('id','title','image','price','product_code','new','discount','pro_total_rating','pro_total_number','category_id') 
			-> where([
					['category_id',$product -> category_id],
					['is_active',1],
					['id','<>',$product -> id],
					])  -> get();

		//get reviews
		$reviews = $this -> review -> with('user') -> where('product_id', $id) -> orderBy('id','DESC') -> paginate(10);

		//get setting
		$settings = $this -> setting ->get();

		return view('frontend.product.detail',compact('product','products_like','products_related','categoryFeatures', 'reviews','settings','check_color','check_size'));
	}
	//get pop up product
	public function postPopupProduct(Request $request){
		try 
		{

			$product = $this -> product -> where('id',$request -> product_id) -> first();

			$productGalleryFirst = $product -> gallery -> first();

			$imageGallery = $product -> gallery;

			$category = $product -> category;

			$reviews = $product -> reviews -> count();

			//echo json_encode($productGalleryFirst);

			//echo json_encode($product);

			//echo json_encode($imageGallery);

			return response()->json(['product' => $product,'productGalleryFirst' => $productGalleryFirst,'imageGallery' => $imageGallery,'category' => $category,'reviews' => $reviews], 200);

		}
		catch(\Exception $exception){

			Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());
			return response() -> json([
				'code' => 500,
				'message' => 'fail'
			],500);

		}
	}
    //change price
	public function changePrice($value){

		try 
		{

			$priceValue = $this -> productFeature -> where('field_id',$value) -> first();

			echo $priceValue -> field_value;

		}
		catch(\Exception $exception){

			Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());
			return response() -> json([
				'code' => 500,
				'message' => 'fail'
			],500);

		}
	}

    //change price reset
	public function resetPrice($value){

		try 
		{

			echo $value;

		}
		catch(\Exception $exception){

			Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());
			return response() -> json([
				'code' => 500,
				'message' => 'fail'
			],500);

		}
	}

    //add cart
	public function addToCart(Request $request){

		

		//xóa sesion coupon cũ trước khi tạo session coupon mới
		Session::forget('CouponAmount');
		Session::forget('CouponCode');

		$data = $request -> all();

		//set session cart id cho sp
		$session_cart_id = Session::get('session_cart_id');
		if(empty($session_cart_id)){
			$session_cart_id = Str::random(40);
			Session::put('session_cart_id',$session_cart_id);
		}
		
		//kiem tra field user email
		if(empty(Auth::user() -> email)){
			$data['user_email'] = '';
		}
		else {
			$data['user_email'] = Auth::user() -> email;
		}

		//kiem tra co color khong
		if(!isset($data['product_color'])){
			$data['product_color'] = '';
		}

		//kiem tra co size khong
		if(empty($data['product_size'])){
			$data['product_size'] = '';
		}
		//kiem tra neu gio hang đã có sản phẩm tồn tại chua
		$productCount = DB::table('cart') -> where(['product_id' => $data['product_id'],'product_code' => $data['product_code'],'product_color' => $data['product_color'],'size' => $data['product_size'],'session_id' => $session_cart_id]) -> count();
		if($productCount > 0){
			return redirect() -> back() -> with('flash_message_error','Sản phẩm đã tồn tại trong giỏ hàng');
		}
		else{
			//them du lieu vao bang cart
			DB::table('cart') -> insert(['product_id' => $data['product_id'],'product_name' => $data['product_name'],'product_code' => $data['product_code'],'product_color' => $data['product_color'],'price' => $data['product_price'],'size' => $data['product_size'],'quantity' => $data['product_quantity'],'user_email' => $data['user_email'],'session_id' => $session_cart_id]);
		}
		

		return redirect('/cart') -> with('flash_message_success','Thêm sản phẩm vào giỏ hàng thành công');

	}

	//show cart
	public function viewCart(){

		/*if(Auth::check()){
			$user_email = Auth::user() -> email;
			$userCart = DB::table('cart') -> where('user_email',$user_email) -> get();
		}
		else{
			$session_cart_id = Session::get('session_cart_id');
			$userCart = DB::table('cart') -> where('session_id',$session_cart_id) -> get();
		}*/

		$session_cart_id = Session::get('session_cart_id');
		$userCart = DB::table('cart') -> where('session_id',$session_cart_id) -> get();

		
		//them phan tu image vao bien userCart thong qua product_id
		foreach($userCart as $key => $products){
			$productDetail = $this -> product -> where('id',$products -> product_id) -> first();
			$userCart[$key] -> image = $productDetail -> image;
		}
		//dd($userCart);
		return view('frontend.product.cart',compact('userCart'));
	}

	//delete product cart
	public function deleteCartProduct($id = null){

		//xóa sesion coupon cũ trước khi xóa product
		Session::forget('CouponAmount');
		Session::forget('CouponCode');

		DB::table('cart') -> where('id',$id) -> delete();
		return redirect('/cart') -> with('flash_message_success','Xóa sản phẩm thành công !');
	}

	//delete all product cart
	public function deleteAllCartProduct(Request $request){

		$ids_string = implode($request -> cart_id,',');
		$ids = explode(',',$ids_string);
		
		//xóa sesion coupon cũ trước khi xóa product
		Session::forget('CouponAmount');
		Session::forget('CouponCode');

		DB::table('cart') -> whereIn('id',$ids) -> delete();
		return redirect('/cart') -> with('flash_message_success','Xóa sản phẩm thành công !');
	}

	//cap nhat quantity cart
	public function updateCartQuantity($id = null,$quantity = null){

		
		//xóa sesion coupon cũ trước khi cập nhật quantity
		Session::forget('CouponAmount');
		Session::forget('CouponCode');

		DB::table('cart') -> where('id',$id) -> increment('quantity',$quantity);
		return redirect('/cart') -> with('flash_message_success','Số lượng sản phẩm đã được cập nhật');
	}

	//update cart
	public function updateCart(Request $request){

		$ids_string = implode($request -> cart_id,',');
		$ids = explode(',',$ids_string);
		
		//lay quantity
		$qty_string = implode($request -> qtybutton,',');
		$qty = explode(',',$qty_string);
		
		
		//xóa sesion coupon cũ trước khi cap nhat product
		Session::forget('CouponAmount');
		Session::forget('CouponCode');

		//cap nhat quantity
		foreach($ids as $index => $id){
			DB::table('cart') -> where('id',$id) -> update(['quantity' => $qty[$index]]);
		}
		

		return redirect('/cart') -> with('flash_message_success','Cập nhật giỏ hàng thành công !');
	}

	//apply coupon
	public function applyCoupon(Request $request){

		//xóa sesion coupon cũ trước khi tạo session coupon mới
		Session::forget('CouponAmount');
		Session::forget('CouponCode');
		
		if($request -> isMethod('post')){
			$coupon = $request -> all();
			$countCoupon = $this -> coupon -> where('coupon_code',$coupon['coupon_code']) -> count();
			//kiem tra xem coupon code co ton tại không
			if($countCoupon == 0){
				return redirect() -> back() -> with('flash_message_error','Mã giảm giá không tồn tại');
			}
			else{
				//get thong tin chi tiet coupong
				$couponDetail = $this -> coupon -> where('coupon_code',$coupon['coupon_code']) -> first();

				//kiem tra xem coupon co active khổng
				if($couponDetail -> is_active == 0){
					return redirect() -> back() -> with('flash_message_error','Mã giảm giá chưa được kích hoạt');
				}

				//kiem tra ngay het han coupon
				$expiry_date = $couponDetail -> expiry_date;
				$current_date = date('Y-m-d');
				if($expiry_date < $current_date){
					return redirect() -> back() -> with('flash_message_error','Mã giảm giá đã hết hạn');
				}

				//coupon sẵn sàng
				$session_cart_id = Session::get('session_cart_id');
				$userCart = DB::table('cart') -> where('session_id',$session_cart_id) -> get();
				
				$total_amount = 0;
				foreach($userCart as $item){
					$total_amount = $total_amount + ($item -> price * $item -> quantity);
				}

				//kiem tra coupon la phần trăm hay cố định
				if($couponDetail -> amount_type == 'Cố định'){
					$couponAmount = $couponDetail -> amount;
				}
				else{
					$couponAmount = $total_amount * ($couponDetail -> amount/100);
				}

				//add coupon to session
				Session::put('CouponAmount',$couponAmount);
				Session::put('CouponCode',$coupon['coupon_code']);

				return redirect() -> back() -> with('flash_message_success','Mã giảm giá hợp lệ');
			}

		}
	}

	//checkout
	public function checkout(Request $request){
		//get user id

        $user_id = Auth::user() -> id;
        $user_email = Auth::user() -> email;
        $userDetails = User::find($user_id);
        //get list city
        $citys = City::get();
        //check if shipping adrress exists
        $shipping_count = $this -> delivery_address -> where('user_id',$user_id) -> count();
        /*$shipping_details = array();
        if($shipping_count > 0){
        	$shipping_details = $this -> delivery_address -> where('user_id',$user_id) -> first();
        }*/
        $shipping_details = $this -> delivery_address -> where('user_id',$user_id) -> first();
        //update cart table with email
        $session_cart_id = Session::get('session_cart_id');
       // DB::table('cart') -> where('session_id',$session_cart_id) -> update(['user_email' => $user_email]);

        //get products cart
        $userCart = DB::table('cart') -> where('session_id',$session_cart_id) -> get();
        //dat hang
        if($request -> isMethod('post')){
        	$data = $request -> all();
        	
        	//update user detail
        	User::where('id',$user_id) -> update(['name' => $data['billing_name'],'email' => $data['billing_email'],'mobile' => $data['billing_mobile'],'city' => $data['billing_city'],'state' => $data['billing_state'],'address' => $data['billing_address']]);
        	//kiem tra xem co chon dia chi khac?neu chon moi xu ly luu vao delivery address
        	if(isset($data['different_address']))
        	{
        		
        		//update shipping address
        		if($shipping_count > 0){
	        		DeliveryAddress::where('user_id',$user_id) -> update(['name' => $data['shipping_name'],'user_email' => $data['shipping_email'],'mobile' => $data['shipping_mobile'],'city' => $data['shipping_city'],'state' => $data['shipping_state'],'address' => $data['shipping_address']]);
	        	}
	        	else {
	        		//add new deliveryaddress
	        		$shipping = new DeliveryAddress;
	        		$shipping -> user_id = $user_id;
	        		$shipping -> user_email = $user_email;
	        		$shipping -> name = $data['shipping_name'];
	        		$shipping -> mobile = $data['shipping_mobile'];
	        		$shipping -> city = $data['shipping_city'];
	        		$shipping -> state = $data['shipping_state'];
	        		$shipping -> address = $data['shipping_address'];
	        		$shipping -> save();

	        	}
        	}
        	//truyen bien data den action order
        	return redirect() -> action([ProductController::class,'order'],['dataRequest' => $data]);
        }

		return view('frontend.product.checkout',compact('userDetails','citys','shipping_details','userCart'));
	}

	//order
	public function order(Request $request){

		$data = $request -> dataRequest;
		
		//get user
		$user_id = Auth::user() -> id;
        $user_email = Auth::user() -> email;
        $userDetails = User::find($user_id);
        //get shipping address
        $shipping_details = $this -> delivery_address -> where('user_id',$user_id) -> first();
        $session_cart_id = Session::get('session_cart_id');
        //get products cart
        $userCart = DB::table('cart') -> where('session_id',$session_cart_id) -> get();
        //check session coupon
        if(empty(Session::get('CouponAmount'))){
        	$coupon_amount = 0;
        }
        else {
        	$coupon_amount = Session::get('CouponAmount');
        }
        if(empty(Session::get('CouponCode'))){
        	$coupon_code = '';
        }
        else {
        	$coupon_code = Session::get('CouponCode');
        }

        //new order
        //gan bien ma_order random vao bien session order_id
        $ma_order_id = 'KL-'.Str::random(11);
        $order = new Order;
        $order -> user_id = $user_id;
        $order -> user_email = $user_email;
        if(isset($data -> different_address)){
        	$order -> name = $shipping_details -> name;
	        $order -> address = $shipping_details -> address;
	        $order -> state = $shipping_details -> state;
	        $order -> city = $shipping_details -> city;
	        $order -> mobile = $shipping_details -> mobile;
        }
        else{
        	$order -> name = $userDetails -> name;
	        $order -> address = $userDetails -> address;
	        $order -> state = $userDetails -> state;
	        $order -> city = $userDetails -> city;
	        $order -> mobile = $userDetails -> mobile;
        }
       
        $order -> status = "Đang xử lý";
        //$order -> product_id = "Đang xử lý";
        $order -> ma_order = $ma_order_id;
        $order -> coupon_code = $coupon_code;
        $order -> coupon_amount = $coupon_amount;
        $order -> payment_method = $data['paymentMethod'];
        $order -> total_price = $data['grand_total'];
        $order -> save();

        //get id order
        $order_id =DB::getPdo() -> lastinsertID();
        
        //get products cart
        $cartProducts = DB::table('cart') -> where([['user_email',$user_email],['session_id',$session_cart_id]]) -> get();

        //save product order to table order product
        foreach($cartProducts as $pro){
        	$cartPro = new OrdersProducts;
        	$cartPro -> order_id = $order_id;
        	$cartPro -> user_id = $user_id;
        	$cartPro -> product_id = $pro -> product_id;
        	$cartPro -> product_code = $pro -> product_code;
        	$cartPro -> product_name = $pro -> product_name;
        	$cartPro -> product_color = $pro -> product_color;
        	$cartPro -> product_size = $pro -> size;
        	$cartPro -> product_price = $pro -> price;
        	$cartPro -> product_qty = $pro -> quantity;
        	$cartPro -> save();

        }
        //gan session de hien thi ra cho dat hang thanh cong ngoai frontend
        Session::put('order_id',$ma_order_id);
        Session::put('grand_total',$data['grand_total']);
        //gan phuong thuc thanh toan den view
        $payment_value = $data['paymentMethod'];
        //gan phuong thuc giao hang den view
        //$shipping_value = $data['shipping'];

        //su dung notification

  		
        /*$offerData = [
            'name' => $userDetails -> name,
            'body' => 'Ban vua moi dat hang tren shop cua chung toi.Ma don hang '.$ma_order_id,
            'thanks' => 'cam on',
            'offerText' => 'Kiem tra don hang cua ban',
            'offerUrl' => url('/my-account'),
            'data' => $ma_order_id
        ];
  
        Notification::send($userDetails, new OffersNotification($offerData));*/
   
        

        return view('frontend.product.order',compact('userDetails','shipping_details','userCart','payment_value'));
	}

}
