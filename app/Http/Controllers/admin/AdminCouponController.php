<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;
// su dung request rieng de check validate
use App\Http\Requests\CouponRequest;
use Illuminate\Support\Facades\Auth;
//goi trail
use App\Traits\DeleteModelTrait;


class AdminCouponController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $coupon;

    public function __construct(Coupon $coupon)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_coupon|create_coupon|show-view_coupon|edit-edit_coupon|destroy-delete_coupon', ['except' => ['store', 'update']]);
        $this -> coupon = $coupon;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coupons = $this -> filterAndResponse($request);
        
        return view('admin.pages.coupon.index', compact('coupons'));
    }
    /**
     * @param Request $request
     */
    protected function filterAndResponse(Request $request)
    {
        $query = $this -> coupon -> whereRaw("1=1");

        if($request->has('all')) {
            return $query->get();
        }

        if ($request->coupon_code) {
            $query->where('coupon_code', 'like', "%" . $request->coupon_code . "%");
        }

        $coupons = $query -> latest() -> paginate(10);

        return $coupons;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        
        //validate data
        $validated = $request->validated();

        $coupon = $this -> coupon -> create([
            'coupon_code' => $request -> coupon_code,
            'amount' => $request -> amount,
            'amount_type' => $request -> amount_type,
            'expiry_date' => date("Y-m-d", strtotime($request-> expiry_date)),
            'is_active' => $request -> is_active
        ]);
        
        return redirect('khalaadmin/coupons')->with('flash_message', 'Thêm mới mã '. $coupon -> coupon_code.' thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = $this -> coupon -> find($id);
        return view('admin.pages.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, $id)
    {
        //validate data
        $validated = $request->validated();

        $coupon = $this -> coupon -> find($id); 
        $coupon -> update([
            'coupon_code' => $request -> coupon_code,
            'amount' => $request -> amount,
            'amount_type' => $request -> amount_type,
            'expiry_date' => date("Y-m-d", strtotime($request-> expiry_date)),
            'is_active' => $request -> is_active
        ]);
        return redirect('khalaadmin/coupons')->with('flash_message', 'Sửa mã '. $coupon -> coupon_code.' thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this -> deleteModelTrait($id,$this -> coupon);
    }

    //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> coupon);
    }
}
