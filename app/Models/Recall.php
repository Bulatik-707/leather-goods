<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recall extends Model
{
    use HasFactory;

    public function client()
    {
        //belongsTo()  (Внешний ключ)
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function product()
    {
        //belongsTo()  (Внешний ключ)
        return $this->belongsTo(Product::class, 'product_id');
    }
}
