<x-erp-layout title="Nueva unidad SUNAT">
    <h1 style="margin-top:0;">Nueva unidad SUNAT</h1>

    <form action="{{ route('unidades-sunat.store') }}" method="POST">
        @csrf

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
            <div>
                <label>Código</label>
                <input type="text" name="codigo_sunat" value="{{ old('codigo_sunat') }}" style="width:100%;">
            </div>

            <div style="grid-column:1 / 3;">
                <label>Descripción</label>
                <input type="text" name="descripcion" value="{{ old('descripcion') }}" style="width:100%;">
            </div>

            <div>
                <label>Estado</label>
                <select name="activo" style="width:100%;">
                    <option value="1" {{ old('activo', '1') == '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>

        <div style="margin-top:16px;">
            <a href="{{ route('unidades-sunat.index') }}">Volver</a>
            <button type="submit">Guardar</button>
        </div>
    </form>
</x-erp-layout>
