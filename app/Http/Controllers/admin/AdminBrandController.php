<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

// su dung request rieng de check validate
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Auth;
//goi trail
use App\Traits\DeleteModelTrait;



class AdminBrandController extends Controller
{
    
    // su dung trait
    use DeleteModelTrait;
    private $brand;
    public function __construct(Brand $brand)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_brand|create-brand|show-view_brand|edit-edit_brand|destroy-delete_brand', ['except' => ['store', 'update']]);
        $this -> brand = $brand;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = $this -> filterAndResponse($request);
        return view('admin.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        //validate data
        $validated = $request->validated();

        $brand = $this -> brand -> create($request->all());
        
        return redirect('khalaadmin/brands')->with('flash_message', 'Thêm mới nhãn hiệu <b>'.$brand -> title.' </b>thành công !');
    }
    

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this -> brand -> find($id);
       
        return view('admin.pages.brand.edit',compact('brand'));
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
        $brand = $this -> brand ->findOrFail($id);
        //validate data
        //$validated = $request->validated();

        $brand->title = $request->input('title');
        
        $brand->is_active = $request->input('is_active');
        $brand->save();
      
        
        return redirect('khalaadmin/brands')->with('flash_message', 'Cập nhật nhãn hiệu '.$brand->title.' thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this -> brand -> findOrFail($id);
        $brand->delete();
        return redirect('khalaadmin/brands')->with('flash_message', 'Xóa nhãn hiệu thành công !');
    }
     //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> brand);
    }

     /**
     * @param Request $request
     */
    protected function filterAndResponse(Request $request)
    {
        $query = $this -> brand -> whereRaw("1=1");

        if($request->has('all')) {
            return $query->get();
        }

        if ($request->filter_by_title) {
            $query->where('title', 'like', "%" . $request->filter_by_title . "%");
        }

        $brands = $query->paginate(10);

        return $brands;
    }

    public function brandsByCategory(Request $request)
    {
        return $this->getBrandsByCategory($request->category_id);
    }
}
