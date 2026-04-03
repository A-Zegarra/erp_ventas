<?php

namespace App\Http\Controllers;

use App\Models\UnidadSunat;
use Illuminate\Http\Request;

class UnidadSunatController extends Controller
{
    public function index()
    {
        $unidades = UnidadSunat::latest()->paginate(10);

        return view('unidades-sunat.index', compact('unidades'));
    }

    public function create()
    {
        return view('unidades-sunat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo_sunat' => 'required|string|max:10|unique:unidad_sunats,codigo_sunat',
            'descripcion'  => 'required|string|max:50',
            'activo'       => 'required|boolean',
        ]);

        $validated['activo'] = $request->boolean('activo');

        UnidadSunat::create($validated);

        return redirect()
            ->route('unidades-sunat.index')
            ->with('success', 'Unidad SUNAT creada correctamente.');
    }

    public function show(UnidadSunat $unidadSunat)
    {
        return redirect()->route('unidades-sunat.index');
    }

    public function edit(UnidadSunat $unidadSunat)
    {
        return view('unidades-sunat.edit', compact('unidadSunat'));
    }

    public function update(Request $request, UnidadSunat $unidadSunat)
    {
        $validated = $request->validate([
            'codigo_sunat' => 'required|string|max:10|unique:unidad_sunats,codigo_sunat,' . $unidadSunat->id,
            'descripcion'  => 'required|string|max:50',
            'activo'       => 'required|boolean',
        ]);

        $validated['activo'] = $request->boolean('activo');

        $unidadSunat->update($validated);

        return redirect()
            ->route('unidades-sunat.index')
            ->with('success', 'Unidad SUNAT actualizada correctamente.');
    }

    public function destroy(UnidadSunat $unidadSunat)
    {
        $unidadSunat->delete();

        return redirect()
            ->route('unidades-sunat.index')
            ->with('success', 'Unidad SUNAT eliminada correctamente.');
    }
}
