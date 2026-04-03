<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ERP</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 24px;">
    <h1>ERP de Ventas e Inventario</h1>
    <p>Bienvenido al panel principal.</p>
    <ul>
        <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
        <li><a href="{{ route('unidades-sunat.index') }}">Unidades SUNAT</a></li>
        <li><a href="{{ route('tipos-producto.index') }}">Tipos de producto</a></li>
        <li><a href="{{ route('productos.index') }}">Productos</a></li>
        <li><a href="{{ route('vehiculos.index') }}">Vehículos</a></li>
        <li><a href="{{ route('conductores.index') }}">Conductores</a></li>
    </ul>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>
