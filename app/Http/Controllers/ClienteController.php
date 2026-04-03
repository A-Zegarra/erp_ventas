<?php
namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::latest()->paginate(10);
        return view('clientes.index', compact('clientes'));
    }
    public function create()
    {
        return view('clientes.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:20|unique:clientes,numero_documento',
            'nombre_razon_social' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'estado' => 'required|boolean',
        ]);
        Cliente::create($data);
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente registrado correctamente.');
    }
    public function show(Cliente $cliente)
    {
        return redirect()->route('clientes.index');
    }
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }
    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->validate([
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:20|unique:clientes,numero_documento,' . $cliente->id,
            'nombre_razon_social' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'estado' => 'required|boolean',
        ]);
        $cliente->update($data);
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}
