<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];
    
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
