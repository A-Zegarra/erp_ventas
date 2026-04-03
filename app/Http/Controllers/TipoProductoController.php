<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
    public function index()
    {
        $tiposProducto = TipoProducto::latest()->paginate(10);

        return view('tipos-producto.index', compact('tiposProducto'));
    }

    public function create()
    {
        return view('tipos-producto.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:100|unique:tipo_productos,nombre',
        'descripcion' => 'nullable|string|max:255',
        'activo' => 'required|boolean',
    ]);

    $validated['activo'] = $request->boolean('activo');

    TipoProducto::create($validated);

    return redirect()
        ->route('tipos-producto.index')
        ->with('success', 'Tipo de producto creado correctamente.');
}
 public function edit(TipoProducto $tipoProducto)
{
    return view('tipos-producto.edit', compact('tipoProducto'));
}

public function update(Request $request, TipoProducto $tipoProducto)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:100|unique:tipo_productos,nombre,' . $tipoProducto->id,
        'descripcion' => 'nullable|string|max:255',
        'activo' => 'required|boolean',
    ]);

    $validated['activo'] = $request->boolean('activo');

    $tipoProducto->update($validated);

    return redirect()
        ->route('tipos-producto.index')
        ->with('success', 'Tipo de producto actualizado correctamente.');
}
    public function destroy(TipoProducto $tipoProducto)
    {
        $tipoProducto->delete();

        return redirect()
            ->route('tipos-producto.index')
            ->with('success', 'Tipo de producto eliminado correctamente.');
    }
}
