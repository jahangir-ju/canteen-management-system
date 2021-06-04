<?php

namespace App;

use App\FoodItem;
use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    public function fooditem()
    {
        return $this->belongsTo(FoodItem::class, 'food_item_id', 'id')->withDefault(['food_name'=> 'Food item missing']);
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
