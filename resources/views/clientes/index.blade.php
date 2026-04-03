<x-erp-layout title="Clientes">
    <h1 style="margin-top:0;">Clientes</h1>
    <div style="margin-bottom:16px;">
        <a href="{{ route('clientes.create') }}" style="background:#16a34a; color:white; padding:10px 14px; text
decoration:none; border-radius:6px;">
            Nuevo cliente
        </a>
    </div>
    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <thead style="background:#e5e7eb;">
            <tr>
                <th>ID</th>
                <th>Documento</th>
                <th>Número</th>
                <th>Nombre / Razón Social</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Estado</th>
                <th width="180">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->tipo_documento }}</td>
                    <td>{{ $cliente->numero_documento }}</td>
                    <td>{{ $cliente->nombre_razon_social }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->estado ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente) }}">Editar</a>
                        |
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No hay clientes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:16px;">
        {{ $clientes->links() }}
    </div>
</x-erp-layout>
