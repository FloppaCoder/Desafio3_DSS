<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ProductoModel as Producto;
use App\Models\CategoriaModel as Categoria;

class CheckoutController extends Controller
{
    public function form()
    {
        $carrito = Session::get('carrito', []);
        if (empty($carrito)) return redirect()->route('home');

        $total = collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']);
        return view('checkout', compact('carrito', 'total'));
    }

    public function procesar(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'regex:/^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]{3,}$/'],
            'dui' => ['required', 'regex:/^\d{8}-\d{1}$/'],
            'numCard' => ['required', 'regex:/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/'],
            'email' => ['required', 'email'],
            'direccion' => ['required', 'min:10'],
            'fechaVen' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'], // MM/AA
        ]);



        Session::forget('carrito');
        Session::flash('success', 'Compra realizada con éxito. Gracias por su compra.');
        return redirect()->route('home');
    }
}

