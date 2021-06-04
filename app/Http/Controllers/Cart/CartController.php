<?php

namespace App\Http\Controllers\Cart;

use App\FoodItem;
use App\Http\Controllers\Controller;
use App\Order;
use App\orderItems;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function showCart()
    {
        $food_show = Cart::content();
        return view('pages.food_cart', compact('food_show'));
    }

    public function addToCart(Request $request)
    {
        $id   = $request->id;
        $food = foodItem::where('id', $id)->first();

        $data           = array();
        $data['id']     = $food->id;
        $data['name']   = $food->food_name;
        $data['qty']    = 1;
        $data['weight'] = 1;
        $data['price']  = $food->Food_price;

        Cart::add($data);
        return redirect()->route('cart');

    }

    public function updateCart($qty, $row)
    {
        Cart::update($row, $qty);
        return redirect()->route('cart');

    }

    public function RemoveCart(Request $request)
    {

        $rowID = $request->rowID;
        Cart::remove($rowID);
        return back();
    }

    public function checkout()
    {
        $checkouts = Cart::content();

        return view('pages.checkout', compact('checkouts'));
    }

    public function saveOrder(Request $order)
    {
        $validateData = $order->validate([

            'phone_number'   => 'required',
            'email'          => 'required',
            'address'        => 'required',
            'payment_method' => 'required',
            'trxID'          => 'required',
            'pyment_amount'  => 'required',

        ]);
        $orderArray                   = new order;
        $orderArray['user_id']        = Session::get('student_id');
        $orderArray['phone']          = $order->phone_number;
        $orderArray['email']          = $order->email;
        $orderArray['address']        = $order->address;
        $orderArray['payment_method'] = $order->payment_method;
        $orderArray['transactionID']  = $order->trxID;
        $orderArray['total_amount']   = Cart::totalFloat() - Cart::taxFloat();
        $orderArray['payment_amount'] = $order->pyment_amount;
        $orderArray['status']         = 1;
        $orderArray->save();

        $cart_items = Cart::content();
        if (!blank($cart_items)) {
            $i             = 0;
            $cartItemArray = [];
            foreach ($cart_items as $cart_item) {
                $cartItemArray[$i]['order_id']     = $orderArray->id;
                $cartItemArray[$i]['user_id']      = $orderArray->user_id;
                $cartItemArray[$i]['food_item_id'] = $cart_item->id;
                $cartItemArray[$i]['qty']          = $cart_item->qty;
                $cartItemArray[$i]['price']        = $cart_item->price;
                $cartItemArray[$i]['subtotal']     = $cart_item->qty * $cart_item->price;
                $cartItemArray[$i]['created_at']   = date('Y-m-d H:i:s');
                $cartItemArray[$i]['updated_at']   = date('Y-m-d H:i:s');
                $i++;
            }
            orderItems::insert($cartItemArray);
        }

        Session::flash('message', 'Pending your order wait for confirmation ');

        return redirect()->back()->with(Cart::destroy());
    }
}
