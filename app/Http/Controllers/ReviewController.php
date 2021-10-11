<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function saveReview(Request $request, $id)
    {
    	if($request -> ajax()){
    		Review::insert([
    			'product_id' => $id,
    			'user_id' => Auth::user() -> id,
    			'rating' => $request -> number,
    			'comment' => $request -> content,
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now()
    		]);

    		//tim product và luu dữ liệu vào 2 cột pro_total_rating và pro_total_number
    		$product = Product::find($id);

    		$product -> pro_total_number += $request -> number;
    		$product -> pro_total_rating += 1;
    		$product -> save();
    		return response() -> json(['code' => '1']);
    	}
    }
}
