<?php

namespace App\Http\Controllers;


use App\Http\Requests;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

// su dung request rieng de check validate
use App\Http\Requests\UserRequest;
//goi trail
use App\Traits\DeleteModelTrait;

class UsersController extends Controller
{
    
    // su dung trait
    use DeleteModelTrait;
    private $user;
    public function __construct(User $user)
    {
        $this->middleware('admin', ['except' => ['getProfile', 'getEditProfile', 'postEditProfile']]);
        $this -> user = $user;

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
            $users = $this -> user -> where('name', 'like', "%$keyword%")->orWhere('email', 'like', "%$keyword%")->paginate($perPage);
        } else {
            $users = $this -> user -> latest()->paginate($perPage);
        }

        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parents = $this -> user -> all();

        return view('admin.pages.users.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
       

        $validate = $request -> validated();

        $requestData = $request->except(['is_profile', '_token']);

        $requestData['password'] = bcrypt($requestData['password']);

        $requestData['is_active'] = isset($requestData['is_active'])?1:0;

        if ($request->hasFile('image')) {

            checkDirectory("users");

            $requestData['image'] = uploadFile($request, 'image', public_path('uploads/users'));
        }

        if(($count = $this -> user -> all()->count()) && $count == 0) {

            $requestData['is_admin'] = 1;
        }

        User::create($requestData);

        return redirect('khalaadmin/users')->with('flash_message', 'Tài khoản thêm thành công!');
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
        $user = $this -> user -> findOrFail($id);

        return view('admin.pages.users.show', compact('user'));
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
        $user = $this -> user -> findOrFail($id);

        return view('admin.pages.users.edit', compact('user'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        $requestData = $request->except(['_token']);

        if ($request->hasFile('image')) {
            checkDirectory("users");
            $requestData['image'] = uploadFile($request, 'image', public_path('uploads/users'));
        }

        $user = $this -> user -> findOrFail($id);

        $old_is_active = $user->is_active;

        if($user->is_admin == 0) {
            $requestData['is_active'] = isset($requestData['is_active']) ? 1 : 0;
        }

        $user->update($requestData);


        // send notification email
        if($user->is_admin == 0 && getSetting("enable_email_notification") == 1 && $requestData['is_active'] != $old_is_active) {

            if($requestData['is_active'] == 1) {
                $subject = "Your mini crm account have been activated";
            } else {
                $subject = "Your mini crm account have been deactivated";
            }

            //$this->mailer->sendActivateBannedEmail($subject, $user);
        }

        return redirect('khalaadmin/users')->with('flash_message', 'Cập nhật tài khoản thành công!');
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
        $user = $this -> user -> findOrFail($id);
        if($user -> image){
            $delete_image=public_path().'/uploads/users/'.$user->image;
             unlink($delete_image);
        }
        $this -> user -> destroy($id);
        
        
        return redirect('khalaadmin/users')->with('flash_message', 'Xóa tài khoản thành công!');
    }

    //xoa ajax
    public function delete($id)
    {
        $user = $this -> user -> findOrFail($id);
        if($user -> image){
            $delete_image=public_path().'/uploads/users/'.$user->image;
             unlink($delete_image);
        }
        return $this -> deleteModelTrait($id,$this -> user);
    }


    /**
     * show user profile
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile()
    {
        $user = $this -> user -> findOrFail(Auth::user()->id);

        return view('admin.pages.users.profile.view', compact('user'));
    }

    public function getEditProfile()
    {
        $user = $this -> user -> findOrFail(Auth::user()->id);

        return view('admin.pages.users.profile.edit', compact('user'));
    }

    public function postEditProfile(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        $requestData = $request->except(['_token']);

        //xu ly hinh anh
        if ($request->hasFile('image')) {
            checkDirectory("users");
            $requestData['image'] = uploadFile($request, 'image', public_path('uploads/users'));
        }

        if(!empty($requestData['password'])) {

            $requestData['password'] = bcrypt($requestData['password']);
        } else {
            unset($requestData['password']);
        }

        $user = $this -> user -> findOrFail($id);

        $user->update($requestData);

        return redirect('khalaadmin/my-profile')->with('flash_message', 'Trang cá nhân cập nhật thành công!');
    }

    public function getRole($id)
    {
        $user = $this -> user -> findOrFail($id);
        $roles = Role::all();
        return view('admin.pages.users.role', compact('user', 'roles'));
    }
    public function updateRole(Request $request, $id)
    {
        
        $this->validate($request, [
            'role_id' => 'required'
        ]);
        $user = $this -> user -> findOrFail($id);

        $old_roles = $user->roles();

        // xoa cac role cũ đi rùi thêm lại role mới
        $user->syncRoles($request->role_id);
        // send role update notification
        /*if(getSetting("enable_email_notification") == 1 && $old_roles->count() > 0 && is_array($old_roles) && $old_roles[0]->id != $request->role_id) {
            // send notify email
           // $this->mailer->sendUpdateRoleEmail("Your mini crm account have updated role", $user);
        }*/
        return redirect('khalaadmin/users')->with('flash_message', 'Cập nhật vai trò của tài khoản thành công!');
    }

    
}