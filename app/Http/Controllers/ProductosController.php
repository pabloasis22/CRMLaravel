<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes_productos', 'public');
        }

        $producto = Productos::create($data);

        return redirect()->route('productos.show', $producto)
                         ->with('success', 'Producto creado exitosamente.');
    }

    public function show(Productos $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Productos $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Productos $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes_productos', 'public');
        }

        $producto->update($data);

        return redirect()->route('productos.show', $producto)
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Productos $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado exitosamente.');
    }
}
