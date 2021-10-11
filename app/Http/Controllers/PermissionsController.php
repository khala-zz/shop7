<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
// su dung request rieng de check validate
use App\Http\Requests\PermissionRequest;
//goi trail
use App\Traits\DeleteModelTrait;

class PermissionsController extends Controller
{
     // su dung trait
    use DeleteModelTrait;
    private $permission;
    public function __construct(Permission $permission)
    {
        
        // danh cho user super admin is_admin = 1;
        $this->middleware('admin');
        $this -> permission = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        
        $keyword = $request->get('search');
        $perPage = 25;
        if (!empty($keyword)) {
            $permissions = $this -> permission -> where('name', 'like', "%$keyword%")->paginate($perPage);
        } else {
            $permissions = $this -> permission -> latest()->paginate($perPage);
        }
        return view('admin.pages.permission.index', compact('permissions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.permission.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PermissionRequest $request)
    {
        
        $validated = $request->validated();
        $requestData = $request->all();
        
        $this -> permission -> create($requestData);
        return redirect('khalaadmin/permissions')->with('flash_message', 'Thêm mới phân quyền thành công !');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $permission = $this -> permission -> findOrFail($id);
        return view('admin.pages.permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $permission = $this -> permission -> findOrFail($id);

        return view('admin.pages.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $permission = $this -> permission -> findOrFail($id);
        $permission->update($requestData);

        return redirect('khalaadmin/permissions')->with('flash_message', 'Phân quyền đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this -> permission -> destroy($id);

        return redirect('khalaadmin/permissions')->with('flash_message', 'Phân quyền đã xóa !');
    }

    //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> permission);
    }

}
