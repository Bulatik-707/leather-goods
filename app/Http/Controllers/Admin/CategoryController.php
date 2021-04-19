<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Вывод категорий 'id', 'desc'(desc - вывести сначала новые записи)
        $categories = Category::orderBy('id')->get();
        return view('admin.category.index',[
            'categories' =>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Добавить категорию
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Добавить Категорию
        //Сохраням даные пол из form action="{{route('category.store')}}" ФАЙЛ views/admin/category/create.blade.php
        //И выводим СМС
//        $new_category = new Category();
//        $new_category->name = $request->name;
//        $new_category->image = $request->image;
//        $new_category->save();
//        return redirect()->back()->withSuccess('Категория успешно добавлена');

        if ($request->file('image') != null) {
            // Определим новое имя файла
            $fullFileName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();

            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileNameNew = $fileName . '_' . time() . '.' . $extension;

            Storage::putFileAs('/public/image', $request->file('image'), $fileNameNew);
        } else {
            $fileNameNew = 'default.png';
        }
        //Создадим новый альбом
        Category::create([
            'name' => $request->input('name'),
            'image' => $fileNameNew
        ]);

        return redirect()->back()->withSuccess('Категория успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //Редактирование
        return view('admin.category.edit', [
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //Сохраняем название картинки (старое)
        $fileNameNew = $category->image;

        //Если обновляем картинку то
        if ($request->file('image') != null) {
            // Определим новое имя файла
            $fullFileName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();

            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $fileNameNew = $fileName . '_' . time() . $extension;

            Storage::delete('public/image/' . $category->image);
            //Загрузим файл на сервер
            $request->file('image')->storeAs('public/image', $fileNameNew);
        }

        //Создадим новый альбом
        $category->update([
            'name' => $request->input('name'),
            'image' => $fileNameNew
        ]);

        return redirect()->back()->withSuccess('Категория обнавлена!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //Удаление
        $category->delete();
        return redirect()->back()->withSuccess('Категория удалена!');

    }
}
