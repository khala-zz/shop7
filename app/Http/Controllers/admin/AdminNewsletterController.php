<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletters;
use App\Traits\DeleteModelTrait;

class AdminNewsletterController extends Controller
{
    use DeleteModelTrait;
    private $newsletter;
    public function __construct(Newsletters $newsletter)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_newsletter|destroy-delete_newsletter');
        
        $this -> newsletter = $newsletter;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $newsletters = $this -> filterAndResponse($request);

        return view('admin.pages.newsletter.index', compact('newsletters'));
    }

    /**
     * filter and response
     *
     * @param $request
     * @param $query
     */
    private function filterAndResponse($request)
    {
       $query = $this -> newsletter -> whereRaw("1=1");

        if ($request->filter_by_title) {
            $query->where('email', 'like', "%" . $request->filter_by_title . "%");
        }

        $query -> orderBy('id','desc');
        $newsletters = $query->paginate(10);

        return $newsletters;

    }

     //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> newsletter);
    }

    //cap nhat xử lý và chưa xử lý
    public function xuly($id,$status){
        $newsletter = $this -> newsletter -> findOrFail($id);
        $newsletter -> status = $status;
        $newsletter -> save();
        return redirect('khalaadmin/newsletters')->with('flash_message', 'Cập nhật tình trạng thành công !');
    }
}
