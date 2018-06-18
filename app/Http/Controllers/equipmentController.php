<?php

namespace App\Http\Controllers;

use App\Department;
use App\Equipment;
use App\Equipmentype;
use App\Estate;
use App\Marca;
use App\Miuser;
use App\Nivel;
use Illuminate\Http\Request;

class equipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::join('equipmentypes', 'equipment.id_tipo_equipo', '=', 'equipmentypes.id')
            ->join('nivels', 'equipment.id_nivel', '=', 'nivels.id')
            ->join('departments', 'equipment.id_centro_costo', '=', 'departments.id')
            ->join('miusers', 'equipment.id_usuario', '=', 'miusers.id')
            ->select('equipment.*', 'equipmentypes.nombre as tipo_equipo','nivels.nombre as nivel','departments.centro_costo as centro_costo','miusers.nombre as usuario')
            ->get();;
        return view('equipos.index',compact('equipments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_equipos = Equipmentype::all();
        $tipo_equipo_options = [];
        $tipo_equipo_options['']='';
        foreach($tipo_equipos as $tipo_equipo){
            $tipo_equipo_options[$tipo_equipo->id] = $tipo_equipo->nombre;
        }
        $departments = Department::all();
        $departments_options = [];
        $departments_options['']='';
        foreach ($departments as $department){
            $departments_options[$department->id]=$department->centro_costo;
        }
        $nivels = Nivel::all()->sortBy('nombre');;
        $nivels_options = [];
        $nivels_options['']='';
        foreach ($nivels as $nivels_option){
            $nivels_options[$nivels_option->id]=$nivels_option->nombre;
        }
        $usuarios = Miuser::all();
        $usuarios_options = [];
        $usuarios_options['']='';
        foreach ($usuarios as $usuario){
            $usuarios_options[$usuario->id]=$usuario->nombre;
        }
        $marcas = Marca::all();
        $marcas_options = [];
        $marcas_options['']='';
        foreach ($marcas as $marca){
            $marcas_options[$marca->id]=$marca->nombre;
        }
        $estados = Estate::all();
        $estados_options = [];
        $estados_options['']='';
        foreach ($estados as $estado){
            $estados_options[$estado->id]=$estado->nombre;
        }
        return view('equipos.create',compact('tipo_equipo_options','departments_options','nivels_options','usuarios_options','marcas_options','estados_options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipment = new Equipment();
        $equipment->id_tipo_equipo=$request->input('tipo_equipo');
        $equipment->id_nivel=$request->input('nivel');
        $equipment->id_centro_costo=$request->input('centro_costo');
        $equipment->ubicacion=$request->input('ubicacion');
        $equipment->id_usuario=$request->input('usuario');
        $equipment->numero_inventario=$request->input('inventario');
        $equipment->id_marca=$request->input('marca');
        $equipment->modelo=$request->input('modelo');
        $equipment->serie=$request->input('serie');
        $equipment->id_estado_equipo=$request->input('estado');
        $equipment->fecha_adquisicion=$request->input('fecha_adquisicion');
        $equipment->fecha_vencimiento=$request->input('fecha_vencimiento');
        if(!$equipment->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('equipments/'.$equipment->id)->with('success', 'Equipo Registrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('equipos.info',compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
