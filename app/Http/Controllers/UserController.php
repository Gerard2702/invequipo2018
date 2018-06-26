<?php

namespace App\Http\Controllers;

use App\Miuser;
use App\Department;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Miuser::join('departments', 'miusers.id_department', '=', 'departments.id')
            ->select('miusers.*', 'departments.centro_costo as centro_costo')
            ->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $departments_options = [];
        $departments_options['']='';
        foreach ($departments as $department){
            $departments_options[$department->id]=$department->centro_costo;
        }
        return view('users.create',compact('departments_options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Miuser();
        $user->nombre = $request->input('nombre');
        $user->id_department = $request->input('id_department');
        $user->telefono = $request->input('telefono');
        if(!$user->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('users')->with('success', 'Usuario Registrado!');
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
    public function edit(Miuser $user)
    {
        $departments = Department::all();
        $departments_options = [];
        $departments_options['']='';
        foreach ($departments as $department){
            $departments_options[$department->id]=$department->centro_costo;
        }

        return view('users.edit',compact('user','departments_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Miuser $user)
    {
        $user->fill($request->all());
        if(!$user->save()){
            App::abort(500, 'Error');
        }else{
            return redirect('users')->with('success', 'Usuario Actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Miuser $user)
    {
        if(!$user->delete()){
            App::abort(500, 'Error');
        }else{
            return redirect('users')->with('success', 'Usuario Eliminado!');
        }
    }
}
