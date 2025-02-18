<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    function status(){
       return   $this->belongsTo(Status::class);
    }
}
