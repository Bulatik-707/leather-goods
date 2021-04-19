<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Basket extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function product()
    {
        //belongsTo()  (Внешний ключ)
        return $this->belongsTo(Product::class);
    }
    public function order()
    {
        //belongsTo()  (Внешний ключ)
        return $this->belongsTo(Order::class);
    }

}

