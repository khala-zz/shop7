<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

// su dung request rieng de check validate
use App\Http\Requests\RoleRequest;
//goi trail
use App\Traits\DeleteModelTrait;
class RolesController extends Controller
{
   // su dung trait
    use DeleteModelTrait;
    private $role;
   public function __construct(Role $role)
    {
        $this->middleware('admin');
        $this -> role = $role;
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
            $roles = $this -> role -> where("name", "like", "%$keyword%")->paginate($perPage);
        } else {
            $roles = $this -> role -> latest()->paginate($perPage);
        }
        return view('admin.pages.roles.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.pages.roles.create', compact('permissions'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RoleRequest $request)
    {
        //validate data
        $validated = $request->validated();
        //get data
        $requestData = $request->all();
        $role = $this -> role -> create(['name' => $requestData['name']]);
        // attach permissions to role
        foreach ($requestData['permissions'] as $key => $value) {
            //them permission den role trong bang  role has permission(luu role id va permission id)
            $role->givePermissionTo(Permission::findById($key));
        }
        return redirect('khalaadmin/roles')->with('flash_message', 'Vai trò mới đã được thêm vào thành công!');
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
        $role = $this -> role -> findOrFail($id);
        return view('admin.pages.roles.show', compact('role'));
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
        $role = $this -> role -> findOrFail($id);
        $permissions = Permission::all();
        $selected_permissions = [];
        //$role -> permissions lay toan bo permission cua role
        foreach ($role->permissions as $permission) {
            array_push($selected_permissions, $permission->id);
        }
        return view('admin.pages.roles.edit', compact('role', 'permissions', 'selected_permissions'));
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
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'required'
        ]);
        $requestData = $request->all();
        
        $role = $this -> role -> findOrFail($id);
        $role->update(['name' => $requestData['name']]);
        // remove permissions from role
        foreach (Permission::all() as $permission) {
            $role->revokePermissionTo($permission);
        }
        // attach permissions to role
        foreach ($requestData['permissions'] as $key => $value) {
            $role->givePermissionTo(Permission::findById($key));
        }
        return redirect('khalaadmin/roles')->with('flash_message', 'Vai trò đã được cập nhật!');
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
        $this -> role -> destroy($id);
        return redirect('khalaadmin/roles')->with('flash_message', 'Vai trò đã được xóa!');
    }
    //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> role);
    }
}
