<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\Puestos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $clientes = Clientes::orderByDesc('id')->take(5)->get();
        $productos = Productos::orderByDesc('id')->take(5)->get();
        $proveedores = Proveedores::orderByDesc('id')->take(5)->get();
        $puestos = Puestos::orderByDesc('id')->take(5)->get();

        return view('home', compact('clientes', 'productos', 'proveedores', 'puestos'));
    }
}
