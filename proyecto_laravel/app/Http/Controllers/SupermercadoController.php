<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supermercado;

class SupermercadoController extends Controller
{
    // Mostrar todos los supermercados
    public function index()
    {
        $supermercados = Supermercado::all();
        return view('supermercados.index', compact('supermercados'));
    }

    // Mostrar el formulario para crear un supermercado
    public function create()
    {
        return view('supermercados.create');
    }

    // Guardar un nuevo supermercado
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'vigencia_contrato' => 'required|date',
            'margen_beneficio' => 'required|numeric',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
        ]);

        // Crear el supermercado
        Supermercado::create($request->all());

        // Redirigir con éxito
        return redirect()->route('supermercados.index')->with('success', 'Supermercado creado exitosamente.');
    }

    // Mostrar el formulario para editar un supermercado
    public function edit(Supermercado $supermercado)
    {
        return view('supermercados.edit', compact('supermercado'));
    }

    // Actualizar el supermercado
    public function update(Request $request, Supermercado $supermercado)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'vigencia_contrato' => 'required|date',
            'margen_beneficio' => 'required|numeric',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
        ]);

        // Actualizar los datos del supermercado
        $supermercado->update($request->all());

        // Redirigir con éxito
        return redirect()->route('supermercados.index')->with('success', 'Supermercado actualizado exitosamente.');
    }

    // Eliminar un supermercado
    public function destroy(Supermercado $supermercado)
    {
        $supermercado->delete();

        // Redirigir con éxito
        return redirect()->route('supermercados.index')->with('success', 'Supermercado eliminado exitosamente.');
    }
}
