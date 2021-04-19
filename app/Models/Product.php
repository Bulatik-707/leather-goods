<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    //hasMany - Связь 1 ко многим (Первичный)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function basket()
    {
        return $this->hasMany(Basket::class);
    }
    //belongsTo()  (Внешний ключ)
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function category(){
        return $this->belongsTo(Category::class); //return $this->belongsTo(Category::class,  'category_id'
    }

    //Сохранить
    protected $fillable = ['name', 'category_id', 'color_id', 'image', 'price', 'description' ];

    // //Добавляем метод категории
    // public function category()
    // {
    //     return $this->belongsTo('App\Category', 'category_id');
    // }
    // //Добавляем метод категории
    // public function color()
    // {
    //     return $this->belongsTo('App\Color', 'color_id');
    // }

}
