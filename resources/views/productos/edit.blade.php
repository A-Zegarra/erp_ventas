<x-erp-layout title="Editar producto">
    <h1 style="margin-top:0;">Editar producto</h1>

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
            <div>
                <label>Código</label>
                <input type="text" name="codigo" value="{{ old('codigo', $producto->codigo) }}" style="width:100%;">
            </div>

            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" style="width:100%;">
            </div>

            <div style="grid-column:1 / 3;">
                <label>Descripción</label>
                <input type="text" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}" style="width:100%;">
            </div>

            <div>
                <label>Tipo de producto</label>
                <select name="tipo_producto_id" style="width:100%;">
                    <option value="">Seleccione</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}"
                            {{ old('tipo_producto_id', $producto->tipo_producto_id) == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Unidad SUNAT</label>
                <select name="unidad_sunat_id" style="width:100%;">
                    <option value="">Seleccione</option>
                    @foreach ($unidades as $unidad)
                        <option value="{{ $unidad->id }}"
                            {{ old('unidad_sunat_id', $producto->unidad_sunat_id) == $unidad->id ? 'selected' : '' }}>
                            {{ $unidad->codigo_sunat }} - {{ $unidad->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Precio compra</label>
                <input type="number" step="0.01" name="precio_compra"
                       value="{{ old('precio_compra', $producto->precio_compra) }}" style="width:100%;">
            </div>

            <div>
                <label>Precio venta</label>
                <input type="number" step="0.01" name="precio_venta"
                       value="{{ old('precio_venta', $producto->precio_venta) }}" style="width:100%;">
            </div>

            <div>
                <label>Stock inicial</label>
                <input type="number" step="0.01" name="stock_inicial"
                       value="{{ old('stock_inicial', $producto->stock_inicial) }}" style="width:100%;">
            </div>

            <div>
                <label>Stock mínimo</label>
                <input type="number" step="0.01" name="stock_minimo"
                       value="{{ old('stock_minimo', $producto->stock_minimo) }}" style="width:100%;">
            </div>

            <div>
                <label>Afecto IGV</label>
                <select name="afecto_igv" style="width:100%;">
                    <option value="1" {{ old('afecto_igv', $producto->afecto_igv ? '1' : '0') == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('afecto_igv', $producto->afecto_igv ? '1' : '0') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div>
                <label>Estado</label>
                <select name="activo" style="width:100%;">
                    <option value="1" {{ old('activo', $producto->activo ? '1' : '0') == '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('activo', $producto->activo ? '1' : '0') == '0' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>

        <div style="margin-top:16px;">
            <a href="{{ route('productos.index') }}">Volver</a>
            <button type="submit">Actualizar</button>
        </div>
    </form>
</x-erp-layout>
