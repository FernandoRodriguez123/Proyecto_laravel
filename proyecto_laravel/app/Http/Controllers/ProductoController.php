<?php
// app/Http/Controllers/ProductoController.php

namespace App\Http\Controllers;

use App\Models\Producto;  // Asegúrate de importar el modelo
use App\Models\Supermercado;  // Si necesitas usar supermercados en el formulario
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar el formulario para crear un nuevo producto
    public function create()
    {
        $supermercados = Supermercado::all();  // Obtener supermercados para el formulario
        return view('productos.create', compact('supermercados'));
    }

    // Guardar un nuevo producto
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'stock' => 'required|integer',
            'supermercado_id' => 'required|exists:supermercados,id',  // Asegurarse de que el supermercado exista
            'fecha_caducidad' => 'required|date',
            'precio' => 'required|numeric',
        ]);

        // Crear el producto
        Producto::create($request->all());

        // Redirigir con éxito
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    // Mostrar el formulario para editar un producto
    public function edit(Producto $producto)
    {
        $supermercados = Supermercado::all();  // Obtener supermercados para el formulario
        return view('productos.edit', compact('producto', 'supermercados'));
    }

    // Actualizar el producto
    public function update(Request $request, Producto $producto)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'stock' => 'required|integer',
            'supermercado_id' => 'required|exists:supermercados,id',  // Asegurarse de que el supermercado exista
            'fecha_caducidad' => 'required|date',
            'precio' => 'required|numeric',
        ]);

        // Actualizar los datos del producto
        $producto->update($request->all());

        // Redirigir
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    // Eliminar un producto
    public function destroy(Producto $producto)
    {
        $producto->delete();

        // Redirigir con éxito
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
