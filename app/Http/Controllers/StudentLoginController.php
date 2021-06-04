<?php

namespace App\Http\Controllers;

use App\RegisterStudent;
use Illuminate\Http\Request;
use Session;

class StudentLoginController extends Controller
{
    public function student()
    {
        return view('user.login');
    }
    public function studentLogin(Request $request)
    {
        $this->validate($request, [
            'user_email'    => 'required|email',
            'user_password' => 'required|min:6',
        ]);

        $email    = $request->user_email;
        $password = $request->user_password;

        $result = RegisterStudent::where('email', $email)
            ->where('password', $password)
            ->first();

        if ($result) {

            Session::put('student_id', $result->id);
            Session::put('student_name', $result->st_name);

            return redirect()->route('home');
        } else {

            Session::flash('message', 'Email or Password Invalid');

            return Redirect()->back();

        }
    }
    public function studentlogout(Request $request)
    {

        $request->session()->flush();
        return redirect()->route('login.page');

    }
}
