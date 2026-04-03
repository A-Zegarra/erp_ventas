<?php

namespace App\Http\Controllers;

use App\Models\UnidadSunat;
use Illuminate\Http\Request;

class UnidadSunatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('unidades-sunat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UnidadSunat $unidadSunat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnidadSunat $unidadSunat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnidadSunat $unidadSunat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnidadSunat $unidadSunat)
    {
        //
    }
}
