<?php

namespace App;

use App\RegisterStudent;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
    	return $this->hasMany(orderItems::class);
    }

    public function student()
    {
        return $this->belongsTo(RegisterStudent::class, 'user_id', 'id');
    }
}
