<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table ='order_details';


    //  protected $fillable = ['order_id', 'product_id', 'uom_id', 'qty', 'price', 'vat', 'discount'];



    function product()
    {
        return   $this->belongsTo(Product::class);
    }


    function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}


