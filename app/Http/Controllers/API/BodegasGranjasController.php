<?php

namespace App\Http\Controllers\API;

use App\bodegasGranjas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BodegasGranjasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodega = bodegasGranjas::select('bodegasGranjas.id_bodega', 'granjas.nombre_granja', 'bodegasGranjas.nombre_bodega',
        'bodegasGranjas.capacidad', 'concentrados.nombre_concentrado', 'bodegasGranjas.unidad_medida', 'bodegasGranjas.cantidad')
        ->join('granjas', 'bodegasGranjas.id_granja', '=', 'granjas.id')
        ->join('concentrados', 'bodegasGranjas.dieta', '=', 'concentrados.id')
        ->get();

        $i = 0;
        foreach($bodega as $bodegas){
            $divisor = 1;
            if($bodega[$i]->unidad_medida == "ton"){
                $divisor = 1000;
            }elseif($bodega[$i]->unidad_medida == "bul"){
                $divisor = 40;
            }
            $bodega[$i]->capacidad = $bodega[$i]->capacidad/$divisor;
            $bodega[$i]->cantidad = $bodega[$i]->cantidad/$divisor;
            $i++;
        }

        return response()->json($bodega, 200);

        /* Ejemplo
        $corrales = Corral::select('corral.id', 'corral.cod_corral', 'granjas.nombre_granja')
        ->join('granjas', 'corral.id_granja', '=', 'granjas.id')
        ->get(); */

        /* $bodega = bodegasGranjas::all();
        return response()->json($bodega, 200); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $multiplicador = 1;
        $bodega = new bodegasGranjas();
        $bodega->id_granja = $request->id_granja;
        $bodega->nombre_bodega = $request->nombre_bodega;
        $bodega->dieta = $request->dieta;
        if ($request->unidad_medida == 'ton'){
            $multiplicador = 1000;            
        } elseif ($request->unidad_medida == 'bul'){
            $multiplicador = 40;
        }
        $bodega->capacidad = $request->capacidad*$multiplicador;
        $bodega->cantidad = $request->cantidad*$multiplicador;
        $bodega->unidad_medida = $request->unidad_medida;

        $idDieta = DB::select('SELECT Dieta FROM bodegasgranjas WHERE Dieta = ? AND id_granja = ?', [$request->dieta, $request->id_granja]);

        if (Count($idDieta)){
            return response()->json("Doble", 200);
        } else {
            $bodega->save();
            return response()->json("OK", 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bodegasGranjas  $bodegasGranjas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bodega = bodegasGranjas::select('bodegasGranjas.id_bodega', 'granjas.nombre_granja', 'bodegasGranjas.nombre_bodega',
        'bodegasGranjas.capacidad', 'concentrados.nombre_concentrado', 'bodegasGranjas.unidad_medida', 'bodegasGranjas.cantidad')
        ->join('granjas', 'bodegasGranjas.id_granja', '=', 'granjas.id')
        ->join('concentrados', 'bodegasGranjas.dieta', '=', 'concentrados.id')
        ->where('id_bodega', $id)->get();

        $divisor = 1;

        if($bodega[0]->unidad_medida == "ton"){
            $divisor = 1000;
        }elseif($bodega[0]->unidad_medida == "bul"){
            $divisor = 40;
        }

        $bodega[0]->capacidad = $bodega[0]->capacidad/$divisor;
        $bodega[0]->cantidad = $bodega[0]->cantidad/$divisor;

        return response()->json($bodega[0], 200);

        /* $bodega = bodegasGranjas::where('id_bodega', $id)->get();
        return response()->json($bodega, 200); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bodegasGranjas  $bodegasGranjas
     * @return \Illuminate\Http\Response
     */
    public function edit(bodegasGranjas $bodegasGranjas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bodegasGranjas  $bodegasGranjas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $multiplicador = 1;
        if ($request->unidad_medida == 'ton'){
            $multiplicador = 1000;            
        } elseif ($request->unidad_medida == 'bul'){
            $multiplicador = 40;
        }
        $bodega = DB::table('bodegasgranjas')
        ->where('id_bodega', $id)
        ->update([
            'nombre_bodega' => $request["nombre_bodega"],
            'dieta' => $request["dieta"],
            'unidad_medida' => $request["unidad_medida"],
            'capacidad' => $request["capacidad"]*$multiplicador,
            'cantidad' => $request["cantidad"]*$multiplicador,
            ]);
        return response()->json("OK", 200);

        /* $bodega = DB::table('bodegasgranjas')
        ->where('id_bodega', $id)
        ->update([
            'nombre_bodega' => $request["nombre_bodega"],
            'dieta' => $request["dieta"],
            'unidad_medida' => $request["unidad_medida"],
            'capacidad' => $request["capacidad"],
            'cantidad' => $request["cantidad"],
            ]);
        return response()->json("OK", 200); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bodegasGranjas  $bodegasGranjas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {                
        DB::table('bodegasgranjas')->where('id_bodega', $id)->delete();
        return response()->json("OK", 200);
    }
}