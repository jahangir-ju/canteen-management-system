<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    public function categories(){
    	return $this->hasOne('App\Food_category', 'id', 'food_category');
	}
	public function order_items()
    {
        return $this->hasMany(orderItems::class, 'food_item_id', 'id');
    }

    public function getSellQuantityAttribure() {
    	return $this->order_items();
    }
}
