<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id','price','status','ref_num'];

    protected $attributes = [
        'status' =>0
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
}
