<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $casts = [
        'open' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);        
    }

    public function path()
    {
        return '/orders/' . $this->id;
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot('quantity', 'notes', 'location');
    }

    public function scopeOpen($query)
    {
        return $query->where('open', true);   
    }

    public function close()
    {
        $this->open = false;
        $this->save();
        return $this;    
    }

    public function isOpen()
    {
        return $this->open;
    }

    public function isClosed()
    {
        return ! $this->open;
    }
}
