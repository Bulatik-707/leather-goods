<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recall;
use Illuminate\Http\Request;

class RecallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Вывод цвета (desc - вывести сначала новые записи)
        $recalls = Recall::orderBy('name', 'desc')->get();
        return view('admin.recall.index',[
            'recalls' =>$recalls
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
        return view('admin.recall.create');
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
        $new_recall = new Recall();
        $new_recall->name = $request->name;
        $new_recall->save();

        return redirect()->back()->withSuccess('Цвет успешно добавлен');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recall  $recall
     * @return \Illuminate\Http\Response
     */
    public function show(Recall $recall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recall  $recall
     * @return \Illuminate\Http\Response
     */
    public function edit(Recall $recall)
    {
        //Редактирование
        return view('admin.recall.edit', [
            'recall'=>$recall
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recall  $recall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recall $recall)
    {
        $recall->name = $request->name;
        $recall->save();

        return redirect()->back()->withSuccess('Цвет обнавлен!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recall  $recall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recall $recall)
    {
        //
        $recall->delete();
        return redirect()->back()->withSuccess('Цвет удален!');

    }
}
