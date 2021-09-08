<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orders(){
        return $this->hasmany('App\OrdersProduct','order_id');
    }
}
