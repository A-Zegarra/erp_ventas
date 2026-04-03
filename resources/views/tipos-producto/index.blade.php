<x-erp-layout title="Tipos de producto">
    <h1 style="margin-top:0;">Tipos de producto</h1>

    <div style="margin-bottom:16px;">
        <a href="{{ route('tipos-producto.create') }}"
           style="background:#16a34a; color:white; padding:10px 14px; text-decoration:none; border-radius:6px;">
            Nuevo tipo de producto
        </a>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <thead style="background:#e5e7eb;">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th width="180">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tiposProducto as $tipoProducto)
                <tr>
                    <td>{{ $tipoProducto->id }}</td>
                    <td>{{ $tipoProducto->nombre }}</td>
                    <td>{{ $tipoProducto->descripcion }}</td>
                    <td>{{ $tipoProducto->activo ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('tipos-producto.edit', $tipoProducto) }}">Editar</a>
                        |

                        <form action="{{ route('tipos-producto.destroy', $tipoProducto) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar tipo de producto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay tipos de producto registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px;">
        {{ $tiposProducto->links() }}
    </div>
</x-erp-layout>
