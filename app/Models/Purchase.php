<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table='purchases';


    function purchase_details()
    {
        return   $this->hasMany(PurchaseDetail::class);
    }


    function status(){
        return   $this->belongsTo(Status::class, 'status_id');
     }

function supplier(){
    return $this->belongsTo(Supplier::class, 'supplier_id');
}

// function product(){
//     return $this->belongsTo(Product::class , 'product_id');
// }



}

