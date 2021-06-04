<?php

namespace App\Http\Controllers;

use App\FoodItem;

class DashboardController extends Controller
{
    public function home()
    {
        $food_Item = foodItem::where('status', '=', 1)->latest()->get();
        return view('dashboard', compact('food_Item'));

    }
    public function categorybyfood($id)
    {
        $show_by_categories = foodItem::where('food_category', $id)->latest()->get();
        return view('pages.food_Show_by_Category', compact('show_by_categories'));

    }
    public function aboutUs()
    {
        return view('pages.about');
    }
    public function orderFood()
    {
        return view('pages.orderFood');
    }
}
