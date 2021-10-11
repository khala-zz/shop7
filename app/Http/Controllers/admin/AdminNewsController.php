<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Tag;
// su dung request rieng de check validate
use App\Http\Requests\NewsRequest;
use App\Models\CatNews;
use Illuminate\Support\Facades\Auth;
//goi trail
use App\Traits\DeleteModelTrait;
//su dung de quy
use App\Components\Recusive;

class AdminNewsController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $news;
    private $cat_news;
    private $tag;

    public function __construct(News $news,CatNews $cat_news, Tag $tag)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_news|create_news|show-view_news|edit-edit_news|destroy-delete_news', ['except' => ['store', 'update']]);
        
        $this -> news = $news;
        $this -> cat_news = $cat_news;
        $this -> tag = $tag;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = $this -> filterAndResponse($request);
        return view('admin.pages.news.index', compact('news'));
    }

    /**
     * @param Request $request
     */
    protected function filterAndResponse(Request $request)
    {
        $query = $this -> news -> whereRaw("1=1");

        if($request->has('all')) {
            return $query->get();
        }

        if ($request->filter_by_title) {
            $query  -> where('title', 'like', "%" . $request->filter_by_title . "%");
        }

        $news = $query->paginate(10);

        return $news;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this -> getCategory($parentId = '');
        return view('admin.pages.news.create',compact('htmlOption'));
    }

    //get toan bo danh muc
    public function getCategory($parentId){
        $data = $this -> cat_news -> all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive -> categoryRecusive($parentId);
        return $htmlOption;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        //validate data
        $validated = $request->validated();

        $news = new News();
        $news -> title = $request->input('title');
        $news -> cat_news_id = $request -> input('cat_news_id'); 
        $news -> description = $request->input('description');
        $news -> content = $request->input('content');
        $news -> is_active = $request->input('is_active');
        $news -> user_id = auth()->user()->id;
        if ($request->hasFile('image_name')) {

            checkDirectory("news");

            $news->image_name = uploadFile($request, 'image_name', public_path('uploads/news'),$request->input('title'));
        }
       
        

        $news->save();
         //kiem tra co tags thi insert vao bang tags
         if($request -> has('tags'))
        {
          $tagIds = [];
          //$tags = explode(',',$request -> tags);
          //dd($tags);  
          foreach ($request -> tags as $tagItem) {
            
            $tag_model = $this -> tag -> where('name',$tagItem) -> first();
            if($tag_model){
                array_push($tagIds,$tag_model -> id);
            }
            else {
                array_push($tagIds,$this -> tag -> create(['name' => $tagItem]) -> id);
            }
          }
           //trong Product model lam reletionship belongtomany function tags() de insert du lieu vao bang trung gian
            $news -> tags() -> sync($tagIds);
        }
        
       
        return redirect('khalaadmin/news')->with('flash_message', 'Thêm mới tin <b> '. $news -> title. '</b> thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::with('cat_news')->findOrFail($id);

        return view('admin.pages.news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get product
        $news = $this -> news -> findOrFail($id);

        // get category
        $htmlOption = $this -> getCategory($news -> cat_news_id);
        return view('admin.pages.news.edit',compact('news','htmlOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = $this -> news -> findOrFail($id);

        //validate data
        $validated = $request->validated();

        $news -> title = $request->input('title');
        $news -> cat_news_id = $request -> input('cat_news_id'); 
        $news -> description = $request->input('description');
        $news -> content = $request->input('content');
        $news -> is_active = $request->input('is_active');
        $news -> user_id = auth()->user()->id;
        if ($request->hasFile('image_name')) {

            checkDirectory("news");

            $news->image_name = uploadFile($request, 'image_name', public_path('uploads/news'),$request->input('title'));
        }
        $news->save();
         //kiem tra co tags thi insert vao bang tags
        $tagIds = [];
        if($request -> has('tags'))
        {
          
          //$tags = explode(',',$request -> tags);
          //dd($tags);  
          foreach ($request -> tags as $tagItem) {
            
            $tag_model = $this -> tag -> where('name',$tagItem) -> first();
            if($tag_model){
                array_push($tagIds,$tag_model -> id);
            }
            else {
                array_push($tagIds,$this -> tag -> create(['name' => $tagItem]) -> id);
            }
          }
          //trong Product model lam reletionship belongtomany function tags() de insert du lieu vao bang trung gian
            
        }
        $news -> tags() -> sync($tagIds);
        

        return redirect('khalaadmin/news')->with('flash_message', 'Sửa tin <b> '. $news -> title. '</b> thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $news = $this -> news -> findOrFail($id);
        if($news -> image_name){
            $delete_image=public_path().'/uploads/news/'.$news->image_name;
             unlink($delete_image);
        }
        $this -> news -> destroy($id);
        
        
        return redirect('khalaadmin/news')->with('flash_message', 'Xóa tin tức thành công!');
    }

     //xoa ajax
    public function delete($id)
    {
        $news = $this -> news -> findOrFail($id);
        if($news -> image_name){
            $delete_image=public_path().'/uploads/news/'.$news->image_name;
             unlink($delete_image);
        }
        return $this -> deleteModelTrait($id,$this -> news);
    }
}
