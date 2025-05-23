<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tienda E-Commerce</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-stone-100">
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Desafío 3 DSS</h1>
        <div class="relative">
            <button id="carritoBtn" class="relative text-2xl">🛒
                <span
                    class="bg-red-500 text-white text-xs rounded-full px-2 absolute -top-2 -right-3">{{ count($carrito ?? []) }}</span>
            </button>
            <div id="carritoDropdown"
                class="hidden absolute right-0 mt-2 w-[25rem] md:w-[40rem] bg-white border rounded-lg shadow-lg z-50 p-4 max-h-96 overflow-auto">
                @if (!empty($carrito))
                    @foreach ($carrito as $id => $item)
                        <div class="flex items-center border-b border-gray-200 py-2">
                            <img src="{{ asset('img/' . $item['imagen']) }}" class="w-12 h-12 object-cover rounded mr-2">
                            <div class="flex-1">
                                <h2 class="text-sm font-bold">{{ $item['nombre'] }}</h2>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <form action="{{ route('carrito.eliminar') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="eliminar_id" value="{{ $id }}">
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">−</button>
                                    </form>

                                    <span>Cantidad: {{ $item['cantidad'] }}</span>

                                    <form action="{{ route('carrito.agregar') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="producto_id" value="{{ $id }}">
                                        <input type="hidden" name="nombre" value="{{ $item['nombre'] }}">
                                        <input type="hidden" name="precio" value="{{ $item['precio'] }}">
                                        <input type="hidden" name="stock" value="{{ $item['stock'] }}">
                                        <input type="hidden" name="imagen" value="{{ $item['imagen'] }}">
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded">+</button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-semibold">${{ number_format($item['precio'], 2) }}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4 text-right">
                        <a href="{{ url('/checkout') }}"
                            class="inline-block bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded">
                            Ir al Pago
                        </a>
                    </div>
                @else
                    <p class="text-sm text-gray-600">Tu carrito está vacío</p>
                @endif
            </div>
        </div>

    </nav>

    <!-- ALERTA -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert">
            <strong class="font-bold">¡Listo!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="max-w-7xl mx-auto mt-10 p-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Nuestros Productos</h1>

        @foreach ($productos as $categoriaNombre => $productosCategoria)
            <!-- Nombre de la categoría -->
            <h2 class="text-2xl font-bold text-gray-800 mb-4 mt-8">{{ $categoriaNombre }}</h2>

            <!-- Grid de productos de la categoría -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($productosCategoria as $producto)
                    <div class="bg-white rounded-lg shadow p-4">
                        <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                            class="w-full h-48 object-cover rounded mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $producto->nombre }}</h3>
                        <p class="text-gray-600">${{ number_format($producto->precio, 2) }}</p>

                        <form action="{{ route('carrito.agregar') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                            <input type="hidden" name="precio" value="{{ $producto->precio }}">
                            <input type="hidden" name="stock" value="{{ $producto->stock }}">
                            <input type="hidden" name="imagen" value="{{ $producto->imagen }}">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                Agregar al Carrito
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>


    <script>
        document.getElementById('carritoBtn').addEventListener('click', function () {
            document.getElementById('carritoDropdown').classList.toggle('hidden');
        });
    </script>
</body>

</html>