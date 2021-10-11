<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CatNews;
//su dung de quy
use App\Components\Recusive;
// su dung request rieng de check validate
use App\Http\Requests\CatNewsRequest;

//goi trail
use App\Traits\DeleteModelTrait;

class AdminCatNewsController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $cat_news;

    public function __construct(CatNews $cat_news)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_cat_news|create_cat_news|show-view_cat_news|edit-edit_cat_news|destroy-delete_cat_news', ['except' => ['store', 'update']]);
        $this -> cat_news = $cat_news;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this -> cat_news -> with('parent');
       
        $cat_news = $this->filterAndResponse($request, $query);
        
        if(isset($request -> filter_by_parent_id)){
            
            $htmlOption = $this -> getCategory($request -> filter_by_parent_id);
        }
        else
        {
            $htmlOption = $this -> getCategory($parentId = '');
        }
        return view('admin.pages.cat_news.index', compact('cat_news','htmlOption'));
    }

    //get category
    public function getCategory($parentId)
    {
        $data = $this -> cat_news -> all();

        $recusive = new Recusive($data);

        $htmlOption = $recusive -> categoryRecusive($parentId);

        return $htmlOption;

    }

    //filter
    protected function filterAndResponse(Request $request, \Illuminate\Database\Eloquent\Builder $query)
    {
        
       
        if ($request->filter_by_title) {
            $query->where('title', 'like', "%" . $request->filter_by_title . "%");
        }

        if ($request->filter_by_parent_id) {
            $query->where('parent_id', $request->filter_by_parent_id);
        }

        if ($request->filter_by_title && $request->filter_by_parent_id) {
            $query->where('title', 'like', "%" . $request->filter_by_title . "%") -> where('parent_id', $request->filter_by_parent_id);
        }


        $cat_news = $query->paginate(10);
        return $cat_news;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this -> getCategory($parentId = '');
        return view('admin.pages.cat_news.create', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatNewsRequest $request)
    {
        //validate data
        $validated = $request->validated();

        $cat_news = new CatNews();
        $cat_news->title = $request->input('title');
        $cat_news->description = $request->input('description');
        $cat_news->parent_id = $request->input('parent_id') != '' ? $request->input('parent_id') : null;
        $cat_news->is_active = $request->input('is_active');
        if($request->hasFile('image')) {
            //kiem tra va tao thu muc
            checkDirectory("cat_news");
            //upload file xong lay ten luu vao database
            $cat_news->image = uploadFile($request, 'image', public_path('uploads/cat_news'),$request->input('title'));
        }
        $cat_news->save();
        
        
        return redirect('khalaadmin/cat_news')->with('flash_message', 'Thêm mới danh mục <b>'.$cat_news -> title .'</b> thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat_news = $this -> cat_news -> with('parent')->findOrFail($id);
        return view('admin.pages.cat_news.show',compact('cat_news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat_news = $this -> cat_news -> findOrFail($id);
        
        $htmlOption = $this -> getCategory($cat_news -> parent_id);
        return view('admin.pages.cat_news.edit',compact('cat_news','htmlOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatNewsRequest $request, $id)
    {
        $cat_news = $this -> cat_news -> with('parent')->findOrFail($id);
        $cat_news->title = $request->input('title');
        $cat_news->description = $request->input('description');
        $cat_news->parent_id = $request->input('parent_id') != '' ? $request->input('parent_id') : null;
        
        $cat_news->is_active = $request->input('is_active');
        if($request->hasFile('image')) {

            checkDirectory("cat_news");

            $cat_news->image = uploadFile($request, 'image', public_path('uploads/cat_news'),$request->input('title'));
        }
        $cat_news->save();
        
        
        return redirect('khalaadmin/cat_news')->with('flash_message', 'Cập nhật danh mục <b>'.$cat_news->title.' </b>thành công !');
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cat_news = $this -> cat_news -> findOrFail($id);
        if($cat_news -> image){
            $delete_image=public_path().'/uploads/cat_news/'.$cat_news->image;
             unlink($delete_image);
        }
        $cat_news->delete();

        return redirect('khalaadmin/cat_news')->with('flash_message', 'Xóa danh mục sản phẩm thành công !');
    }

     //xoa ajax
    public function delete($id)
    {
        $cat_news = $this -> cat_news -> findOrFail($id);
        if($cat_news -> image){
            $delete_image=public_path().'/uploads/cat_news/'.$cat_news->image;
             unlink($delete_image);
        }
        return $this -> deleteModelTrait($id,$this -> cat_news);
    }
}
