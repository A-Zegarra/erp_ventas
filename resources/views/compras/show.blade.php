<x-erp-layout title="Detalle de compra">
    <h1 style="margin-top:0;">Compra {{ $compra->serie }}-{{ $compra->numero }}</h1>
    <p><strong>Fecha:</strong> {{ $compra->fecha_emision->format('d/m/Y') }}</p>
    <p><strong>Proveedor:</strong> {{ $compra->proveedor_nombre }}</p>
    <p><strong>Documento:</strong> {{ $compra->proveedor_documento }}</p>
    <p><strong>Observación:</strong> {{ $compra->observacion }}</p>
    <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse; margin-top:16px;">
        <thead style="background:#e5e7eb;">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio compra</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compra->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>S/ {{ number_format($detalle->precio_compra, 2) }}</td>
                    <td>S/ {{ number_format($detalle->subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top:16px;">
        <p><strong>Subtotal:</strong> S/ {{ number_format($compra->subtotal, 2) }}</p>
        <p><strong>IGV:</strong> S/ {{ number_format($compra->igv, 2) }}</p>
        <p><strong>Total:</strong> S/ {{ number_format($compra->total, 2) }}</p>
    </div>
</x-erp-layout>
