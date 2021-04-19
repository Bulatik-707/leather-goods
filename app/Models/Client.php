<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function recals()
    {
        //hasMany 1 ко многим (Первичный)
        return $this->hasMany(Recall::class); //МОДЕЛЬ
    }
    public function orders()
    {
        //hasMany 1 ко многим (Первичный)
        return $this->hasMany(Order::class); //МОДЕЛЬ
    }


}
