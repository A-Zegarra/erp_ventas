<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use App\Models\UnidadSunat;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['tipoProducto', 'unidadSunat'])
            ->latest()
            ->paginate(10);

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $tipos = TipoProducto::where('activo', true)->orderBy('nombre')->get();
        $unidades = UnidadSunat::where('activo', true)->orderBy('descripcion')->get();

        return view('productos.create', compact('tipos', 'unidades'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:productos,codigo',
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string|max:255',
            'tipo_producto_id' => 'required|exists:tipo_productos,id',
            'unidad_sunat_id' => 'required|exists:unidad_sunats,id',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock_inicial' => 'required|numeric|min:0',
            'stock_minimo' => 'required|numeric|min:0',
            'afecto_igv' => 'required|boolean',
            'activo' => 'required|boolean',
        ]);

        $validated['afecto_igv'] = $request->boolean('afecto_igv');
        $validated['activo'] = $request->boolean('activo');
        $validated['stock_actual'] = $validated['stock_inicial'];

        Producto::create($validated);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        $tipos = TipoProducto::where('activo', true)->orderBy('nombre')->get();
        $unidades = UnidadSunat::where('activo', true)->orderBy('descripcion')->get();

        return view('productos.edit', compact('producto', 'tipos', 'unidades'));
    }

    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:productos,codigo,' . $producto->id,
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string|max:255',
            'tipo_producto_id' => 'required|exists:tipo_productos,id',
            'unidad_sunat_id' => 'required|exists:unidad_sunats,id',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'stock_inicial' => 'required|numeric|min:0',
            'stock_minimo' => 'required|numeric|min:0',
            'afecto_igv' => 'required|boolean',
            'activo' => 'required|boolean',
        ]);

        $validated['afecto_igv'] = $request->boolean('afecto_igv');
        $validated['activo'] = $request->boolean('activo');

        $producto->update($validated);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}
