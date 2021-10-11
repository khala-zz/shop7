<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\City;
use App\Models\Order;
use App\Models\DeliveryAddress;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin-login');
    }

    //khala login front
    
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function createFront()
    {
        return view('auth.login_front');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeFront(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

         //set session front login
        Session::put('frontSession',$request -> email);

        return redirect()->intended(RouteServiceProvider::HOMEFRONT) -> with('flash_message_success','Đăng nhập thành công');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyFront(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

         //destroy session front login
        Session::forget('frontSession');

        return redirect('/');
    }

    //my account

    public function myAccount(){

        //get user id
        $user_id = Auth() -> id();
        $userDetails = User::find($user_id);
        $address_ship = DeliveryAddress::where('user_id',$user_id) -> first();
        
        //get list city
        $citys = City::get();

        //get order
        $orders = Order::with('orders') -> where('user_id',$user_id) -> orderBy('id','DESC')-> get();
       
        
        return view('frontend.user.account',compact('userDetails','citys','orders','address_ship'));
    }

    //thay doi mat khau thong tin tai khoan
    public function changePassword(Request $request){
        $data = $request -> all();
        //xu ly hinh anh
        
        $img = null;
        $check_img = User::where('id',Auth() -> id()) -> where('image','<>',null) -> get();
        if($check_img -> isNotEmpty()){
            $img = $check_img[0] -> image;
        }
        if ($request->hasFile('image')) {

            checkDirectory("users");
            $img = uploadFile($request, 'image', public_path('uploads/users'));
        }

        //khong cap nhat mat khau
        if($data['current_password'] == "" && $data['new_password'] == ""){
            
            User::where('id',Auth::User() -> id) -> update(['name' => $data['name'], 'email' => $data['email'],'image' => $img]);
            return redirect() -> back() -> with('flash_message_success','Thông tin đã được cập nhật');
        }
        else{
            $old_pass = User::where('id',Auth::User() -> id) -> first();
            $current_password = $data['current_password'];
           
            //so sanh nhap lai mat khau cũ có trung khớp  mới cập nhật
            if(Hash::check($current_password,$old_pass -> password)){
                $new_password = bcrypt($data['new_password']);
               
                User::where('id',Auth() -> id()) -> update(['name' => $data['name'], 'email' => $data['email'],'password' => $new_password,'image' => $img]);
           
                
                return redirect() -> back() -> with('flash_message_success','Thông tin mật khẩu đã thay đổi');
            }
            else {
                return redirect() -> back() -> with('flash_message_error','Thông tin mật khẩu cũ không chính xác');
            }
        } 
    }

    //thay doi dia chi thanh toan
    public function changeAddress(Request $request){

        $data = $request -> all();
        //get thong tin user
        $user_id = Auth() -> id();
        $user = User::find($user_id);

        //luu thong tin user chinh sua
        $user -> name = $data['name'];
        $user -> email = $data['email'];
        $user -> mobile = $data['mobile'];
        $user -> city = $data['city'];
        $user -> state = $data['state'];
        $user -> address = $data['address'];

        $user -> save();

        return redirect() -> back() -> with('flash_message_success','Thông tin địa chỉ thanh toán được cập nhật');

    }

    //thay doi dia chi thanh toan
    public function changeAddressShip(Request $request){

        $data = $request -> all();
        //get thong tin user
        $user_id = auth() -> id();
        if($request -> address_id){
            $address_ship = DeliveryAddress::find($request -> address_id);
             //luu thong tin user chinh sua
           
        }
        else {
           $address_ship = new DeliveryAddress;
        }

        $address_ship -> name = $data['name'];
        $address_ship -> user_email = $data['email'];
        $address_ship -> mobile = $data['mobile'];
        $address_ship -> city = $data['city'];
        $address_ship -> state = $data['state'];
        $address_ship -> address = $data['address'];
        $address_ship -> user_id = $user_id;

        $address_ship -> save();

        return redirect() -> back() -> with('flash_message_success','Thông tin địa chỉ giao hàng được cập nhật');

    }
}
