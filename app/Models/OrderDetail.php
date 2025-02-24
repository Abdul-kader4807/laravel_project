<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table ='order_details';

    function product()
    {
        return   $this->belongsTo(Product::class);
    }


    function uom()
    {
        return $this->belongsTo(Uom::class);
    }


}


