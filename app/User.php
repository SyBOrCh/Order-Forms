<?php

namespace App;

use App\Order;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'location', 'budgetnumber',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function newOrder()
    {
        $openOrders = Order::where('user_id', $this->id)->where('open', true);
        
        if ($openOrders->count() > 0) {
            return $openOrders->first();
        }

        $order = Order::create(['user_id' => $this->id]);
        return $order;
    }
}
