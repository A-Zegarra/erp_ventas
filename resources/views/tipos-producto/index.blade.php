<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tipo Productos
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-2">Módulo de clientes</h1>
                <p class="text-gray-700 mb-4">
                    Esta es la vista índice inicial del módulo. En el siguiente paso
                    construiremos el listado real y el formulario de registro.
                </p>
                <a href="{{ route('dashboard') }}" class="inline-block px-4 py-2 border rounded-lg">
                    Volver al dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
