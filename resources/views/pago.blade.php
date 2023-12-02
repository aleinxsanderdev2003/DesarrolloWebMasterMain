<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desarrollo Web Master</title>
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/tienda.css')}}">
    <meta property="og:title" content="Contacto | Diseño de páginas web | Creación de páginas web" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    <!--<a class="btn btn-primary float-end" id="carritoss">Carrito <span id="num_cart"
            class="badge bg-secondary">{{ session('carrito.productos') ? count(session('carrito.productos')) : 0 }}</span></a>
-->
            <main>
                <div class="container" id="cartass">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4 text-white">Detalles de pago</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-warning" id="checkout-btn"></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                            @if ($lista_carrito == null)
                                <tr>
                                    <td colspan="5" class="text-center"><b>Lista vacía</b></td>
                                </tr>
                                @else
                                @php
                                    $total = 0;
                                    $productos_mp = []; // Arreglo para almacenar los productos de Mercado Pago
                                @endphp
                                @foreach ($lista_carrito as $producto)
                                    @php
                                        $_id = $producto['id'];
                                        $nombre = $producto['nombre'];
                                        $precio = $producto['precio'];
                                        $descuento = $producto['descuento'];
                                        $precio_desc = $precio - ($precio * $descuento) / 100;
                                        $cantidad = $producto['cantidad'];
                                        $subtotal = $cantidad * $precio_desc;
                                        $total += $subtotal;


                                        $item = new MercadoPago\Item();
                                        $item->id = $_id;
                                        $item->title = $nombre;
                                        $item->quantity = $cantidad;
                                        $item->unit_price = $precio_desc;
                                        $item->currency_id = "PEN";

                                        array_push($productos_mp, $item);
                                        unset($item);
                                    @endphp
                                    <tr>
                                        <td>{{ $nombre }}</td>
                                        <td>
                                            <div id="subtotal_{{ $_id }}" name="subtotal[]">
                                                {{ config('custom.MONEDA') . $subtotal }}
                                            </div>
                                        </td>
                                @endforeach
                            @endif
                                <tr>
                                    <td colspan="2">
                                        <p class="h3 text-end" id="total">{{ config('custom.MONEDA') . $total }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

                                {{-- @if ($lista_carrito == null)
                                    <tr>
                                        <td colspan="5" class="text-center"><b>Lista vacía</b></td>
                                    </tr>
                                @else
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($lista_carrito as $producto)
                                        @php
                                            $_id = $producto['id'];
                                            $nombre = $producto['nombre'];
                                            $precio = $producto['precio'];
                                            $descuento = $producto['descuento'];
                                            $precio_desc = $precio - ($precio * $descuento) / 100;
                                            $cantidad = $producto['cantidad'];
                                            $subtotal = $cantidad * $precio_desc;
                                            $total += $subtotal;



                                        @endphp
                                        <tr>
                                            <td>{{ $nombre }}</td>

                                            <td>
                                                <div id="subtotal_{{ $_id }}" name="subtotal[]">
                                                    {{ config('custom.MONEDA') . $subtotal }}</div>
                                            </td>
                                    @endforeach
                                @endif --}}





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('custom.CLIENT_ID') }}&currency={{ config('custom.CURRENCY') }}"></script>


    {{-- <script src="https://www.paypal.com/sdk/js?client-id={{ config('custom.CLIENT_ID') }}&currency={{ config('custom.CURRENCY') }}"></script> --}}


    <script>
        function actualizarCarrito() {
            fetch('{{ route('carrito.obtenerNumeroProductos') }}', {
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
        }
        window.addEventListener('load', actualizarCarrito);
        setInterval(actualizarCarrito, 1000);
    </script>

    <script>
        function addProducto(id, token) {
            let url = '{{ route('carrito.agregarProducto') }}';
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
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart");
                        elemento.innerHTML = data.numero;
                    }
                });
        }
    </script>


    {{--  --}}

    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },

            createOrder: function(data,actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value: '{{ $total }}'
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                let url = '{{ route('captura.captura') }}';
    let csrfToken = '{{ csrf_token() }}';

    actions.order.capture().then(function(detalles) {
        console.log(detalles);

        return fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                detalles: detalles
            })
        }).then(function(response){

            window.location.href = "{{ route('completado') }}?key=" + detalles['id'];

        });
    });
},

            onCancel: function(data){
                alert("pago cancelado")
            }

        }).render('#paypal-button-container');

        const mp = new MercadoPago("{{ config('custom.PUBLIC_KEY') }}", {
            locale: 'es-PE'
        });

        const preferenceId = "{{ $preferenceId }}";

        mp.checkout({
            preference: {
                id: preferenceId
            },
            render: {
                container: '#checkout-btn',
                label: 'pagar con mercado pago'
            }
        });
    </script>
</body>

</html>
