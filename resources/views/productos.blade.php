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




    {{-- <a class="btn btn-primary float-end" id="carritoss" href="{{ route('tienda') }}">Carrito <span id="num_cart" class="badge bg-secondary">{{ session('carrito.productos') ? count(session('carrito.productos')) : 0 }}</span></a> --}}

    <a class="btn btn-primary float-end" id="carritoss" href="{{ route('tienda') }}">
        
        <img src="{{asset('img/carrito.png')}}" alt="Descripción de la imagen" width="30" height="30">
        <span id="num_cart" class="badge bg-secondary">{{ session('carrito.productos') ? count(session('carrito.productos')) : 0 }}</span>
    </a>




        <main>


            <div class="container" id="cartass">
                <div class="row row-cols-1 row-cols-md-3 g-3">
                    @foreach ($productos as $producto)
                    <div class="col">
                        <div class="card shadow-sm">
                            @php
                            $id = $producto->id;
                            $imagen = "img/productos/" . $id . "/principal.jpg";

                            if (!file_exists($imagen)) {
                                $imagen = "img/artesania4.jpg";
                            }
                            @endphp

                            <img src="{{ asset($imagen) }}" alt="">

                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">$ {{ $producto->precio }}</p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('/detalles') }}?id={{ $producto->id }}&token={{ hash_hmac('sha1', $producto->id, config('custom.key_token')) }}" class="btn btn-primary">Detalles</a>


                                    </div>
                                    <button class="btn btn-outline-success" type="button" onclick="addProducto({{ $producto->id }}, '{{ $producto->token_tmp }}')">agregar</button>


                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


        </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        // Función para actualizar el número de productos en el carrito mediante una petición AJAX
        function actualizarCarrito() {
            fetch('{{ route("carrito.obtenerNumeroProductos") }}', {
                method: 'GET', // Método de la petición
                headers: {
                    'Content-Type': 'application/json' // Encabezado de la petición
                }
            })
            .then(response => response.json()) // Convierte la respuesta en formato JSON
            .then(data => {
                if (data.ok) {
                    let elementoCarrito = document.getElementById('num_cart'); // Obtiene el elemento con ID "num_cart"
                    elementoCarrito.innerText = data.numero; // Actualiza el contenido del elemento con el número de productos en el carrito
                }
            });
        }

        // Evento que se ejecuta al cargar la página para actualizar el número de productos en el carrito
        window.addEventListener('load', actualizarCarrito);

        // Establece un intervalo para actualizar periódicamente el número de productos en el carrito cada 1000 ms (1 segundo)
        setInterval(actualizarCarrito, 1000);
    </script>


    <script>
        function addProducto(id, token) {
            let url = '{{ route("carrito.agregarProducto") }}';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('token', token);
            formData.append('_token', '{{ csrf_token() }}'); // Agrega esta línea para incluir el token CSRF

            fetch(url, {
                method: 'POST',
                body: formData,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if(data.ok){
                    let elemento = document.getElementById("num_cart");
                    elemento.innerHTML = data.numero;
                }
            });
        }
    </script>



</body>
</html>
