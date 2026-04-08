<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\CompraDetalle;
use App\Models\MovimientoInventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::latest()->paginate(10);

        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        $productos = Producto::where('activo', true)
            ->orderBy('nombre')
            ->get();

        return view('compras.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $productosFiltrados = collect($request->input('productos', []))
            ->filter(function ($item) {
                return !empty($item['producto_id'])
                    && isset($item['cantidad']) && $item['cantidad'] !== ''
                    && isset($item['precio_compra']) && $item['precio_compra'] !== '';
            })
            ->values()
            ->all();

        $request->merge([
            'productos' => $productosFiltrados,
        ]);

        $validated = $request->validate([
            'fecha_emision' => 'required|date',
            'tipo_comprobante' => 'required|string|max:30',
            'serie' => 'required|string|max:10',
            'numero' => 'required|string|max:20',
            'proveedor_nombre' => 'required|string|max:150',
            'proveedor_documento' => 'nullable|string|max:20',
            'observacion' => 'nullable|string',
            'productos' => 'required|array|min:1',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|numeric|min:0.01',
            'productos.*.precio_compra' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($validated) {
            $subtotalGeneral = 0;

            foreach ($validated['productos'] as $item) {
                $subtotalGeneral += $item['cantidad'] * $item['precio_compra'];
            }

            $igv = round($subtotalGeneral * 0.18, 2);
            $total = round($subtotalGeneral + $igv, 2);

            $compra = Compra::create([
                'fecha_emision' => $validated['fecha_emision'],
                'tipo_comprobante' => $validated['tipo_comprobante'],
                'serie' => $validated['serie'],
                'numero' => $validated['numero'],
                'proveedor_nombre' => $validated['proveedor_nombre'],
                'proveedor_documento' => $validated['proveedor_documento'] ?? null,
                'observacion' => $validated['observacion'] ?? null,
                'subtotal' => $subtotalGeneral,
                'igv' => $igv,
                'total' => $total,
                'activo' => true,
            ]);

            foreach ($validated['productos'] as $item) {
                $producto = Producto::lockForUpdate()->findOrFail($item['producto_id']);

                $cantidad = (float) $item['cantidad'];
                $precioCompra = (float) $item['precio_compra'];
                $subtotal = round($cantidad * $precioCompra, 2);

                CompraDetalle::create([
                    'compra_id' => $compra->id,
                    'producto_id' => $producto->id,
                    'cantidad' => $cantidad,
                    'precio_compra' => $precioCompra,
                    'subtotal' => $subtotal,
                ]);

                $stockAnterior = (float) $producto->stock_actual;

                $producto->increment('stock_actual', $cantidad);
                $producto->update([
                    'precio_compra' => $precioCompra,
                ]);
                $producto->refresh();

                MovimientoInventario::create([
                    'producto_id' => $producto->id,
                    'tipo_movimiento' => 'ENTRADA',
                    'origen' => 'COMPRA',
                    'origen_id' => $compra->id,
                    'cantidad' => $cantidad,
                    'stock_anterior' => $stockAnterior,
                    'stock_nuevo' => $producto->stock_actual,
                    'detalle' => 'Ingreso por compra ' . $compra->serie . '-' . $compra->numero,
                ]);
            }
        });

        return redirect()
            ->route('compras.index')
            ->with('success', 'Compra registrada y stock actualizado correctamente.');
    }

    public function show(Compra $compra)
    {
        $compra->load('detalles.producto');

        return view('compras.show', compact('compra'));
    }

    public function edit(Compra $compra)
    {
        return redirect()->route('compras.index');
    }

    public function update(Request $request, Compra $compra)
    {
        return redirect()->route('compras.index');
    }

    public function destroy(Compra $compra)
    {
        return redirect()->route('compras.index');
    }
}
