<?php

namespace App\Http\Controllers;

use App\Models\Elementos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElementosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $elementos = Elementos::get();  
     return response(json_encode($elementos), 200)->header('Content-type', 'text/plain');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $elementos= new Elementos();
        $elementos->nombre = $request->post('nombre');
        $elementos->peso = $request->post('peso');
        $elementos->simbolo=$request->post('simbolo');

        $elementos->save();

        $response = array(
            "message" => "Guardado exitosamente",
            "success" => true
        );

        return response(json_encode($response), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Elementos  $elementos
     * @return \Illuminate\Http\Response
     */
    public function show(Elementos $elementos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Elementos  $elementos
     * @return \Illuminate\Http\Response
     */
    public function edit(Elementos $elementos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Elementos  $elementos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $elementos= new Elementos();
        $idElemento = $request->post('idElemento');
        $nombre = $request->post('nombre');
        $peso = $request->post('peso');
        $simbolo=$request->post('simbolo');

        DB::select("call sp_edit_elemento('$idElemento','$nombre','$peso','$simbolo')");

       $response = array(
            "message" => "Actualizado exitosamente",
            "success" => true
        );

        return response(json_encode($response), 200)->header('Content-type', 'text/plain');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Elementos  $elementos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       DB::select("call sp_detroy_elemento('$id')");
       
    $response = array(
        "msg" => "Successfully deleted",
        'success' => true,
        'token'=> csrf_token() 
    );

    return response(json_encode($response), 200)->header('Content-type', 'text/plain');
    }
}
