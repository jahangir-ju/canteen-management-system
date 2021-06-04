<?php

namespace App\Http\Controllers\admin;

use App\FoodItem;
use App\Http\Controllers\Controller;
use App\orderItems;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellReportController extends Controller
{
    public $data = [];

    public function __construct()
    {
        $this->data['food_item_id'] = '';
        $this->data['from_date']    = '';
        $this->data['to_date']      = '';
        $this->data['showView']     = false;
    }

    public function index()
    {
        $this->data['food_items'] = FoodItem::get();
        return view('admin.sellreport.index', $this->data);
    }

    public function get(Request $request)
    {
        $this->data['food_items'] = FoodItem::get();
        $request->validate([
            'food_item_id' => 'nullable',
            'from_date'    => 'nullable',
            'to_date'      => 'nullable',
        ]);

        $this->data['food_item_id'] = $request->food_item_id;
        $this->data['from_date']    = $request->from_date;
        $this->data['to_date']      = $request->to_date;
        $this->data['showView']     = true;

        if ((int) $request->food_item_id) {
            $this->data['qfood_items'] = FoodItem::where(['id' => $request->food_item_id])->get();
        } else {
            $this->data['qfood_items'] = FoodItem::get();
        }

        $this->getOrderItem($request);

        return view('admin.sellreport.index', $this->data);
    }

    private function getOrderItem($request)
    {
        $queryArray = [];
        if ((int) $request->food_item_id) {
            $queryArray['food_item_id'] = $request->food_item_id;
        }

        if ($request->from_date != '' && $request->to_date != '') {
            $from_date = $request->from_date . " 00:00:00";
            $to_date   = $request->to_date . " 23:59:59";
            $from_date = date('Y-m-d H:i:s', strtotime($from_date));
            $to_date   = date('Y-m-d H:i:s', strtotime($to_date));

            if (!blank($queryArray)) {
                $orderItems = orderItems::whereHas('order', function (Builder $query) {
                    $query->where('status', '!=', 1);
                })->where($queryArray)->whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            } else {
                $orderItems = orderItems::whereHas('order', function (Builder $query) {
                    $query->where('status', '!=', 1);
                })->whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            }
        } else {
            if (!blank($queryArray)) {
                $orderItems = orderItems::whereHas('order', function (Builder $query) {
                    $query->where('status', '!=', 1);
                })->where($queryArray)->get();
            } else {
                $orderItems = orderItems::whereHas('order', function (Builder $query) {
                    $query->where('status', '!=', 1);
                })->get();
            }
        }

        $retArray = [];

        if (!blank($orderItems)) {
            foreach ($orderItems as $orderItem) {
                if (!isset($retArray[$orderItem->food_item_id]['sellprice'])) {
                    $retArray[$orderItem->food_item_id]['sellprice'] = 0;
                }

                if (!isset($retArray[$orderItem->food_item_id]['sellqty'])) {
                    $retArray[$orderItem->food_item_id]['sellqty'] = 0;
                }

                $retArray[$orderItem->food_item_id]['sellqty'] += $orderItem->qty;
                $retArray[$orderItem->food_item_id]['sellprice'] += $orderItem->subtotal;
            }
        }
        $this->data['sell_food_item'] = $retArray;

        $retArray   = array();
        $orderItems = orderItems::get();
        if (!blank($orderItems)) {
            foreach ($orderItems as $orderItem) {
                if (!isset($retArray[$orderItem->food_item_id]['oldsellqty'])) {
                    $retArray[$orderItem->food_item_id]['oldsellqty'] = 0;
                }

                $retArray[$orderItem->food_item_id]['oldsellqty'] += $orderItem->qty;
            }
        }

        $this->data['oldsellquantity'] = $retArray;

    }
}
