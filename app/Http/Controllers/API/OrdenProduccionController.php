<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\OrdenProduccion;
use App\Concentrados;

class OrdenProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $op = DB::table('orden_produccion')
                ->join('concentrados', 'orden_produccion.id_dieta', '=', 'concentrados.id')
                ->select('orden_produccion.*', 'concentrados.ref_concentrado')
                ->get();

        return response()->json($op, 200);
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
        $op = new OrdenProduccion();
        $op->consecutivo = $request->numOp;
        $op->id_dieta =  $request->dieta;
        $op->consecutivo_dieta = $request->consDieta;
        $op->cantidad_baches = $request->numBaches;
        $op->save();
        return response()->json('OK', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdenProduccion  $ordenProduccion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $op = OrdenProduccion::find($id);
        $dieta = Concentrados::find($op->id_dieta);
        $op['nombreDieta'] = $dieta->nombre_concentrado;
        return response()->json($op, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdenProduccion  $ordenProduccion
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenProduccion $ordenProduccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdenProduccion  $ordenProduccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $op = OrdenProduccion::find($id);
        $op->consecutivo = $request->numOp;
        $op->id_dieta =  $request->dieta;
        $op->consecutivo_dieta = $request->consDieta;
        $op->cantidad_baches = $request->numBaches;
        $op->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdenProduccion  $ordenProduccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenProduccion $ordenProduccion)
    {
        //
    }
}
