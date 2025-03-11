<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $table='purchases_details';






    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id');
    }


    // public function purchase()
    // {
    //     return $this->belongsTo(Purchase::class);
    // }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }




}
