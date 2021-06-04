<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Order;
use App\orderItems;
use App\registerStudent;

class ProfileController extends Controller
{
    public function profile()
    {
        $id          = session('student_id');
        $profileinfo = registerStudent::where('id', $id)->first();
        $orderitem   = order::where('user_id', $id)->get();

        return view('pages.profile', compact('profileinfo', 'orderitem'));
    }

    public function cancel($id)
    {
        order::where('id', $id)->delete();
        orderItems::where('order_id', $id)->delete();
        return redirect()->back();
    }
}
