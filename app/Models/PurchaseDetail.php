<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $table='purchase_details';



    function product()
    {
        return   $this->belongsTo(Product::class);
    }


    function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }








}
