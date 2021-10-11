<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
//goi trail
use App\Traits\DeleteModelTrait;

class AdminOrderController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $order;
    private $product;
    public function __construct(Order $order,Product $product)
    {
         //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_order|show-view_order|edit-edit_order|destroy-delete_order', ['except' => ['store', 'update']]);
        $this -> order = $order;
        $this -> product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this -> filterAndResponse($request);
        return view('admin.pages.order.index', compact('orders'));

    }

    /**
     * @param Request $request
     */
    protected function filterAndResponse(Request $request)
    {
        $query = $this -> order -> whereRaw("1=1");

        if($request->has('all')) {
            return $query->get();
        }

        if ($request->filter_by_title) {
            $query -> where('setting_value', 'like', "%" . $request->filter_by_title . "%")
                   -> orwhere('setting_key', 'like', "%" . $request->filter_by_title . "%");
        }

        $orders = $query->paginate(10);

        return $orders;
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
         $order = $this -> order::with('orders') -> where('id',$id) -> orderBy('id','DESC')-> first();
         
         return view('admin.pages.order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> order -> find($id) -> update([
            'note' => $request -> note,
            'status' => $request -> status
        ]);
        $order = $this -> order -> find($id);
        $order_products = $order -> orders() -> get();
        //cap nhat so luong san pham
        foreach($order_products as $item){
            $product = $this -> product -> where('id',$item -> product_id) -> first();

            $product -> update(['amount' => $product -> amount - $item -> product_qty]);
        }
        

        return redirect('khalaadmin/orders')->with('flash_message', 'Cập nhật đơn hàng  <b>'.$order -> ma_order.' </b>thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this -> order -> findOrFail($id);
        $order->delete();
        return redirect('khalaadmin/orders')->with('flash_message', 'Xóa order thành công !');
    }
     //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> order);
    }
}
