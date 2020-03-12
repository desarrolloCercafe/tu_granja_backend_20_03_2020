<?php

namespace App\Http\Controllers\API;

use App\OrdenesProduccion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrdenesProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ordenes = OrdenesProduccion::all();
        return response()->json($Ordenes, 200);
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
        /* $Ordenes = new OrdenesProduccion();
        $Ordenes */

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdenesProduccion  $ordenesProduccion
     * @return \Illuminate\Http\Response
     */
    public function show(OrdenesProduccion $ordenesProduccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdenesProduccion  $ordenesProduccion
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdenesProduccion $ordenesProduccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdenesProduccion  $ordenesProduccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdenesProduccion $ordenesProduccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdenesProduccion  $ordenesProduccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdenesProduccion $ordenesProduccion)
    {
        //
    }
}
