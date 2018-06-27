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
        $row = count($bitacoras);
        $error = 'No se encontraron Bitacoras en la fecha seleccionada';
        if($row==0){
            return view('bitacora.index',compact('bitacoras','fecha','error'));
        }else{
            return view('bitacora.index',compact('bitacoras','fecha'));
        }
    }

    public function index2($fecha)
    {
        $bitacoras = Bitacora::join('equipment','bitacoras.id_equipo','=','equipment.id')
            ->join('services','bitacoras.id_tipo_servicio','=','services.id')
            ->join('equipmentypes','equipment.id_tipo_equipo','=','equipmentypes.id')
            ->join('miusers','equipment.id_usuario','=','miusers.id')
            ->select('bitacoras.*','equipment.numero_inventario','services.nombre as servicio','equipmentypes.nombre as tipo_equipo','equipment.ubicacion','miusers.nombre as usuario')
            ->where('bitacoras.fecha','=',$fecha)
            ->get();
        $row = count($bitacoras);
        $error = 'No se encontraron Bitacoras en la fecha seleccionada';
        if($row==0){
            return view('bitacora.index',compact('bitacoras','fecha','error'));
        }else{
            return view('bitacora.index',compact('bitacoras','fecha'));
        }
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
    public function edit(Bitacora $bitacora)
    {
        $equipment = Equipment::join('equipmentypes', 'equipment.id_tipo_equipo', '=', 'equipmentypes.id')
            ->leftjoin('nivels', 'equipment.id_nivel', '=', 'nivels.id')
            ->join('miusers', 'equipment.id_usuario', '=', 'miusers.id')
            ->join('departments', 'miusers.id_department', '=', 'departments.id')
            ->join('estates', 'equipment.id_estado_equipo', '=', 'estates.id')
            ->select('equipment.*', 'equipmentypes.nombre as tipo_equipo','nivels.nombre as nivel','departments.centro_costo as centro_costo','miusers.nombre as usuario','equipment.id_marca as marca','estates.nombre as estado')
            ->where('equipment.id','=',$bitacora->id_equipo)
            ->get();

        $servicios = Service::all();
        $servicios_options = [];
        foreach ($servicios as $servicio){
            $servicios_options[$servicio->id]=$servicio->nombre;
        }

        return view('bitacora.edit',compact('bitacora','equipment','servicios_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bitacora $bitacora)
    {
        $bitacora->fill($request->all());
        if(!$bitacora->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('bitacora/set/'.$bitacora->fecha)->with('success', 'Bitacora Actualizada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bitacora $bitacora)
    {
        $fecha = $bitacora->fecha;
        if(!$bitacora->delete()){
            App::abort(500, 'Error');
        }else{
            return redirect('bitacora/set/'.$fecha)->with('success', 'Bitacora Eliminada!');
        }
    }

    public function cargar($id){
        $equipment = Equipment::join('equipmentypes', 'equipment.id_tipo_equipo', '=', 'equipmentypes.id')
            ->leftjoin('nivels', 'equipment.id_nivel', '=', 'nivels.id')
            ->join('miusers', 'equipment.id_usuario', '=', 'miusers.id')
            ->join('departments', 'miusers.id_department', '=', 'departments.id')
            ->join('estates', 'equipment.id_estado_equipo', '=', 'estates.id')
            ->select('equipment.*', 'equipmentypes.nombre as tipo_equipo','nivels.nombre as nivel','departments.centro_costo as centro_costo','miusers.nombre as usuario','equipment.id_marca as marca','estates.nombre as estado')
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
        $row = count($bitacoras);
        $error = 'No se encontraron Bitacoras en la fecha seleccionada';
        if($row==0){
            return view('bitacora.bitacoras',compact('bitacoras','error'));
        }else{
            return view('bitacora.bitacoras',compact('bitacoras'));
        }
    }

    public function generate($fecha){
        $bitacoras = Bitacora::join('equipment','bitacoras.id_equipo','=','equipment.id')
            ->join('services','bitacoras.id_tipo_servicio','=','services.id')
            ->join('equipmentypes','equipment.id_tipo_equipo','=','equipmentypes.id')
            ->join('miusers','equipment.id_usuario','=','miusers.id')
            ->join('departments','miusers.id_department','=','departments.id')
            ->select('bitacoras.*','equipment.numero_inventario as numero_inventario','services.nombre as servicio','equipmentypes.nombre as tipo_equipo','equipment.ubicacion as ubicacion','miusers.nombre as usuario','miusers.telefono as telefono','departments.centro_costo')
            ->where('bitacoras.fecha','=',$fecha)->orderBy('equipment.numero_inventario', 'asc')
            ->get();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection(array('orientation' => 'landscape','marginLeft'=>'500','marginRight'=>'500'));
        $text = 'CENTRO DE ATENCION AL CUAL PERTENECEN LOS EQUIPOS: Consultorio Especialidades';
        $fecha = 'FECHA: '.$fecha;
        $section->addText($text);
        $section->addText($fecha);
        $tableStyle = array(
            'borderColor' => '4c4c4c',
            'borderSize'  => 6,
            'cellMargin'  => 50
        );
        $header = array(
            'bgColor' => '031b64'
        );
        $white = array(
            'color' => 'FFFFFF'
        );
        $table = $section->addTable($tableStyle);
        $table->addRow(900, array('tblHeader' => true));
        $table->addCell(200, $header)->addText('CENTRO DE COSTO',$white);
        $table->addCell(300, $header)->addText('NOMBRE DEL RESPONSABLE DEL EQUIPO',$white);
        $table->addCell(700, $header)->addText('UBICACIÓN',$white);
        $table->addCell(200, $header)->addText('TELÉFONO DEL RESPONSABLE',$white);
        $table->addCell(300, $header)->addText('TIPO DE EQUIPO',$white);
        $table->addCell(200, $header)->addText('NO. INVENTARIO',$white);
        $table->addCell(700, $header)->addText('DESCRIPCIÓN DE LA FALLA',$white);
        $table->addCell(200, $header)->addText('TIPO DE SERVICIO',$white);
        $table->addCell(200, $header)->addText('ESTADO',$white);
        $table->addCell(200, $header)->addText('TIPO DE ATENCIÓN',$white);
        $table->addCell(200, $header)->addText('# DE REQUERIMIENTO',$white);

        foreach ($bitacoras as $bitacora){
            $table->addRow();
            $table->addCell(200)->addText($bitacora->centro_costo);
            $table->addCell(300)->addText($bitacora->usuario);
            $table->addCell(700)->addText($bitacora->ubicacion);
            $table->addCell(200)->addText($bitacora->telefono);
            $table->addCell(300)->addText($bitacora->tipo_equipo);
            $table->addCell(200)->addText($bitacora->numero_inventario);
            $table->addCell(700)->addText($bitacora->descripcion);
            $table->addCell(200)->addText($bitacora->servicio);
            $table->addCell(200)->addText('Terminado');
            $table->addCell(200)->addText('Presencial');
            $table->addCell(200)->addText('');
        }
        $n = "";
        $text = "Técnico mantenimiento Tecnológico: Ing. Sergio D. León TEL: 25914524";
        $section->addText($n);
        $section->addText($n);
        $section->addText($text);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path('test.docx'));

        return response()->download(storage_path('test.docx'));

    }
}
