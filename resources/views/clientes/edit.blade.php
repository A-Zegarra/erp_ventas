<x-erp-layout>
    <h1 style="margin-top:0;">Editar cliente</h1>
    <form action="{{ route('clientes.update', $cliente) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
            <div>
                <label>Tipo de documento</label>
                <select name="tipo_documento" style="width:100%;">
                    <option value="DNI" {{ $cliente->tipo_documento == 'DNI' ? 'selected' : '' }}>DNI</option>
                    <option value="RUC" {{ $cliente->tipo_documento == 'RUC' ? 'selected' : '' }}>RUC</option>
                    <option value="CE" {{ $cliente->tipo_documento == 'CE' ? 'selected' : '' }}>CE</option>
                </select>
            </div>
            <div>
                <label>Número de documento</label>
                <input type="text" name="numero_documento" value="{{ old('numero_documento', $cliente-> numero_documento) }}" style="width:100%;">
            </div>
            <div style="grid-column:1 / 3;">
                <label>Nombre / Razón Social</label>
                <input type="text" name="nombre_razon_social" value="{{ old('nombre_razon_social', $cliente-> nombre_razon_social) }}" style="width:100%;">
            </div>
            <div style="grid-column:1 / 3;">
                <label>Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $cliente->direccion) }}"
                    style="width:100%;">
            </div>
            <div>
                <label>Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}"
                    style="width:100%;">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $cliente->email) }}" style="width:100%;">
            </div>
            <div>
                <label>Estado</label>
                <select name="estado" style="width:100%;">
                    <option value="1" {{ $cliente->estado ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ !$cliente->estado ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>
        <div style="margin-top:16px;">
            <a href="{{ route('clientes.index') }}">Volver</a>
            <button type="submit">Actualizar</button>
        </div>
    </form>
</x-erp-layout>
