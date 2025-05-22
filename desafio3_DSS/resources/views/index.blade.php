<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <title>Tienda E-Commerce</title>
</head>

<body class="bg-stone-100">

    <!-- NAVBAR -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Desafío 3 DSS</h1>
        <div class="relative">
            <button id="carritoBtn" class="relative text-2xl">
                🛒
                <span class="bg-red-500 text-white text-xs rounded-full px-2 absolute -top-2 -right-3">2</span>
            </button>
            <div id="carritoDropdown"
                class="hidden absolute right-0 mt-2 w-[25rem] md:w-[40rem] bg-white border rounded-lg shadow-lg z-50 p-4 max-h-96 overflow-auto">
                <p class="text-sm text-gray-600">Tu carrito está vacío</p>
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="text-gray-600 border-b">
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Unidades</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="flex items-center gap-2">
                                <img src="https://via.placeholder.com/40" alt="img"
                                    class="w-10 h-10 object-cover rounded">
                                <span>Ejemplo</span>
                            </td>
                            <td>$9.990</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <button class="text-gray-700 font-bold text-lg px-2 border">−</button>
                                    <span>1</span>
                                    <button class="text-gray-700 font-bold text-lg px-2 border">+</button>
                                </div>
                            </td>
                            <td>$9.990</td>
                            <td><button class="text-red-500 hover:underline text-sm">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 text-right">
                    <a href="checkout.php"
                        class="inline-block bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded">
                        Ir al Pago
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ALERTA -->
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert">
        <strong class="font-bold">¡Hermanos!</strong>
        <span class="block sm:inline">Que significa el bro respeta</span>
    </div>

    <!-- LANDING -->
    <div class="max-w-7xl mx-auto mt-10 p-4">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Productos destacados</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">

            <!-- PRODUCTOS DE PRUEBA -->
            <!-- Producto -->
            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition">
                <img src="https://via.placeholder.com/300x200" alt="Producto 1"
                    class="w-full h-60 object-cover rounded-md mb-2">
                <h3 class="font-semibold text-lg">Zapatillas Urbanas</h3>
                <p class="text-gray-700">Precio: $29.990</p>
                <p class="text-gray-500 text-sm">Stock: 10 unidades</p>
                <button class="mt-3 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm w-full">
                    Agregar al carrito
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition">
                <img src="https://via.placeholder.com/300x200" alt="Producto 2"
                    class="w-full h-60 object-cover rounded-md mb-2">
                <h3 class="font-semibold text-lg">Audífonos Bluetooth</h3>
                <p class="text-gray-700">Precio: $14.990</p>
                <p class="text-gray-500 text-sm">Stock: 25 unidades</p>
                <button class="mt-3 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm w-full">
                    Agregar al carrito
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition">
                <img src="https://via.placeholder.com/300x200" alt="Producto 3"
                    class="w-full h-60 object-cover rounded-md mb-2">
                <h3 class="font-semibold text-lg">Mochila Antirrobo</h3>
                <p class="text-gray-700">Precio: $22.500</p>
                <p class="text-gray-500 text-sm">Stock: 12 unidades</p>
                <button class="mt-3 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm w-full">
                    Agregar al carrito
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition">
                <img src="https://via.placeholder.com/300x200" alt="Producto 4"
                    class="w-full h-60 object-cover rounded-md mb-2">
                <h3 class="font-semibold text-lg">Lámpara LED Escritorio</h3>
                <p class="text-gray-700">Precio: $9.990</p>
                <p class="text-gray-500 text-sm">Stock: 30 unidades</p>
                <button class="mt-3 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm w-full">
                    Agregar al carrito
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition">
                <img src="https://via.placeholder.com/300x200" alt="Producto 5"
                    class="w-full h-60 object-cover rounded-md mb-2">
                <h3 class="font-semibold text-lg">Teclado Mecánico RGB</h3>
                <p class="text-gray-700">Precio: $39.990</p>
                <p class="text-gray-500 text-sm">Stock: 8 unidades</p>
                <button class="mt-3 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm w-full">
                    Agregar al carrito
                </button>
            </div>

            <div class="bg-white p-4 rounded-xl shadow hover:shadow-md transition">
                <img src="https://via.placeholder.com/300x200" alt="Producto 6"
                    class="w-full h-60 object-cover rounded-md mb-2">
                <h3 class="font-semibold text-lg">Smartwatch Fitness</h3>
                <p class="text-gray-700">Precio: $49.990</p>
                <p class="text-gray-500 text-sm">Stock: 5 unidades</p>
                <button class="mt-3 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm w-full">
                    Agregar al carrito
                </button>
            </div>
        </div>
    </div>

    <script>
        const btn = document.getElementById('carritoBtn');
        const dropdown = document.getElementById('carritoDropdown');
        btn.addEventListener('click', () => dropdown.classList.toggle('hidden'));
    </script>

</body>

</html>