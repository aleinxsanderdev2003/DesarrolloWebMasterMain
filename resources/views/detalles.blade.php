<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desarrollo Web Master</title>
    <meta property="og:title" content="Contacto | Diseño de páginas web | Creación de páginas web" />
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>
    @extends("layout.app")
    @section("content")
    <div class="detalles__compras" style="margin-top:80px">
    <a style=""  href="{{ route('tienda') }}" class="btn btn-primary float-end" id="carritoss">Carrito <span id="num_cart" class="badge bg-secondary">{{ config('custom.num_cart') }}</span></a>
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
                        $linkdemo = $producto->linkDemo;
                        $precio = $producto->precio;
                        $descuento = $producto->descuento;
                        $precio_desc = $precio - (($precio * $descuento) / 100);

                        // aqui coloca el codigo

                  // Nuevo código adaptado a Laravel
        $dir_imagenes = 'img/productos/'.$id.'/';
        $rutaImg = asset($dir_imagenes . 'principal.jpg');

        if (!\File::exists(public_path($dir_imagenes . 'principal.jpg'))) {
            $rutaImg = asset('img/no-photo.jpg');
        }

        $imagenes = [];
        $files = \File::files(public_path($dir_imagenes));

        foreach ($files as $file) {
            $archivo = pathinfo($file)['basename'];
            if ($archivo != 'principal.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))) {
                $imagenes[] = asset($dir_imagenes . $archivo);
            }
        }

                        // Fin del código adaptado
                    } else {
                        echo 'Error al procesar la petición';
                        exit;
                    }
                @endphp


                <div class="row">
                    <div class="col-md-6 order-md-1">

                        {{-- prueba de carousel --}}
                        <div id="carouselImages" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ $rutaImg }}" alt="Imagen principal" class="d-block w-100">
                                </div>

                                @foreach($imagenes as $img)
                                <div class="carousel-item">
                                    <img src="{{ $img }}" alt="Imagen adicional" class="d-block w-100">
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div>
                        {{--Fin  --}}

                        {{-- <img src="{{ asset('img/productos/' . $id . '/principal.jpg') }}" alt="" class="img-fluid"> --}}
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
                            {{-- <button class="btn btn-primary" type="button">Prueba Demo</button> --}}
                            <button class="btn btn-primary" type="button" onclick="abrirDemo()">Prueba Demo</button>

                            <button class="btn btn-outline-primary" type="button" onclick="addProducto({{ $id }}, '{{ $token_tmp }}')">agregar al carrito</button>


                        </div>

                    </div>

                </div>
            </div>

        </main>

        {{-- prueba  --}}

        <script>
            function abrirDemo() {
                // Puedes verificar si el enlace demo está definido antes de abrir la ventana
                if ("{{ $linkdemo }}") {
                    window.open("{{ $linkdemo }}", "_blank");
                } else {
                    alert("Enlace de demo no disponible.");
                }
            }
        </script>

        {{-- fin --}}

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



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

</div>
</body>
</html>
@endsection
