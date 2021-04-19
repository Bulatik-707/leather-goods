<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $updated_at = false;
    public $created_at = false;

    public function carts()
    {
        //hasMany 1 ко многим (Первичный)
        return $this->hasMany(Basket::class); //МОДЕЛЬ
    }
    public function client()
    {
        //belongsTo()  (Внешний ключ)
        return $this->belongsTo(Client::class, 'client_id');
    }
}
