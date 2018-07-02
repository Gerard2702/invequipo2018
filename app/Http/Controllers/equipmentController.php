<?php

namespace App\Http\Controllers;

use App\Department;
use App\Direccion;
use App\Domain;
use App\Equipment;
use App\Equipmentype;
use App\Estate;
use App\Marca;
use App\Miuser;
use App\Nivel;
use App\Periferico;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Style_Alignment;
use PHPExcel_Worksheet_Drawing;

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
            ->leftjoin('nivels', 'equipment.id_nivel', '=', 'nivels.id')
            ->leftjoin('miusers', 'equipment.id_usuario', '=', 'miusers.id')
            ->leftjoin('departments', 'miusers.id_department', '=', 'departments.id')
            ->select('equipment.*', 'equipmentypes.nombre as tipo_equipo','nivels.nombre as nivel','departments.centro_costo as centro_costo','miusers.nombre as usuario')
            ->get();
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
        $equipment->id_tipo_equipo=$request->input('id_tipo_equipo');
        $equipment->id_nivel=$request->input('id_nivel');
        $equipment->id_centro_costo=$request->input('id_centro_costo');
        $equipment->ubicacion=$request->input('ubicacion');
        $equipment->id_usuario=$request->input('id_usuario');
        $equipment->numero_inventario=$request->input('numero_inventario');
        $equipment->id_marca=$request->input('id_marca');
        $equipment->modelo=$request->input('modelo');
        $equipment->serie=$request->input('serie');
        $equipment->id_estado_equipo=$request->input('id_estado');
        $equipment->fecha_adquisicion=$request->input('fecha_adquisicion');
        $equipment->fecha_vencimiento=$request->input('fecha_vencimiento');
        $equipment->observaciones = $request->input('observaciones');
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
    public function show($id)
    {

        $equipment = Equipment::join('equipmentypes', 'equipment.id_tipo_equipo', '=', 'equipmentypes.id')
            ->leftjoin('nivels', 'equipment.id_nivel', '=', 'nivels.id')
            ->leftjoin('miusers', 'equipment.id_usuario', '=', 'miusers.id')
            ->leftjoin('departments', 'miusers.id_department', '=', 'departments.id')
            ->leftjoin('estates', 'equipment.id_estado_equipo', '=', 'estates.id')
            ->leftjoin('perifericos', 'equipment.id_cd', '=', 'perifericos.id')
            ->leftjoin('direccions', 'equipment.id_direccionip', '=', 'direccions.id')
            ->leftjoin('domains', 'equipment.id_dominio', '=', 'domains.id')
            ->select('equipment.*', 'equipmentypes.nombre as tipo_equipo','nivels.nombre as nivel','departments.centro_costo as centro_costo','miusers.nombre as usuario','perifericos.nombre as cd','direccions.nombre as direccionip','domains.nombre as dominio','equipment.id_marca as marca','estates.nombre as estado')
            ->where('equipment.id','=',$id)
            ->get();
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
        $equipment = Equipment::find($id);
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

        $estados = Estate::all();
        $estados_options = [];
        $estados_options['']='';
        foreach ($estados as $estado){
            $estados_options[$estado->id]=$estado->nombre;
        }
        return view('equipos.edit',compact('equipment','tipo_equipo_options','departments_options','nivels_options','usuarios_options','estados_options'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $equipment->fill($request->all());
        if(!$equipment->save()){
            App::abort(500, 'Error');
        }else{
            return redirect()->route('equipments.show',$equipment->id)->with('success', 'Equipo Actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        if(!$equipment->delete()){
            App::abort(500, 'Error');
        }else{
            return redirect()->route('equipments.index')->with('success', 'Equipo Eliminado!');
        }
    }

    public function addcaracteristicas($id){

        $equipment = Equipment::find($id);

        $cds = Periferico::all();
        $cd_options = [];
        $cd_options['']='';
        foreach ($cds as $cd){
            $cd_options[$cd->id]=$cd->nombre;
        }
        return view('equipos.addcaracteristica',compact('equipment','cd_options'));
    }

    public function storeCaracteristicas(Request $request,$id){

        $equipment = Equipment::find($id);
        $equipment->marca_modelo = $request->input('marca_modelo');
        $equipment->velocidad = $request->input('velocidad');
        $equipment->ram = $request->input('ram');
        $equipment->hdd = $request->input('hdd');
        $equipment->id_cd = $request->input('id_cd');

        if(!$equipment->save()){
            App::abort(500, 'Error');
        }else{
           return redirect()->route('equipments.show',$id)->with('success', 'Caracteristicas Agregadas!');
        }
    }
    public function addSoftware($id){

        $equipment = Equipment::find($id);

        return view('equipos.addsoftware',compact('equipment'));
    }

    public function storeSoftware(Request $request,$id){

        $equipment = Equipment::find($id);
        $equipment->sistema_operativo = $request->input('sistema_operativo');
        $equipment->licencia_sistema = $request->input('licencia_sistema');
        $equipment->office = $request->input('office');
        $equipment->licencia_office = $request->input('licencia_office');
        $equipment->sistemas_institucionales = $request->input('sistemas_institucionales');
        $equipment->otro_software = $request->input('otro_software');

        if(!$equipment->save()){
            App::abort(500, 'Error');
        }else{
            return redirect()->route('equipments.show',$id)->with('success', 'Softwares Agregados!');
        }
    }

    public function addRed($id){
        $equipment = Equipment::find($id);
        $direccion = Direccion::all();
        $direccion_option = [];
        $direccion_option['']='';
        foreach ($direccion as $dir){
            $direccion_option[$dir->id]=$dir->nombre;
        }
        $domain = Domain::all();
        $domain_option = [];
        $domain_option['']='';
        foreach ($domain as $do){
            $domain_option[$do->id]=$do->nombre;
        }
        return view('equipos.addred',compact('equipment','direccion_option','domain_option'));
    }

    public function storeRed(Request $request,$id){
        $equipment = Equipment::find($id);
        $equipment->nombre_equipo = $request->input('nombre_equipo');
        $equipment->id_direccionip = $request->input('id_direccionip');
        $equipment->id_dominio = $request->input('id_dominio');
        if(!$equipment->save()){
            App::abort(500, 'Error');
        }else{
            return redirect()->route('equipments.show',$id)->with('success', 'Identificacion de Red Agregada!');
        }
    }

    public function generate(){
        $now = new \DateTime();
        $fecha = $now->format('Y-m-d');

        Excel::create('InventarioInformatico-'.$fecha, function($excel) use($fecha) {

            $excel->sheet('Inventario', function($sheet) use ($fecha) {
                //HEADER
                $titulos = array(
                    'family'     => 'Arial',
                    'size'       => '20',
                    'bold'       => true
                );
                $tableheader = array(
                    'family'     => 'Arial',
                    'size'       => '12',
                    'bold'       => true
                );

                $centerText = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    )
                );

                $sheet->cells('A5:Z5', function($cells) {
                    $cells->setBorder('thin','thin','thin','thin');
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                });
                $sheet->getStyle("A5:Z5")->getAlignment()->setWrapText(true);

                $sheet->setWidth(array(
                    'A' =>  5,
                    'B' =>  15,
                    'C' => 20,
                    'D' => 25,
                    'E' => 20,
                    'F' => 20,
                    'G' => 20,
                    'H' => 20,
                    'I' => 20,
                    'J' => 20,
                    'K' => 20,
                    'L' => 20,
                    'M' => 20,
                    'N' => 20,
                    'O' => 20,
                    'P' => 20,
                    'Q' => 20,
                    'R' => 20,
                    'S' => 30,
                    'T' => 30,
                    'U' => 20,
                    'V' => 20,
                    'W' => 20,
                    'X' => 20,
                    'Y' => 20,
                    'Z' => 20,
                    'AA' => 40
                ));

                $sheet->mergeCells('A1:Z1');
                $sheet->row(1,['                   INSTITUTO  SALVADOREÑO  DEL  SEGURO  SOCIAL']);
                $sheet->row(1, function($row) use ($titulos) { $row->setFont($titulos); });
                $sheet->mergeCells('A2:Z2');
                $sheet->row(2,['                   INFORMÁTICA, CONSULTORIO  DE  ESPECIALIDADES']);
                $sheet->row(2, function($row) use ($titulos) { $row->setFont($titulos); });
                $sheet->mergeCells('A3:Z3');
                $sheet->row(3,['                   INVENTARIO  DE  EQUIPO  INFORMÁTICO,'.$fecha]);
                $sheet->row(3, function($row) use ($titulos) { $row->setFont($titulos); });

                $sheet->row(4, function($row) use ($tableheader) {
                    $row->setBackground('#000000');
                    $row->setFontColor('#FFFFFF');
                    $row->setFont($tableheader);
                });
                $sheet->mergeCells('A4:I4');
                $sheet->getStyle("A4:I4")->applyFromArray($centerText);
                $sheet->mergeCells('J4:N4');
                $sheet->getStyle("J4:N4")->applyFromArray($centerText);
                $sheet->mergeCells('O4:T4');
                $sheet->getStyle("O4:T4")->applyFromArray($centerText);
                $sheet->mergeCells('U4:W4');
                $sheet->getStyle("U4:W4")->applyFromArray($centerText);
                $sheet->mergeCells('X4:Z4');
                $sheet->getStyle("X4:Z4")->applyFromArray($centerText);
                $sheet->row(4,array('DATOS GENERALES','','','','','','','','','CARACTERISTICAS','','','','','SOFTWARE','','','','','','IDENTIFICACION DE RED','','','ESTADO DEL EQUIPO'));
                $sheet->getStyle("A5:Z5")->applyFromArray($centerText);
                $sheet->row(5, function($row) { $row->setBackground('#CCCCCC'); });
                $sheet->row(5,['Correlativo','Tipo de Equipo','Ubicacion','Nombre de Usuario','Centro de Costo','Numero de Inventario','Marca','Modelo','Serie','Marca & Modelo','Veloc.','RAM','HDD','CD/DVD','Sistema Operativo','Licencia S.O.','Version de Office','Licencia de Office','Sistemas Institucionales','Otros Software (Utilitarios)','Nombre del Equipo','Direccion IP','Nombre del Dominio','Fecha de Adquisicion','Fecha de Vencimiento de Garantia','Estado del Equipo','Observaciones']);

                $equipmets = Equipment::join('miusers','equipment.id_usuario','=','miusers.id')
                    ->join('departments','miusers.id_department','=','departments.id')
                    ->join('equipmentypes','equipment.id_tipo_equipo','=','equipmentypes.id')
                    ->leftjoin('direccions','equipment.id_direccionip','=','direccions.id')
                    ->leftjoin('domains','equipment.id_dominio','=','domains.id')
                    ->join('estates','equipment.id_estado_equipo','=','estates.id')
                    ->select('equipment.*','miusers.nombre as usuario','departments.centro_costo as centro_costo','equipmentypes.nombre as tipo_equipo','direccions.nombre as direccion','domains.nombre as dominio','estates.nombre as estado_equipo')->orderBy('equipment.ubicacion','asc')
                    ->get();
                $num = 0;
                $rows = 6;
                foreach ($equipmets as $equipmet){
                    $sheet->row($rows,[
                        $num,
                        $equipmet->tipo_equipo,
                        $equipmet->ubicacion,
                        $equipmet->usuario,
                        $equipmet->centro_costo,
                        $equipmet->numero_inventario,
                        $equipmet->id_marca,
                        $equipmet->modelo,
                        $equipmet->serie,
                        $equipmet->marca_modelo,
                        $equipmet->velocidad,
                        $equipmet->ram,
                        $equipmet->hdd,
                        '',
                        $equipmet->sistema_operativo,
                        $equipmet->licencia_sistema,
                        $equipmet->office,
                        $equipmet->licencia_office,
                        $equipmet->sistemas_institucionales,
                        $equipmet->otro_software,
                        $equipmet->nombre_equipo,
                        $equipmet->direccion,
                        $equipmet->dominio,
                        $equipmet->fecha_adquisicion,
                        $equipmet->fecha_vencimiento,
                        $equipmet->estado_equipo,
                        $equipmet->observaciones,
                        ]);
                    $letters = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
                    foreach ($letters as $letter){
                        $sheet->cell("$letter$rows", function($cell){
                            $cell->setBorder('thin','thin','thin','thin');
                            $cell->setValignment('center');
                            $cell->setAlignment('center');
                        });
                    }
                    $sheet->getStyle("A$rows:Z$rows")->getAlignment()->setWrapText(true);
                    $sheet->getStyle("AA$rows")->getAlignment()->setWrapText(true);
                    $num++;
                    $rows++;
                }
                $row = $rows-1;
                $sheet->cells("AA1:AA$row", function($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                });

            });
        })->export('xls');
    }

    public function generateExcel(){
        return view('generarexcel');
    }
}
