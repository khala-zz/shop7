<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
// su dung request rieng de check validate
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Auth;
//goi trail
use App\Traits\DeleteModelTrait;

class AdminSliderController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $slider;

    public function __construct(Slider $slider)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_slider|create_slider|show-view_slider|edit-edit_slider|destroy-delete_slider', ['except' => ['store', 'update']]);
        
        $this -> slider = $slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = $this -> filterAndResponse($request);
        return view('admin.pages.slider.index', compact('sliders'));
    }

     /**
     * @param Request $request
     */
    protected function filterAndResponse(Request $request)
    {
        $query = $this -> slider -> whereRaw("1=1");

        if($request->has('all')) {
            return $query->get();
        }

        if ($request->filter_by_title) {
            $query  -> where('name', 'like', "%" . $request->filter_by_title . "%")
                    -> orWhere('nametwo', 'like', "%" . $request->filter_by_title . "%")
                    -> orWhere('namethree', 'like', "%" . $request->filter_by_title . "%")
                    -> orWhere('namefour', 'like', "%" . $request->filter_by_title . "%");
        }

        $sliders = $query->paginate(10);

        return $sliders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        //validate data
        $validated = $request->validated();

        $slider = new Slider();
        $slider->name = $request->input('name');
        $slider->nametwo = $request->input('nametwo');
        $slider->namethree = $request->input('namethree');
        $slider->namefour = $request->input('namefour');
        $slider->description = $request->input('description');
        $slider->content = $request->input('content');
        $slider->is_active = $request->input('is_active');
        if ($request->hasFile('image_name')) {

            checkDirectory("sliders");

            $slider->image_name = uploadFile($request, 'image_name', public_path('uploads/sliders'),$request->input('name'));
        }
        $slider->save();
        return redirect('khalaadmin/sliders')->with('flash_message', 'Thêm mới slider <b>'.$slider -> name.' </b> thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = $this -> slider -> findOrFail($id);
       
        return view('admin.pages.slider.show',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this -> slider -> find($id);
       
        return view('admin.pages.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = $this -> slider -> findOrFail($id);
        //validate data
        $validated = $request->validated();

        $slider->name = $request->input('name');
        $slider->nametwo = $request->input('nametwo');
        $slider->namethree = $request->input('namethree');
        $slider->namefour = $request->input('namefour');
        $slider->description = $request->input('description');
        $slider->content = $request->input('content');
        $slider->is_active = $request->input('is_active');
        if ($request->hasFile('image_name')) {

            checkDirectory("sliders");

            $slider->image_name = uploadFile($request, 'image_name', public_path('uploads/sliders'),$request->input('name'));
        }
        $slider->save();
        return redirect('khalaadmin/sliders')->with('flash_message', 'Cập nhật slider '.$slider->name.' thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = $this -> slider -> findOrFail($id);
        if($slider -> image_name){
            $delete_image=public_path().'/uploads/sliders/'.$slider->image_name;
             unlink($delete_image);
        }
        $this -> slider -> destroy($id);
        
        
        return redirect('khalaadmin/sliders')->with('flash_message', 'Xóa slider thành công!');
    }

     //xoa ajax
    public function delete($id)
    {
        $slider = $this -> slider -> findOrFail($id);
        if($slider -> image_name){
            $delete_image=public_path().'/uploads/sliders/'.$slider->image_name;
             unlink($delete_image);
        }
        return $this -> deleteModelTrait($id,$this -> slider);
    }

}
