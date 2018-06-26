<?php

namespace App\Http\Controllers;

use App\Equipmentype;
use Illuminate\Http\Request;

class EquipmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentstypes = Equipmentype::all();
        return view('equipmentype.index',compact('equipmentstypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipmentype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipmentype = new Equipmentype();
        $equipmentype->nombre = $request->input('nombre');
        if(!$equipmentype->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('equipmentstypes')->with('success', 'Tipo de Equipo Registrado!');
        }
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
        $equipmentype = Equipmentype::find($id);
        return view('equipmentype.edit',compact('equipmentype'));
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
        $equipmentype = Equipmentype::find($id);
        $equipmentype->fill($request->all());
        if(!$equipmentype->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('equipmentstypes')->with('success', 'Tipo de Equipo Actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipmentype = Equipmentype::find($id);
        if(!$equipmentype->delete()){
            App::abort(500, 'Error');
        }else{
            return redirect('equipmentstypes')->with('success', 'Tipo de Equipo Eliminado!');
        }
    }
}
