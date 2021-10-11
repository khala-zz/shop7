<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
// su dung request rieng de check validate
use App\Http\Requests\TagRequest;

//goi trail
use App\Traits\DeleteModelTrait;

class AdminTagController extends Controller
{
     // su dung trait
    use DeleteModelTrait;
    private $tag;

    public function __construct(Tag $tag)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_tag|create_tag|show-view_tag|edit-edit_tag|destroy-delete_tag', ['except' => ['store', 'update']]);
        $this -> tag = $tag;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = $this -> filterAndResponse($request);
        return view('admin.pages.tag.index', compact('tags'));
    }
     //filter
     protected function filterAndResponse(Request $request)
    {
        $query = $this -> tag -> whereRaw("1=1");

        if($request->has('all')) {
            return $query->get();
        }

        if ($request->filter_by_title) {
            $query->where('name', 'like', "%" . $request->filter_by_title . "%");
        }

        $tags = $query->paginate(10);

        return $tags;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //validate data
        $validated = $request->validated();

        $tag = $this -> tag -> create($request->all());
        
        return redirect('khalaadmin/tags')->with('flash_message', 'Thêm mới TAG <b>'.$tag -> name.' </b>thành công !');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this -> tag -> find($id);
       
        return view('admin.pages.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag = $this -> tag ->findOrFail($id);
        //validate data
        $validated = $request->validated();

        $tag->name = $request->input('name');
        
        $tag->save();
        return redirect('khalaadmin/tags')->with('flash_message', 'Cập nhật TAG<b> '.$tag->name.' </b>thành công !');
    }

     //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> tag);
    }

}
