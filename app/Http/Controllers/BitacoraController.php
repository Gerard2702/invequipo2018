<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\Equipment;
use App\Service;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = new \DateTime();
        $fecha = $now->format('Y-m-d');
        $bitacoras = Bitacora::join('equipment','bitacoras.id_equipo','=','equipment.id')
            ->join('services','bitacoras.id_tipo_servicio','=','services.id')
            ->join('equipmentypes','equipment.id_tipo_equipo','=','equipmentypes.id')
            ->join('miusers','equipment.id_usuario','=','miusers.id')
            ->select('bitacoras.*','equipment.numero_inventario','services.nombre as servicio','equipmentypes.nombre as tipo_equipo','equipment.ubicacion','miusers.nombre as usuario')
            ->where('bitacoras.fecha','=',$fecha)
            ->get();
        return view('bitacora.index',compact('bitacoras','fecha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventarios = Equipment::select('id','numero_inventario')->get();
        $inventarios_options = [];
        $inventarios_options['']='';
        foreach ($inventarios as $inventario){
            $inventarios_options[$inventario->id]=$inventario->numero_inventario;
        }
        return view('bitacora.create',compact('inventarios_options'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bitacora = new Bitacora();
        $bitacora->id_equipo = $request->input('equipo');
        $bitacora->id_tipo_servicio = $request->input('tipo_servicio');
        $bitacora->descripcion = $request->input('descripcion');
        $bitacora->fecha = $request->input('fecha');
        if(!$bitacora->save()){
            App::abort(500, 'Error');
        }else{
            return redirect()->route('bitacora.create')->with('success', 'Bitacora Registrada!');
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

    public function cargar($id){
        $equipment = Equipment::join('equipmentypes', 'equipment.id_tipo_equipo', '=', 'equipmentypes.id')
            ->join('nivels', 'equipment.id_nivel', '=', 'nivels.id')
            ->join('departments', 'equipment.id_centro_costo', '=', 'departments.id')
            ->join('miusers', 'equipment.id_usuario', '=', 'miusers.id')
            ->join('marcas', 'equipment.id_marca', '=', 'marcas.id')
            ->join('estates', 'equipment.id_estado_equipo', '=', 'estates.id')
            ->select('equipment.*', 'equipmentypes.nombre as tipo_equipo','nivels.nombre as nivel','departments.centro_costo as centro_costo','miusers.nombre as usuario','marcas.nombre as marca','estates.nombre as estado')
            ->where('equipment.id','=',$id)
            ->get();

        $servicios = Service::all();
        $servicios_options = [];
        $servicios_options['']='';
        foreach ($servicios as $servicio){
            $servicios_options[$servicio->id]=$servicio->nombre;
        }
        return view('bitacora.equipo',compact('equipment','servicios_options'));
    }

    public function bitacoras($fecha){

        $bitacoras = Bitacora::join('equipment','bitacoras.id_equipo','=','equipment.id')
            ->join('services','bitacoras.id_tipo_servicio','=','services.id')
            ->join('equipmentypes','equipment.id_tipo_equipo','=','equipmentypes.id')
            ->join('miusers','equipment.id_usuario','=','miusers.id')
            ->select('bitacoras.*','equipment.numero_inventario','services.nombre as servicio','equipmentypes.nombre as tipo_equipo','equipment.ubicacion','miusers.nombre as usuario')
            ->where('bitacoras.fecha','=',$fecha)
            ->get();
        return view('bitacora.bitacoras',compact('bitacoras'));
    }
}
