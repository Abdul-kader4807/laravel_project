<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
     protected $table ='stock';


     protected $fillable = [
        'product_id',
        'transaction_type_id',
        'price',
        'offer_price',
        'warehouse_id',
        'uom_id',
        'remark',
        'qty'
    ];



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


}
