<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Puestos;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleados::with('puesto')->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $puestos = Puestos::all();
        return view('empleados.create', compact('puestos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email',
            'telefono' => 'nullable|string|max:20',
            'puesto_id' => 'required|exists:puestos,id',
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
        $empleado->load('puesto');
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleados $empleado)
    {
        $puestos = Puestos::all();
        return view('empleados.edit', compact('empleado', 'puestos'));
    }

    public function update(Request $request, Empleados $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'telefono' => 'nullable|string|max:20',
            'puesto_id' => 'required|exists:puestos,id',
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
