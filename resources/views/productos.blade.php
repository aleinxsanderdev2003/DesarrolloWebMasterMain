<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desarrollo Web Master</title>
    <link rel="stylesheet" href="{{asset('css/productos.css')}}">
    <meta property="og:title" content="Contacto | Diseño de páginas web | Creación de páginas web" />
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<!-- Agrega este script de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
@extends("layout.app")
@section("content")
<!-- Carrusel --><div id="carouselPromociones" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1562280963-8a5475740a10?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Promoción 1">
            <div class="carousel-caption d-md-block">
                <h5>Promoción Especial</h5>
                <p>¡Descuentos increíbles!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1562280960-9ec3350fd808?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Promoción 2">
            <div class="carousel-caption  d-md-block">
                <h5>¡Oferta del Mes!</h5>
                <p>Productos exclusivos a precios bajos.</p>
            </div>
        </div>
        <!-- Agrega más imágenes y descripciones según sea necesario -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPromociones" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPromociones" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="d-flex justify-content-between align-items-center">

        <div class="d-flex">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorías
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Categoría 1</a></li>
                    <li><a class="dropdown-item" href="#">Categoría 2</a></li>
                    <li><a class="dropdown-item" href="#">Categoría 3</a></li>
                    <!-- Agrega más opciones de categorías según sea necesario -->
                </ul>
            </div>
            <a class="btn btn-primary ms-2" id="carritoss" href="{{ route('tienda') }}">
                <img src="{{asset('img/carrito.png')}}" alt="Descripción de la imagen" width="30" height="30">
                <span id="num_cart" class="badge bg-secondary">{{ session('carrito.productos') ? count(session('carrito.productos')) : 0 }}</span>
            </a>
        </div>
    </div>
</div>

    <main>
        <div class="container" id="cartass">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach ($productos as $producto)
                    <div class="col">
                        <div class="card h-100 border-0 shadow product-card">
                            @php
                                $id = $producto->id;
                                $imagen = "img/productos/" . $id . "/principal.jpg";

                                if (!file_exists($imagen)) {
                                    $imagen = "img/artesania4.jpg";
                                }
                            @endphp

                            <img src="{{ asset($imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">$ {{ $producto->precio }}</p>

                                <div class="mt-auto">
                                    <a href="{{ url('/detalles') }}?id={{ $producto->id }}&token={{ hash_hmac('sha1', $producto->id, config('custom.key_token')) }}" class="btn btn-primary btn-primario mb-2">Detalles</a>

                                    <button class="btn btn-success btn-successo" type="button" onclick="addProducto({{ $producto->id }}, '{{ $producto->token_tmp }}')">Agregar al Carrito</button>
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
</div>
@endsection
</body>
</html>
