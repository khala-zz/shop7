<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
// su dung request rieng de check validate
use App\Http\Requests\BannerRequest;

//goi trail
use App\Traits\DeleteModelTrait;

class AdminBannerController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $banner;

    public function __construct(Banner $banner)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_banner|create_banner|show-view_banner|edit-edit_banner|destroy-delete_banner', ['except' => ['store', 'update']]);
        $this -> banner = $banner;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $banners = $this -> filterAndResponse($request);
        
        
        return view('admin.pages.banner.index', compact('banners'));
    }

     //filter
    protected function filterAndResponse(Request $request)
    {

        $query = $this -> banner -> whereRaw("1=1");

        if ($request->filter_by_title) {
            $query->where('title', 'like', "%" . $request->filter_by_title . "%");
        }

     
        $banners = $query->paginate(10);

        return $banners;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        //validate data
        $validated = $request->validated();

        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->link = $request->input('link');       
        $banner->is_active = $request->input('is_active');
        if($request->hasFile('image')) {
            //kiem tra va tao thu muc
            checkDirectory("banners");
            //upload file xong lay ten luu vao database
            $banner->image = uploadFile($request, 'image', public_path('uploads/banners'),$request->input('title'));
        }
        // luu banner
        $banner->save();

        return redirect('khalaadmin/banners')->with('flash_message', 'Thêm mới  <b>'.$banner -> title .'</b> thành công !');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = $this -> banner -> findOrFail($id);
        
        return view('admin.pages.banner.edit',compact('banner'));
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
        $banner = $this -> banner -> findOrFail($id);

        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->is_active = $request->input('is_active');
        //upload anh
        if($request->hasFile('image')) {

            checkDirectory("banners");

            $banner->image = uploadFile($request, 'image', public_path('uploads/banners'),$request->input('title'));
        }
        //cap nhat banner
        $banner->save();
        
        
        return redirect('khalaadmin/banners')->with('flash_message', 'Cập nhật banner <b>'.$banner->title.' </b>thành công !');
    }

     //xoa ajax
    public function delete($id)
    {
        $banner = $this -> banner -> findOrFail($id);
        if($banner -> image){
            $delete_image=public_path().'/uploads/banners/'.$banner->image;
             unlink($delete_image);
        }
        return $this -> deleteModelTrait($id,$this -> banner);
    }
}
