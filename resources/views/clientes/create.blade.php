<x-erp-layout>
    <h1 style="margin-top:0;">Nuevo cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
            <div>
                <label>Tipo de documento</label>
                <select name="tipo_documento" style="width:100%;">
                    <option value="DNI">DNI</option>
                    <option value="RUC">RUC</option>
                    <option value="CE">CE</option>
                </select>
            </div>
            <div>
                <label>Número de documento</label>
                <input type="text" name="numero_documento" value="{{ old('numero_documento') }}"
style="width:100%;">
            </div>
            <div style="grid-column:1 / 3;">
                <label>Nombre / Razón Social</label>
                <input type="text" name="nombre_razon_social" value="{{ old('nombre_razon_social') }}"
style="width:100%;">
            </div>
            <div style="grid-column:1 / 3;">
                <label>Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion') }}" style="width:100%;">
            </div>
            <div>
                <label>Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}" style="width:100%;">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" style="width:100%;">
            </div>
            <div>
                <label>Estado</label>
                <select name="estado" style="width:100%;">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
        </div>
        <div style="margin-top:16px;">
            <a href="{{ route('clientes.index') }}">Volver</a>
            <button type="submit">Guardar</button>
        </div>
    </form>
</x-erp-layout>
