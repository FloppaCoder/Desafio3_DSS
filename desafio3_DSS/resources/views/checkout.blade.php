<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- NAVBAR -->
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Desafío 3 DSS</h1>

        <a href="{{ url('/') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-lg shadow">
            Ir a Inicio
        </a>
    </nav>

    <!-- ALERTA -->
    @if(session('mensaje'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert">
            <strong class="font-bold">¡Listo!</strong>
            <span class="block sm:inline">{{ session('mensaje') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Finalizar Compra</h1>

        <!-- Carrito Resumen -->
        <div class="bg-white rounded-xl shadow p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Resumen del Carrito</h2>
            @if(!empty($carrito))
            <table class="w-full text-sm">
                <thead class="text-gray-600 border-b">
                    <tr>
                        <th class="text-left">Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalGeneral = 0; @endphp
                    @foreach($carrito as $item)
                        @php
                            $totalItem = $item['precio'] * $item['cantidad'];
                            $totalGeneral += $totalItem;
                        @endphp
                        <tr class="border-b">
                            <td class="py-2">
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('img/' . $item['imagen']) }}" alt="{{ $item['nombre'] }}"
                                        class="w-12 h-12 object-cover rounded">
                                    <span>{{ $item['nombre'] }}</span>
                                </div>
                            </td>
                            <td class="text-center">{{ $item['cantidad'] }}</td>
                            <td class="text-center">${{ number_format($item['precio'], 2) }}</td>
                            <td class="text-center font-medium">${{ number_format($totalItem, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right mt-4 text-lg font-semibold">
                Total: ${{ number_format($totalGeneral, 2) }}
            </div>
            @else
                <p class="text-gray-600">Tu carrito está vacío.</p>
            @endif
        </div>

        <!-- Formulario de Pago -->
        <form action="{{ route('checkout.procesar') }}" method="POST" class="bg-white rounded-xl shadow p-6 space-y-4" onsubmit="return validarFormulario()">
            @csrf
            <h2 class="text-xl font-semibold">Datos del Cliente</h2>

            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre completo</label>
                <input type="text" value="{{ old('nombre') }}" name="nombre" id="nombre" placeholder="Juan Pérez" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <div>
                <label for="dui" class="block text-sm font-medium text-gray-700">DUI</label>
                <input value="{{ old('dui') }}" type="text" name="dui" id="dui" placeholder="12345678-9" required pattern="^\d{8}-\d{1}$"
                    title="El DUI debe tener 8 dígitos, un guion y un dígito final (ejemplo: 12345678-9)"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <div>
                <label for="numCard" class="block text-sm font-medium text-gray-700">Número de Tarjeta</label>
                <input value="{{ old('numCard') }}" type="text" name="numCard" id="numCard" placeholder="1234 5678 9012 3456" required
                    pattern="^\d{4}\s\d{4}\s\d{4}\s\d{4}$"
                    title="Número de tarjeta debe ser 16 dígitos separados por espacios (ejemplo: 1234 5678 9012 3456)"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <div>
                <label for="fechaVen" class="block text-sm font-medium text-gray-700">Fecha de Vencimiento</label>
                <input value="{{ old('fechaVen') }}" type="text" name="fechaVen" id="fechaVen" placeholder="MM/AA" required
                    pattern="^(0[1-9]|1[0-2])\/\d{2}$" title="La fecha debe tener formato MM/AA (ejemplo: 08/25)"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input value="{{ old('email') }}" type="email" name="email" id="email" placeholder="correo@ejemplo.com" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <div>
                <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección de envío</label>
                <textarea name="direccion" id="direccion" placeholder="Calle Falsa 123, Ciudad" rows="3" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-400">{{ old('direccion') }}</textarea>
            </div>

            <div class="text-right pt-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow">
                    Confirmar Compra
                </button>
            </div>
        </form>
    </div>

    <script>
        function validarFormulario() {
            const nombre = document.getElementById('nombre').value.trim();
            if (nombre.length < 3) {
                alert('Por favor, ingresa un nombre válido.');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
