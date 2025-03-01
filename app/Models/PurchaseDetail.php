<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $table ='purchase_details';



    protected $fillable = [
        'purchase_id', 'product_id', 'uom_id', 'qty',
        'price', 'discount', 'vat', 'total_purchase'
    ];

    function product()
    {
        return   $this->belongsTo(product::class);
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
