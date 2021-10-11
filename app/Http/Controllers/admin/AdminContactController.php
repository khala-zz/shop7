<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Traits\DeleteModelTrait;

class AdminContactController extends Controller
{
     use DeleteModelTrait;
    private $contact;
    public function __construct(Contact $contact)
    {
        //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_contact|destroy-delete_contact');
        
        $this -> contact = $contact;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = $this -> filterAndResponse($request);

        return view('admin.pages.contact.index', compact('contacts'));
    }

    /**
     * filter and response
     *
     * @param $request
     * @param $query
     */
    private function filterAndResponse($request)
    {
       $query = $this -> contact -> whereRaw("1=1");

        if ($request->filter_by_title) {
            $query->where('name', 'like', "%" . $request->filter_by_title . "%");
        }

        $query -> orderBy('id','desc');
        $contacts = $query->paginate(10);

        return $contacts;

        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this -> contact -> findOrFail($id);
        return view('admin.pages.contact.show',compact('contact'));
    }

    //cap nhat xử lý và chưa xử lý
    public function xuly($id,$status){
        $contact = $this -> contact -> findOrFail($id);
        $contact -> status = $status;
        $contact -> save();
        return redirect('khalaadmin/contacts')->with('flash_message', 'Cập nhật tình trạng thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = $this -> contact -> findOrFail($id);
        $contact->delete();
        return redirect('khalaadmin/contacts')->with('flash_message', 'Xóa liên hệ thành công !');
    }
     //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> contact);
    }
}
