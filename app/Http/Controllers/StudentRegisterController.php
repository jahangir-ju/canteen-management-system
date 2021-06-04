<?php

namespace App\Http\Controllers;

use App\RegisterStudent;
use Illuminate\Http\Request;
use Session;

session_start();
class StudentRegisterController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function studentRregister(Request $request)
    {
        $validatedData = $request->validate([
            'st_id'        => 'required|unique:register_students|max:10',
            'st_name'      => 'required',
            'email'        => 'required|unique:register_students',
            'hostel_name'  => 'required',
            'depertment'  => 'required',
            'gender'       => 'required',
            'room_number'  => 'required',
            'phone_number' => 'required',
            'password'     => 'required|min:8'
        ]);

       $imageName ="";
        if ($request->hasfile('file')) {

            $imageName = $request->file->store('public');
        }

        $data = new registerStudent;

        $data->st_id       = $request->st_id;
        $data->st_name     = $request->st_name;
        $data->st_dept     = $request->depertment;
        $data->email       = $request->email;
        $data->gender      = $request->gender;
        $data->phone       = $request->phone_number;
        $data->hostel_name = $request->hostel_name;
        $data->room        = $request->room_number;
        $data->password    = $request->password;
        $data->image       = $imageName;
        $data->save();
        Session::flash('message', 'Add Information successfully');
        return redirect()->back();
    }
}
