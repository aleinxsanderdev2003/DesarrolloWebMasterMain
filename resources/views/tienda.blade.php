<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desarrollo Web Master</title>
    <link rel="stylesheet" href="{{asset('css/tienda.css')}}">
    <meta property="og:title" content="Contacto | Diseño de páginas web | Creación de páginas web" />
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qMAE3Qqo+4IeTLYs3tR7N01c1C9vCkmckOyIubNCwC3I6mQFnC5r+jE6m6b8jTy4nhv/OtfXxwYU1lIuK+ZXmA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qMAE3Qqo+4IeTLYs3tR7N01c1C9vCkmckOyIubNCwC3I6mQFnC5r+jE6m6b8jTy4nhv/OtfXxwYU1lIuK+ZXmA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a href="{{route('productos')}}" class="navbar-brand">
            <img src="https://cdn-icons-png.flaticon.com/512/263/263085.png" alt="Regresar" class="regreso-icon">&nbsp;
        
        </a>
        <a class="btn btn-primary float-end" id="carritoss" href="{{ route('tienda') }}">
            <img src="{{asset('img/carrito.png')}}" alt="Descripción de la imagen" width="30" height="30">
            <span id="num_cart" class="badge bg-secondary">{{ session('carrito.productos') ? count(session('carrito.productos')) : 0 }}</span>
        </a>
    </div>
</nav>
<main>
    <div class="container" id="cartass">
        <div class="table-responsive">
            <table class="table" style="">
                <thead>
                    <tr style="background: rgb(2,0,36);
                    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);">
                        <th class="text-white">Producto</th>
                        <th  class="text-white">Precio</th>
                        <th  class="text-white">Cantidad</th>
                        <th  class="text-white">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($lista_carrito == null)
                        <tr>
                            <td colspan="5" class="text-center"><b>Lista vacía</b></td>
                        </tr>
                    @else
                        @php
                            $total = 0;
                        @endphp
                        @foreach($lista_carrito as $producto)
                            @php
                                $_id = $producto['id'];
                                $nombre = $producto['nombre'];
                                $precio = $producto['precio'];
                                $descuento = $producto['descuento'];
                                $precio_desc = $precio - (($precio * $descuento) / 100);
                                $cantidad = $producto['cantidad'];
                                $subtotal = $cantidad * $precio_desc;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>{{ $nombre }}</td>
                                <td>{{ config('custom.MONEDA') . $precio_desc }}</td>
                                <td>
                                    <input type="number" min="1" max="10" step="1" value="{{ $cantidad }}" size="5" id="cantidad_{{ $_id }}" onchange="actualizaCantidad(this.value, {{ $_id }})">
                                </td>
                                <td>
                                    <div id="subtotal_{{ $_id }}" name="subtotal[]">{{ config('custom.MONEDA') . $subtotal }}</div>
                                </td>
                                <td>
                                    <a href="#" id="eliminar" class="btn btn-warning" data-bs-id="{{ $_id }}" data-bs-toggle="modal" data-bs-target="#eliminaModal">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </a>

                                      </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2">
                            <p class="h3" id="total">{{ config('custom.MONEDA') . $total }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if($lista_carrito != null)
            <div class="row">
                <div class="col-md-4 offset-md-8 d-grid gap-2">
                    <a href="{{ route('pago') }}" style="background: rgb(2,0,36);
                    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);" class="btn btn-lg btn-block text-white">Realizar pago</a>
                </div>
            </div>
        @endif
    </div>

</main>

        <!-- Modal -->
        <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title fs-5" id="eliminaModalLabel">Alerta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        ¿Desea eliminar el producto de la lista?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()"><i class="fab fa-"></i> <!-- Utiliza FontAwesome o un conjunto de iconos similar -->
                     Eliminar</button>
                </div>
            </div>
            </div>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        function actualizarCarrito() {
            fetch('{{ route("carrito.obtenerNumeroProductos") }}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    let elementoCarrito = document.getElementById('num_cart');
                    elementoCarrito.innerText = data.numero;
                }
            });
        }  window.addEventListener('load', actualizarCarrito);
            setInterval(actualizarCarrito, 1000);
    </script>
{{--
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
    </script> --}}


    {{--  --}}
    <script>
        // Evento que se ejecuta al mostrar el modal de eliminación
        let eliminaModal = document.getElementById('eliminaModal');
        eliminaModal.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget;
            let id = button.getAttribute('data-bs-id');
            let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina');
            buttonElimina.value = id;
        });

        // Función para actualizar la cantidad de un producto en el carrito mediante una petición AJAX
        function actualizaCantidad(cantidad, id) {
            let url = '{{ route("carrito.actualizarCarrito") }}';
            let formData = new FormData();
            formData.append('action', 'agregar');
            formData.append('id', id);
            formData.append('cantidad', cantidad);
            formData.append('_token', '{{ csrf_token() }}'); // Agrega esta línea para incluir el token CSRF

            fetch(url, {
                method: 'POST', // Método de la petición
                body: formData, // Datos del formulario
                mode: 'cors' // Modo de la petición
            })
            .then(response => response.json()) // Convierte la respuesta en formato JSON
            .then(data => {
                if (data.ok) {
                    let divsubtotal = document.getElementById('subtotal_' + id);
                    divsubtotal.innerHTML = data.sub;

                    let total = 0.00;
                    let list = document.getElementsByName('subtotal[]');

                    for (let i = 0; i < list.length; i++) {
                        total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''));
                    }

                    total = new Intl.NumberFormat('en-US', {
                        minimumFractionDigits: 2
                    }).format(total);

                    document.getElementById('total').innerHTML = "{{ config('custom.MONEDA') }}" + total;
                }
            });
        }

        // Función para eliminar un producto del carrito mediante una petición AJAX
        function eliminar() {
            let botonElimina = document.getElementById('btn-elimina');
            let id = botonElimina.value;

            let url = '{{ route("carrito.actualizarCarrito") }}';
            let formData = new FormData();
            formData.append('action', 'eliminar');
            formData.append('id', id);
            formData.append('_token', '{{ csrf_token() }}'); // Agrega esta línea para incluir el token CSRF

            fetch(url, {
                method: 'POST', // Método de la petición
                body: formData, // Datos del formulario
                mode: 'cors' // Modo de la petición
            })
            .then(response => response.json()) // Convierte la respuesta en formato JSON
            .then(data => {
                if (data.ok) {
                    location.reload(); // Recarga la página después de eliminar el producto del carrito
                }
            });
        }
    </script>


</body>
</html>
