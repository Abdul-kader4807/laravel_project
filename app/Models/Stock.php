<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
     protected $table ='stock';
     protected $guarded = [];

    function product()
    {
        return   $this->belongsTo(Product::class);
    }

    // function transaction_type()
    // {
    //     return $this->belongsTo(TransactionType::class);
    // }

    function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    // function batch()
    // {
    //     return $this->belongsTo(Batch::class);
    // }

}
