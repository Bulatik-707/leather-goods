<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Вывод цвета (desc - вывести сначала новые записи)
       // $products = Product::orderBy('name')->get();
        $products = Product::all();
        return view('admin.product.index',[
            'products' => $products,

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Добавить
        $categories = Category::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        return view('admin.product.create',[
            'categories'=>$categories,
            'colors'=>$colors,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $new_product = new Product();
        // $new_product->name = $request->name;
        // $new_product->color_id = $request->color_id;
        // $new_product->category_id = $request->category_id;
        // $new_product->description = $request->description;
        // $new_product->price = $request->price;
        // $new_product->image = $request->image;
        // $new_product->save();

        // return redirect()->back()->withSuccess('Изделие успешно добавлено');

        if ($request->file('image') != null) {
            // Определим новое имя файла
            $fullFileName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();

            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileNameNew = $fileName . '_' . time() . '.' . $extension;

            Storage::putFileAs('/public/image', $request->file('image'), $fileNameNew);
        } else {
            $fileNameNew = 'default.jpg';
        }
         //Создадим новый альбом
         Product::create([
             'name' => $request->input('name'),
             'color_id' => $request->input('color_id'),
             'category_id' => $request->input('category_id'),
             'description' => $request->input('description'),
             'price' => $request->input('price'),
             'image' => $fileNameNew
         ]);

        return redirect()->back()->withSuccess('Изделие успешно добавлено');

        // //Вернемся на страницу с альбомами
        // //return redirect()->route('albums.index')->with('success', "Изделие успешно добавлено!");
        // //Загрузим файл на сервер
        // $request->file('image')->storeAs('public/image', $fileNameNew);
        // return redirect()->back()->with('success', "Изделие успешно добавлено!");



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //Редактирование
        $categories = Category::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        return view('admin.product.edit', [
            'categories'=>$categories,
            'colors'=>$colors,
            'product'=>$product,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Сохраняем название картинки (старое)
        $fileNameNew = $product->image;

        //Если обновляем картинку то
        if($request->file('image') !=null){
            // Определим новое имя файла
            $fullFileName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileNameNew = $fileName . '_' . time() . $extension;

            Storage::delete('public/image/' . $product->image);
            //Загрузим файл на сервер
            $request->file('image')->storeAs('public/image', $fileNameNew);
        }

        //Создадим новый альбом
        $product->update([
            'name' => $request-> input('name'),
            'color_id' => $request->input('color_id'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $fileNameNew
        ]);

        return redirect()->back()->withSuccess('Изделие обнавлено!');
 
    }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->back()->withSuccess('Изделие удалено!');

    }
}
