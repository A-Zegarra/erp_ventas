<x-erp-layout title="Productos">
    <h1 style="margin-top:0;">Productos</h1>

    <div style="margin-bottom:16px;">
        <a href="{{ route('productos.create') }}"
           style="background:#16a34a; color:white; padding:10px 14px; text-decoration:none; border-radius:6px;">
            Nuevo producto
        </a>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <thead style="background:#e5e7eb;">
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Tipo producto</th>
                <th>Unidad SUNAT</th>
                <th>Precio compra</th>
                <th>Precio venta</th>
                <th>Stock inicial</th>
                <th>Stock actual</th>
                <th>Stock mínimo</th>
                <th>Estado</th>
                <th width="200">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->tipoProducto->nombre ?? 'Sin tipo' }}</td>
                    <td>{{ $producto->unidadSunat->codigo_sunat ?? '' }} {{ $producto->unidadSunat ? '- ' . $producto->unidadSunat->descripcion : 'Sin unidad' }}</td>
                    <td>S/ {{ number_format($producto->precio_compra, 2) }}</td>
                    <td>S/ {{ number_format($producto->precio_venta, 2) }}</td>
                    <td>{{ number_format($producto->stock_inicial, 2) }}</td>
                    <td>{{ number_format($producto->stock_actual, 2) }}</td>
                    <td>{{ number_format($producto->stock_minimo, 2) }}</td>
                    <td>{{ $producto->activo ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto) }}">Editar</a>
                        |
                        <form action="{{ route('productos.destroy', $producto) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12">No hay productos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px;">
        {{ $productos->links() }}
    </div>
</x-erp-layout>
