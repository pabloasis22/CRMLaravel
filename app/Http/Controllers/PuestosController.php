<?php

namespace App\Http\Controllers;

use App\Models\Puestos;
use Illuminate\Http\Request;

class PuestosController extends Controller
{
    public function index()
    {
        $puestos = Puestos::paginate(10);
        return view('puestos.index', compact('puestos'));
    }

    public function create()
    {
        return view('puestos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        $puesto = Puestos::create($request->all());

        return redirect()->route('puestos.show', $puesto)
                         ->with('success', 'Puesto creado exitosamente.');
    }

    public function show(Puestos $puesto)
    {
        return view('puestos.show', compact('puesto'));
    }

    public function edit(Puestos $puesto)
    {
        return view('puestos.edit', compact('puesto'));
    }

    public function update(Request $request, Puestos $puesto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        $puesto->update($request->all());

        return redirect()->route('puestos.show', $puesto)
                         ->with('success', 'Puesto actualizado exitosamente.');
    }

    public function destroy(Puestos $puesto)
    {
        $puesto->delete();

        return redirect()->route('puestos.index')
                         ->with('success', 'Puesto eliminado exitosamente.');
    }
}
