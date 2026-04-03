<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ERP Ventas' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="font-family: Arial, sans-serif; background:#f3f4f6; margin:0;">
    <header style="background:#1f4e79; color:white; padding:16px 24px;">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <div>
                <strong>ERP de Ventas e Inventario</strong>
                <div style="font-size:12px; opacity:.9;">Base Laravel 13 + MySQL</div>
            </div>
            <nav style="display:flex; gap:12px; flex-wrap:wrap;">
                <a href="{{ route('dashboard') }}" style="color:white; text-decoration:none;">Dashboard</a>
                <a href="{{ route('clientes.index') }}" style="color:white; text-decoration:none;">Clientes</a>
                <a href="{{ route('unidades-sunat.index') }}" style="color:white; text-decoration:none;">Unidades
SUNAT</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:#dc2626; color:white; border:none; padding:6px 10px;
cursor:pointer;">
                        Cerrar sesión
                    </button>
                </form>
            </nav>
        </div>
    </header>
    <main style="max-width:1200px; margin:24px auto; background:white; padding:24px; border-radius:10px;">
        @if (session('success'))
            <div style="background:#dcfce7; color:#166534; padding:12px; border-radius:8px; margin-bottom:16px;">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div style="background:#fee2e2; color:#991b1b; padding:12px; border-radius:8px; margin-bottom:16px;">
                <strong>Hay errores en el formulario:</strong>
                <ul style="margin-top:8px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
    </main>
</body>
</html>
