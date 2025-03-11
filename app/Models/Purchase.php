<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table='purchases';



    // function purchase_details()
    // {
    //     return   $this->hasMany(PurchaseDetail::class);
    // }

    protected $fillable = [
        'supplier_id', 'purchase_date',  'total_purchase', 'vat'];



    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class, 'purchase_id');
    }

    protected $casts = [
        'purchase_date' => 'datetime',
        'delivery_date' => 'datetime',
    ];











    function status(){
        return   $this->belongsTo(Status::class, 'status_id');
     }

function supplier(){
    return $this->belongsTo(Supplier::class, 'supplier_id');
}

function product(){
    return $this->belongsTo(Product::class , 'product_id');
}



}

