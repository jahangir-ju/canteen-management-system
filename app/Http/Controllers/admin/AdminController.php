<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function show_admin()
    {
        $admin = Admin::all();
        return view('admin.admin.show', compact('admin'));
    }
    public function add_admin(){
        return view('admin.admin.add');
    }
    public function active_admin($id)
    {
        admin::where('id', $id)->update(['status' => 1]);
        return redirect()->back();
    }
    public function unactive_admin($id)
    {
        admin::where('id', $id)->update(['status' => 0]);
        return redirect()->back();
    }
    public function save_admin(Request $request){
        // dd($request);

         $validatedData = $request->validate([
            'admin_id'        => 'required',
            'admin_name'      => 'required',
            'admin_email'     => 'required',
            'gender'          => 'required',
            'password'        => 'required',
            'admin_phone'     => 'required',
            'status'          => 'required',
           
        ]);

        $data = new Admin;

        $data->admin_id     = $request->admin_id;
        $data->admin_name   = $request->admin_name;
        $data->admin_email  = $request->admin_email;
        $data->gender       = $request->gender;
        $data->password     = $request->password;
        $data->admin_phone  = $request->admin_phone;
        $data->status       = $request->status;
    
        $data->save();
        Session::flash('message', 'Add Information successfully');
        return redirect()->route('show.admin');
    }

    public function admin_edit($id){
        $admins = Admin::find($id);
        return view('admin.admin.edit',compact('admins'));
         
    }
    public function update_admin(Request $request, $id){

        $validateData = $request->validate([
            
            'admin_id'      => 'required',
            'admin_name'    => 'required',
            'admin_email'   => 'required',
            'gender'        => 'required',
            'password'      => 'required',
            'admin_phone'   => 'required',

        ]);
        $data = Admin::find($id);

        $data->admin_id     = $request->admin_id;
        $data->admin_name   = $request->admin_name;
        $data->admin_email  = $request->admin_email;
        $data->gender       = $request->gender;
        $data->password     = $request->password;
        $data->admin_phone  = $request->admin_phone;
        $data->save();

        return redirect()->route('show.admin')->with('message', 'Update Information successfully');

    }
    public function admin_delete(Request $request, $id ){
        $request = Admin::find($id);
        $request->delete();
        return redirect()->route('show.admin')->with('message', 'Data Deleted successfully');

    }
}
