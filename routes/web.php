<?php

use Illuminate\Support\Facades\Route;


// use App\Http\Controllers\Admin\ColorController;
// use App\Http\Controllers\Admin\CategoryController; //Для Админ панель Route::resource('color', ColorController::class);
// use App\Http\Controllers\Admin\ProductController; //Изделия
// use App\Http\Controllers\Admin\OrderController; //Заказы
// use App\Http\Controllers\Admin\RecallController; //Отзовы
// use App\Http\Controllers\Admin\BasketController; //Корзина*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController; //
use App\Http\Controllers\ProductController; //Изделия
use App\Http\Controllers\OrderController; //Заказы
use App\Http\Controllers\RecallController; //Отзовы
use App\Http\Controllers\BasketController; //Корзина



Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/', [CategoryController::class, 'index']);

Route::get('/category/{category}',[CategoryController::class, 'show'])->name('category-one.show');


Route::get('/category/products/{product_id}',[ProductController::class,'productsForCategory'])->name('products_cat');

//Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
Route::get('/category/product/{product_id}',[ProductController::class,'product'])->name('product_id');


Route::get('/home', [CategoryController::class, 'index'])->name('home');
//Вывести все изделия
Route::get('/products',[ProductController::class,'products'])->name('products');


Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');


Route::get('/basket', [BasketController::class, 'index'])->name('basket');
Route::post('/basket/add-to-basket', [BasketController::class, 'addToBasket'])->name('addToBasket');

Route::get('/order', [BasketController::class, 'index3'])->name('order');


Route::post('product-add-basket/{id}',[BasketController::class,'prodAdd'])->name('add');///

Auth::routes();

Route::group(['middleware' => ['role:admin']], function(){
    Route::prefix('admin_panel')->group(function(){
        Route::get('/', 'App\Http\Controllers\Admin\HomeController@index')->name('homeAdmin');

        //Route::resource('color', ColorController::class); //Исп. это если подкл. контролеры в папке Admin (use App\Http\Controllers\Admin\CategoryController;)
        Route::resource('color', 'App\Http\Controllers\Admin\ColorController');
        Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('product', 'App\Http\Controllers\Admin\ProductController');
        Route::resource('order', 'App\Http\Controllers\Admin\OrderController');
        Route::resource('recall', 'App\Http\Controllers\Admin\RecallController');
        Route::resource('basket', 'App\Http\Controllers\Admin\BasketController');

    });
});



