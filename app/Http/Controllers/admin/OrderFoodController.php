<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\orderItems;

class OrderFoodController extends Controller
{
    public function index()
    {
        $orders = order::latest()->get();
        return view('admin.order.order', compact('orders'));
    }

    public function view($id)
    {
        $order = order::findOrFail($id);
        return view('admin.order.view', compact('order'));
    }

    public function confirm($id)
    {
        order::where('id', $id)
            ->update(['status' => 5]);
        return redirect()->back();
    }
    public function complete($id)
    {
        order::where('id', $id)
            ->update(['status' => 10]);
        return redirect()->back();
    }

}
