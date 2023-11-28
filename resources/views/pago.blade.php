<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">



</head>

<body>
    



    <a class="btn btn-primary float-end" id="carritoss">Carrito <span id="num_cart"
            class="badge bg-secondary">{{ session('carrito.productos') ? count(session('carrito.productos')) : 0 }}</span></a>



    <main>


        <div class="container" id="cartass">

            <div class="row">
                <div class="col-6">
                    <h4>Detalles de pago</h4>
                    <div class="row">
                        <div class="col-12">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div id="checkout-btn"></div>
                        </div>
                    </div>



                </div>


                <div class="col-6">

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
