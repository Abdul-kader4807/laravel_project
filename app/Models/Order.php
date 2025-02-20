<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function customer()
    {
        return   $this->belongsTo(Customer::class);
    }

    function product()
    {
        return   $this->belongsTo(Product::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function status()
    {
        return $this->belongsTo(Status::class);
    }


    function uom()
    {
        return $this->belongsTo(Uom::class);
    }
}
