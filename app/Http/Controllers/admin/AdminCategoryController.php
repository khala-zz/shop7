<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryFeature;
use Illuminate\Support\Facades\Validator;

//su dung de quy
use App\Components\Recusive;
// su dung request rieng de check validate
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;
//goi trail
use App\Traits\DeleteModelTrait;

class AdminCategoryController extends Controller
{
    
    // su dung trait
    use DeleteModelTrait;
    private $category;

    public function __construct(Category $category)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_category|create_category|show-view_category|edit-edit_category|destroy-delete_category', ['except' => ['store', 'update']]);
        $this -> category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this -> category -> with('parent');
       
        $categories = $this->filterAndResponse($request, $query);
        
        if(isset($request -> filter_by_parent_id)){
            
            $htmlOption = $this -> getCategory($request -> filter_by_parent_id);
        }
        else
        {
            $htmlOption = $this -> getCategory($parentId = '');
        }
        return view('admin.pages.category.index', compact('categories','htmlOption'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $htmlOption = $this -> getCategory($parentId = '');
        return view('admin.pages.category.create', compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
       //validate data
        $validated = $request->validated();

        $category = new Category();
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id') != '' ? $request->input('parent_id') : null;
        $category->featured = $request->input('featured');

        $category->is_active = $request->input('is_active');
        if($request->hasFile('image')) {
            //kiem tra va tao thu muc
            checkDirectory("categories");
            //upload file xong lay ten luu vao database
            $category->image = uploadFile($request, 'image', public_path('uploads/categories'),$request->input('title'));
        }
        $category->save();
        //kiem tra có field title mới insert vào bảng category feature
        if($request -> has('field_title')){
            $this->insertFeatures($request, $category);
        }
        
        return redirect('khalaadmin/categories')->with('flash_message', 'Thêm mới danh mục <b>'.$category -> title .'</b> thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $category = $this -> category -> with('parent', 'features')->findOrFail($id);
        return view('admin.pages.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this -> category -> find($id);
        $features = $category -> features() -> get();
        
        $htmlOption = $this -> getCategory($category -> parent_id);
        return view('admin.pages.category.edit',compact('category','htmlOption','features'));
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
        $category = $this -> category -> with('parent')->findOrFail($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id') != '' ? $request->input('parent_id') : null;
        $category->featured = $request->input('featured');
        $category->is_active = $request->input('is_active');
        if($request->hasFile('image')) {

            checkDirectory("categories");

            $category->image = uploadFile($request, 'image', public_path('uploads/categories'),$request->input('title'));
        }
        $category->save();
        if($request -> has('field_title')){
           $category->features()->delete();
           $this->insertFeatures($request, $category);
        }
        
        return redirect('khalaadmin/categories')->with('flash_message', 'Cập nhật danh mục <b>'.$category -> title.' </b> thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = $this -> category -> findOrFail($id);
        if($category -> image){
            $delete_image=public_path().'/uploads/categories/'.$category->image;
             unlink($delete_image);
        }
        $category->delete();

        return redirect('khalaadmin/categories')->with('flash_message', 'Xóa danh mục sản phẩm thành công !');
    }

     //xoa ajax
    public function delete($id)
    {
        $category = $this -> category -> findOrFail($id);
        if($category -> image){
            $delete_image=public_path().'/uploads/categories/'.$category->image;
             unlink($delete_image);
        }
        return $this -> deleteModelTrait($id,$this -> category);
    }

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


        $categories = $query->paginate(10);
        return $categories;
    }

    protected function insertFeatures($request, $category) {

        
        //get data title
        $title = $request->input('field_title');
        //get data title
        $type = $request->input('field_type');

        $mapFeatures = function($title,$type){
            $features = [];
            $features['title'] = $title;
            $features['type'] = $type;
            return $features;
        };

        $features = array_map($mapFeatures,$title,$type);

        // luu data vao category feature

        for($i = 0; $i < count($features); $i ++) {

            $categoryFeature = new CategoryFeature();
            $categoryFeature->field_title = $features[$i]["title"];
            $categoryFeature->field_type = $features[$i]["type"];

            $category->features()->save($categoryFeature);
        }

    }

    

    public function getCategory($parentId)
    {
        $data = $this -> category -> all();

        $recusive = new Recusive($data);

        $htmlOption = $recusive -> categoryRecusive($parentId);

        return $htmlOption;

    }
}
