<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   protected $table = 'orders';

    protected $fillable = [
        'customer_id', 'order_date', 'delivery_date', 'total_order', 'vat'];


        public function orderDetails()
        {
            return $this->hasMany(OrderDetail::class, 'order_id');
        }

        protected $casts = [
            'order_date' => 'datetime',
            'delivery_date' => 'datetime',
        ];



    function customer()
    {
        return   $this->belongsTo(Customer::class,'customer_id');
    }

    // function order_details()
    // {
    //     return   $this->hasMany(OrderDetail::class);
    // }

    // function product()
    // {
    //     return   $this->belongsTo(Product::class);
    // }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function status()
    {
        return $this->belongsTo(Status::class);
    }


    // function uom()
    // {
    //     return $this->belongsTo(Uom::class);
    // }


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty');
    }







}
