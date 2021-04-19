<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public $timestamps = false;   

    //hasMany - Связь 1 ко многим (Первичный)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
