<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ProductoModel as Producto;
use App\Models\CategoriaModel as Categoria;

class CarritoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get()->groupBy('categoria.nombre');
        $carrito = Session::get('carrito', []);
        $totalItems = collect($carrito)->sum('cantidad');
        // dd($productos, $carrito, $totalItems);
        return view('index', compact('productos', 'carrito', 'totalItems'));
    }

    public function agregar(Request $request)
    {
        $carrito = Session::get('carrito', []);
        $id = $request->input('producto_id');

        if (!isset($carrito[$id])) {
            $carrito[$id] = [
                'nombre' => $request->input('nombre'),
                'precio' => floatval($request->input('precio')),
                'stock' => intval($request->input('stock')),
                'imagen' => $request->input('imagen'),
                'cantidad' => 1
            ];
        } else {
            if ($carrito[$id]['cantidad'] < $carrito[$id]['stock']) {
                $carrito[$id]['cantidad']++;
            }
        }

        Session::put('carrito', $carrito);
        return redirect()->route('home');
    }

    public function eliminar(Request $request)
    {
        $carrito = Session::get('carrito', []);
        $id = $request->input('eliminar_id');

        if (isset($carrito[$id])) {
            if ($carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad']--;
            } else {
                unset($carrito[$id]);
            }
        }

        Session::put('carrito', $carrito);
        return redirect()->route('home');
    }
}

