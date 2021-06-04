<?php

namespace App\Http\Controllers\admin;

use App\FoodItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class FoodController extends Controller
{
    public function index()
    {
        return view('admin.food.add');
    }

    public function manage_food()
    {
        $fooditems = foodItem::with('categories', 'order_items')->get();

        // dd($fooditems[0]->order_items->sum('qty'));

        return view('admin.food.manage', compact('fooditems'));
    }

    public function save_food(Request $request)
    {
        $validateData = $request->validate([
            'food_id'       => 'required|unique:food_items',
            'food_name'     => 'required',
            'food_price'    => 'required',
            'food_category' => 'required',
            'status'        => 'required',
            'file'          => 'required',

        ]);
        if ($request->hasfile('file')) {

            $imageName = $request->file->store('public');
        }

        $data                   = new foodItem;
        $data->food_id          = $request->food_id;
        $data->food_name        = $request->food_name;
        $data->food_category    = $request->food_category;
        $data->Food_price       = $request->food_price;
        $data->Food_price       = $request->food_price;
        $data->quantity         = $request->quantity;
        $data->status           = $request->status;
        $data->Food_picture     = $imageName;

        $data->save();
        Session::flash('message', 'Add Information successfully');
        return redirect()->route('manage.food');
    }
    public function unactive_food($id)
    {
        
        foodItem::where('id', $id)
            ->update(['status' => 0]);

        return redirect()->back();
    }
    public function active_food($id)
    {
        
         foodItem::where('id', $id)
            ->update(['status' => 1]);
        return redirect()->back();

    }
    public function delete_food(Request $request, $id)

    {
        $request = foodItem::find($id);
        $request->delete();
        return redirect()->back()->with('message', 'Food item delete successfully');
     
    }
    public function edit($id){

        $edit_food =foodItem::where('id',$id)->first();
        return view('admin.food.edit',compact('edit_food'));
    }
    public function edit_food(Request $request,$id){

        $validateData = $request->validate([
            
            'food_name'     => 'required',
            'food_category' => 'required',
            'quantity' => 'required',
            'food_price'    => 'required',
            'status'        => 'required',

        ]);
        $data = foodItem::find($id);

        $data->food_name        = $request->food_name;
        $data->food_category    = $request->food_category;
        $data->Food_price       = $request->food_price;
        $data->quantity         = $request->quantity;
        $data->Food_description = $request->food_description;
        $data->status           = $request->status;
        $data->save();
        Session::flash('message', 'Update Information successfully');
         return redirect()->route('manage.food');
    }

}
