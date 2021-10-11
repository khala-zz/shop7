<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;

// su dung request rieng de check validate
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Auth;
//goi trail
use App\Traits\DeleteModelTrait;

class AdminSettingController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_setting|create-setting|show-view_setting|edit-edit_setting|destroy-delete_setting', ['except' => ['store', 'update']]);
        $this -> setting = $setting;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings = $this -> filterAndResponse($request);
        return view('admin.pages.setting.index', compact('settings'));
    }

     /**
     * @param Request $request
     */
    protected function filterAndResponse(Request $request)
    {
        $query = $this -> setting -> whereRaw("1=1");

        if($request->has('all')) {
            return $query->get();
        }

        if ($request->filter_by_title) {
            $query -> where('setting_value', 'like', "%" . $request->filter_by_title . "%")
                   -> orwhere('setting_key', 'like', "%" . $request->filter_by_title . "%");
        }

        $settings = $query->paginate(10);

        return $settings;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.pages.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        //validate data
        $validated = $request->validated();

        $setting = $this -> setting -> create($request->all());
        
        return redirect('khalaadmin/settings')->with('flash_message', 'Thêm mới <b>'.$setting -> setting_key.'</b> thành công !');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = $this -> setting -> findOrFail($id);
       
        return view('admin.pages.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
       //validate data
        $validated = $request->validated();
        $setting = $this -> setting -> find($id) -> update([
            'setting_key' => $request -> setting_key,
            'setting_value' => $request -> setting_value,
            'is_active' => $request -> is_active
        ]);
        return redirect('khalaadmin/settings')->with('flash_message', 'Cập nhật <b>'.$setting -> setting_key .'</b> thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = $this -> setting -> findOrFail($id);
        $setting->delete();
        return redirect('khalaadmin/settings')->with('flash_message', 'Xóa setting thành công !');
    }
     //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> setting);
    }
}
