<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Links;
// su dung request rieng de check validate
use App\Http\Requests\LinkRequest;

//goi trail
use App\Traits\DeleteModelTrait;

class AdminLinkController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $link;

    public function __construct(Links $link)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_link|create_link|show-view_link|edit-edit_link|destroy-delete_link', ['except' => ['store', 'update']]);
        $this -> link = $link;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $links = $this -> filterAndResponse($request);
        
        
        return view('admin.pages.link.index', compact('links'));
    }

     //filter
    protected function filterAndResponse(Request $request)
    {

        $query = $this -> link -> whereRaw("1=1");

        if ($request->filter_by_title) {
            $query->where('title', 'like', "%" . $request->filter_by_title . "%");
        }

     
        $links = $query->paginate(10);

        return $links;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.pages.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        //validate data
        $validated = $request->validated();

        $link = new Links();
        $link-> title = $request->input('title');
        $link-> link = $request->input('link');       
        $link-> is_active = $request->input('is_active');
        $link-> position = $request->input('position');
        
        // luu banner
        $link->save();

        return redirect('khalaadmin/links')->with('flash_message', 'Thêm mới  <b>'.$link -> title .'</b> thành công !');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = $this -> link -> findOrFail($id);
        
        return view('admin.pages.link.edit',compact('link'));
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
        $link = $this -> link -> findOrFail($id);

        $link -> title = $request->input('title');
        $link -> link = $request->input('link');
        $link -> is_active = $request->input('is_active');
        $link -> position = $request->input('position');
        
        $link->save();
        
        
        return redirect('khalaadmin/links')->with('flash_message', 'Cập nhật link <b>'.$link->title.' </b>thành công !');
    }

     //xoa ajax
    public function delete($id)
    {
        $link = $this -> link -> findOrFail($id);
        
        return $this -> deleteModelTrait($id,$this -> link);
    }
}
