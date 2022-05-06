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
       
        // $elementos = Elementos::create($request->all());


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
    public function update(Request $request,$id)
    {
        $elementos= new Elementos();
        $elementos->nombre = $request->post('nombre');
        $elementos->peso = $request->post('peso');
        $elementos->simbolo=$request->post('simbolo');

        Elementos::find($id)->update($elementos);
        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Elementos  $elementos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Elemento::find($id)->delete();
      return response()->json([
          'message' => "Successfully deleted",
          'success' => true
      ], 200);
    }
}
