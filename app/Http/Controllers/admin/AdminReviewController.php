<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Traits\DeleteModelTrait;

class AdminReviewController extends Controller
{
    use DeleteModelTrait;
    private $review;
    public function __construct(Review $review)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_review|destroy-delete_review', ['except' => ['store', 'update']]);
        
        $this -> review = $review;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this -> review -> with('product', 'user');

        $this->filterAndResponse($request, $query);

        $query->orderBy('id', 'DESC');

        $reviews = $query->paginate(15);


        return view('admin.pages.review.index', compact('reviews'));
    }

    /**
     * filter and response
     *
     * @param $request
     * @param $query
     */
    private function filterAndResponse($request, $query)
    {
        if($request->has('id')) {
            $query->where('id', $request->id);
        }

        if($request->has('title') && $request -> title != "") {
            $query->where('title', 'like', "%$request->title%");
        }

        if($request->has('product_code')) {
            $query->where('product_code', $request->product_code);
        }

       
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this -> review -> findOrFail($id);
        $order->delete();
        return redirect('khalaadmin/orders')->with('flash_message', 'Xóa đánh giá thành công !');
    }
     //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> review);
    }
}
