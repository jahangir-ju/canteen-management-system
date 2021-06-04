<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.adminlogin');
    }
    public function admin_dashboard()
    {
       
        return view('admin.dashboard');
    }

    public function admin_login(Request $request)
    {

        $this->validate($request, [
            'admin_email' => 'required|email',
            'password'    => 'required',
        ]);

        $admin_email = $request->admin_email;
        $password    = $request->password;

        $result =admin::where('admin_email', $admin_email)
            ->where('password', $password)
            ->first();

        if ($result) {

            Session::put('id', $result->id);
            Session::put('name', $result->admin_name);

            return Redirect()->route('admin-dashboard');
        } else {

            Session::flash('message', 'admin_email or password Invalid');

            return Redirect()->back();

        }
    }
    public function admin_logout(Request $request){
         $request->session()->flush();
        return redirect()->route('admin.index');
    }
}
