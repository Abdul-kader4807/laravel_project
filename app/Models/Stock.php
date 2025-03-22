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
        return   $this->belongsTo(Product::class,'product_id');
    }

    // function transaction_type()
    // {
    //     return $this->belongsTo(TransactionType::class);
    // }

    function warehouse()
    {
        return $this->belongsTo(Warehouse::class,'warehouse_id');
    }

    function uom()
    {
        return $this->belongsTo(Uom::class);
    }







}
