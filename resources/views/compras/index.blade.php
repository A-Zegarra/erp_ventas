<x-erp-layout title="Compras">
    <h1 style="margin-top:0;">Compras</h1>
    <div style="margin-bottom:16px;">
        <a href="{{ route('compras.create') }}"
           style="background:#16a34a; color:white; padding:10px 14px; text-decoration:none; border-radius:6px;">
            Nueva compra
        </a>
    </div>
    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;">
        <thead style="background:#e5e7eb;">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Comprobante</th>
                <th>Proveedor</th>
                <th>Total</th>
                <th width="120">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($compras as $compra)
                <tr>
                    <td>{{ $compra->id }}</td>
                    <td>{{ $compra->fecha_emision->format('d/m/Y') }}</td>
                    <td>{{ $compra->tipo_comprobante }} {{ $compra->serie }}-{{ $compra->numero }}</td>
                    <td>{{ $compra->proveedor_nombre }}</td>
                    <td>S/ {{ number_format($compra->total, 2) }}</td>
                    <td>
                        <a href="{{ route('compras.show', $compra) }}">Ver</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No hay compras registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:16px;">
        {{ $compras->links() }}
    </div>
</x-erp-layout>
