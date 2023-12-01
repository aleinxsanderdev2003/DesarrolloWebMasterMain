<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    <a href="{{ route('tienda') }}" class="btn btn-primary float-end" id="carritoss">Carrito <span id="num_cart" class="badge bg-secondary">{{ config('custom.num_cart') }}</span></a>
        <main>
            <div class="container" id="cartass">
                @php
                    $id = request()->input('id');
                    $token = request()->input('token');

                    if (empty($id) || empty($token)) {
                        echo 'Error al procesar la petición';
                        exit;
                    }

                    $token_tmp = hash_hmac('sha1', $id, config('custom.key_token'));

                    if ($token != $token_tmp) {
                        echo 'Error al procesar la petición';
                        exit;
                    }

                    $producto = \App\Models\Producto::where('id', $id)
                        ->where('activo', 1)
                        ->first();

                    if ($producto) {
                        $nombre = $producto->nombre;
                        $descripcion = $producto->descripcion;
                        $precio = $producto->precio;
                        $descuento = $producto->descuento;
                        $precio_desc = $precio - (($precio * $descuento) / 100);
                    } else {
                        echo 'Error al procesar la petición';
                        exit;
                    }
                @endphp


                <div class="row">
                    <div class="col-md-6 order-md-1">
                        <img src="{{ asset('img/productos/' . $id . '/principal.jpg') }}" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-6 order-md-2">

                        <h1>{{ $nombre }}</h1>

                        @if ($descuento > 0)
                        <p><del>{{ config('custom.MONEDA') . $precio }}</del></p>

                        <h2>
                            {{ config('custom.MONEDA') . $precio_desc }}
                            <small class=" text-success">{{ $descuento }}% descuento</small>
                        </h2>

                        @else
                        <h2>{{ config('custom.MONEDA') . $precio }}</h2>
                        @endif

                        <p>Descripción: {{ $descripcion }}</p>

                        <div class="d-grid gap-3 col-10 mx-auto">
                            <button class="btn btn-primary" type="button">Comprar ahora</button>
                            <button class="btn btn-outline-primary" type="button" onclick="addProducto({{ $id }}, '{{ $token_tmp }}')">agregar al carrito</button>


                        </div>

                    </div>

                </div>
            </div>

        </main>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        // Función para agregar un producto al carrito mediante una petición AJAX
        function addProducto(id, token) {
            let url = '{{ route("carrito.agregarProducto") }}'; // Ruta para la petición AJAX
            let formData = new FormData(); // Objeto FormData para enviar los datos
            formData.append('id', id); // Agrega el ID del producto al FormData
            formData.append('token', token); // Agrega el token al FormData
            formData.append('_token', '{{ csrf_token() }}'); // Agrega el token CSRF al FormData

            // Realiza la petición AJAX utilizando fetch()
            fetch(url, {
                method: 'POST', // Método de la petición
                body: formData, // Datos a enviar en el cuerpo de la petición
                mode: 'cors' // Modo de operación, en este caso 'cors' para cumplir con la política de mismo origen
            })
            .then(response => response.json()) // Convierte la respuesta en formato JSON
            .then(data => {
                if(data.ok){
                    let elemento = document.getElementById("num_cart"); // Obtiene el elemento con ID "num_cart"
                    elemento.innerHTML = data.numero; // Actualiza el contenido del elemento con el número de productos en el carrito
                }
            });
        }
    </script>


</body>
</html>
