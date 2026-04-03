<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ERP de Ventas e Inventario
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-2">Panel principal</h1>
                <p class="mb-6 text-gray-700">
                    Bienvenido. La base del sistema ya está lista y ahora
                    comenzaremos a navegar los módulos maestros.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <a href="{{ route('clientes.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                        <h3 class="font-semibold">Clientes</h3>
                        <p class="text-sm text-gray-600">Maestro de clientes.</p>
                    </a>
                    <a href="{{ route('unidades-sunat.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                        <h3 class="font-semibold">Unidades SUNAT</h3>
                        <p class="text-sm text-gray-600">Catálogo de unidades de medida.</p>
                    </a>
                    <a href="{{ route('tipos-producto.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                        <h3 class="font-semibold">Tipos de producto</h3>
                        <p class="text-sm text-gray-600">Clasificación base del inventario.</p>
                    </a>
                    <a href="{{ route('productos.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                        <h3 class="font-semibold">Productos</h3>
                        <p class="text-sm text-gray-600">Listado principal de productos.</p>
                    </a>
                    <a href="{{ route('vehiculos.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                        <h3 class="font-semibold">Vehículos</h3>
                        <p class="text-sm text-gray-600">Datos para guías y reparto.</p>
                    </a>
                    <a href="{{ route('conductores.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                        <h3 class="font-semibold">Conductores</h3>
                        <p class="text-sm text-gray-600">Personal de transporte.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
