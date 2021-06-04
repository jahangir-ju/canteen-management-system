<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\RegisterStudent;
use Illuminate\Http\Request;
use Session;

session_start();

class ManageStudentController extends Controller
{
    public function index()
    {
        $student = RegisterStudent::all();

        return view('admin.student.manage_st', compact('student'));
    }
    public function add_student()
    {
        return view('admin.student.add_st');
    }
    public function student_register(Request $request)
    {

        $validateData = $request->validate([
            'st_id'        => 'required|unique:register_students|max:10',
            'st_name'      => 'required',
            'email'        => 'required|unique:register_students',
            'hostel_name'  => 'required',
            'depertment'   => 'required',
            'gender'       => 'required',
            'room_number'  => 'required',
            'phone_number' => 'required',
            'password'     => 'required|min:8',
            'file'         => 'required',

        ]);

        $imageName = "";
        if ($request->hasfile('file')) {

            //return $request->image->getClientOriginalName();
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
    public function viewinfo($id)
    {
        $viewinfo = registerStudent::where('id', "$id")->first();

        return view('admin.student.view_st', compact('viewinfo'));
    }
    public function edit_info($id)
    {
        $student_edit = registerStudent::where('id', $id)->first();
        return view('admin.student.update', compact('student_edit'));
    }
    public function update_st_info(Request $request, $id)
    {
        $validateData = $request->validate([
            'st_id'        => 'required|max:10',
            'st_name'      => 'required',
            'email'        => 'required',
            'gender'       => 'required',
            'depertment'   => 'required',
            'hostel_name'  => 'required',
            'room_number'  => 'required',
            'phone_number' => 'required',

        ]);

        $data              = registerStudent::find($id);
        $data->st_id       = $request->st_id;
        $data->st_name     = $request->st_name;
        $data->st_dept     = $request->depertment;
        $data->email       = $request->email;
        $data->gender      = $request->gender;
        $data->phone       = $request->phone_number;
        $data->hostel_name = $request->hostel_name;
        $data->room        = $request->room_number;
        $data->save();
        Session::flash('message', 'Update Information successfully');
        return redirect()->route('student_information');

    }
    public function delete_student(Request $request, $id)
    {
        $request = registerStudent::find($id);
        $request->delete();
        return redirect()->back()->with('message', 'student Information delete successfully');

    }
    public function change_password($id){
        dd($id);

    }

}
