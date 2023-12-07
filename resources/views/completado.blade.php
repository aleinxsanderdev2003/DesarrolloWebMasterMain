<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Desarrollo Web Master</title>
    <meta property="og:title" content="Contacto | Diseño de páginas web | Creación de páginas web" />
    <link rel="icon" href="{{asset('img/logo.png')}}">
</head>
<body>


  <main >
        <div class="container" id="completado">

            @if(strlen($error) > 0)
                <div class="row">
                    <div class="col">
                        <h3>{{ $error }}</h3>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col">
                        <b>Folio de la compra: </b>{{ $id_transaccion }}<br>
                        <b>Fecha de compra: </b>{{ $fecha }}<br>
                        <b>Total: </b>{{ config('custom.MONEDA') . $total }}<br>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sqlDet as $row_det)
                                    @php
                                        $importe = $row_det->precio * $row_det->cantidad;
                                    @endphp
                                    <tr>
                                        <td>{{ $row_det->cantidad }}</td>
                                        <td>{{ $row_det->nombre }}</td>
                                        <td>{{ $importe }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
