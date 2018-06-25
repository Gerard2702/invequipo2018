<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $marcas = Marca::all();
        return view('marca.index',compact('marca'));  //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('marca.create'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $marca = new Marca();
        $marca->nombre = $request->input('nombre');
        if(!$marca->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('marcas')->with('success', 'Marca registrada!');
        } //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('marca.edit',compact('marca')); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marca->fill($request->all());
        if(!$marca->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('marcas')->with('success', 'Marca Actualizada!');
        } //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(!$marca->delete()){
            App::abort(500, 'Error');
        }else{
            return redirect('marcas')->with('success', 'Marca Eliminada!');
        }
    }
}
