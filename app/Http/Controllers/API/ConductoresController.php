<?php

namespace App\Http\Controllers\API;

use App\conductores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conductores = conductores::all();
        return response()->json($conductores, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\conductores  $conductores
     * @return \Illuminate\Http\Response
     */
    public function show(conductores $conductores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\conductores  $conductores
     * @return \Illuminate\Http\Response
     */
    public function edit(conductores $conductores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\conductores  $conductores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conductores $conductores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\conductores  $conductores
     * @return \Illuminate\Http\Response
     */
    public function destroy(conductores $conductores)
    {
        //
    }
}