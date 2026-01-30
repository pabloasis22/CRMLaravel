<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Puestos;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleados::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email',
            'telefono' => 'nullable|string|max:20',
            'puesto' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'salario' => 'required|numeric|min:0',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $empleado = Empleados::create($request->all());

        return redirect()->route('empleados.show', $empleado)
                         ->with('success', 'Empleado creado exitosamente.');
    }

    public function show(Empleados $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleados $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleados $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'telefono' => 'nullable|string|max:20',
            'puesto' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'salario' => 'required|numeric|min:0',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.show', $empleado)
                         ->with('success', 'Empleado actualizado exitosamente.');
    }

    public function destroy(Empleados $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado eliminado exitosamente.');
    }
}
