<x-erp-layout title="Unidades SUNAT">
    <h1 style="margin-top:0;">Unidades SUNAT</h1>

    <div style="margin-bottom:16px;">
        <a href="{{ route('unidades-sunat.create') }}"
            style="background:#16a34a; color:white; padding:10px 14px; text-decoration:none; border-radius:6px;">
            Nueva unidad
        </a>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <thead style="background:#e5e7eb;">
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th width="180">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($unidades as $unidad)
                <tr>
                    <td>{{ $unidad->id }}</td>
                    <td>{{ $unidad->codigo_sunat }}</td>
                    <td>{{ $unidad->descripcion }}</td>
                    <td>{{ $unidad->activo ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('unidades-sunat.edit', ['unidadSunat' => $unidad->id]) }}">Editar</a>
                        |

                        <form action="{{ route('unidades-sunat.destroy', ['unidadSunat' => $unidad->id]) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar unidad?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay unidades registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:16px;">
        {{ $unidades->links() }}
    </div>
</x-erp-layout>
