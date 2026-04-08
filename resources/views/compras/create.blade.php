<x-erp-layout title="Nueva compra">
    <h1 style="margin-top:0;">Nueva compra</h1>
    <form action="{{ route('compras.store') }}" method="POST">
        @csrf
        <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px; margin-bottom:20px;">
            <div>
                <label>Fecha de emisión</label>
                <input type="date" name="fecha_emision" value="{{ old('fecha_emision', date('Y-m-d')) }}"style="width:100%;">
            </div>
            <div>
                <label>Tipo de comprobante</label>
                <select name="tipo_comprobante" style="width:100%;">
                    <option value="FACTURA">FACTURA</option>
                    <option value="BOLETA">BOLETA</option>
                    <option value="TICKET">TICKET</option>
                </select>
            </div>
            <div>
                <label>Serie</label>
                <input type="text" name="serie" value="{{ old('serie', 'F001') }}" style="width:100%;">
            </div>
            <div>
                <label>Número</label>
                <input type="text" name="numero" value="{{ old('numero') }}" style="width:100%;">
            </div>
            <div>
                <label>Proveedor</label>
                <input type="text" name="proveedor_nombre" value="{{ old('proveedor_nombre') }}"style="width:100%;">
            </div>
            <div>
                <label>Documento proveedor</label>
                <input type="text" name="proveedor_documento" value="{{ old('proveedor_documento') }}"style="width:100%;">
            </div>
            <div style="grid-column:1 / 3;">
                <label>Observación</label>
                <input type="text" name="observacion" value="{{ old('observacion') }}" style="width:100%;">
            </div>
        </div>
        <h2>Detalle de la compra</h2>
        <div style="overflow:auto;">
            <table border="1" cellpadding="8" cellspacing="0" width="100%" style="border-collapse:collapse;">
                <thead style="background:#e5e7eb;">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio compra</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 3; $i++)
                        <tr>
                            <td>
                                <select name="productos[{{ $i }}][producto_id]" style="width:100%;">
                                    <option value="">Seleccione</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}"
                                            {{ old('productos.' . $i . '.producto_id') == $producto->id ? 'selected' : '' }}>
                                            {{ $producto->codigo }} - {{ $producto->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" step="0.01" name="productos[{{ $i }}][cantidad]"
                                       value="{{ old('productos.' . $i . '.cantidad') }}" style="width:100%;">
                            </td>
                            <td>
                                <input type="number" step="0.01" name="productos[{{ $i }}][precio_compra]"
                                       value="{{ old('productos.' . $i . '.precio_compra') }}" style="width:100%;">
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div style="margin-top:16px;">
            <a href="{{ route('compras.index') }}">Volver</a>
            <button type="submit">Guardar compra</button>
        </div>
    </form>
</x-erp-layout>
