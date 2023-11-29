<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Email</title>
</head>
<body>
    <h1>Hola deseo recibir una cotización</h1>
    <p>Nombre: {{ $data['nombre'] }}</p>
    <p>Correo Electrónico: {{ $data['email'] }}</p>
    <p>Telefono: {{ $data['telefono'] }}</p>
    <p>Mensaje: {{ $data['mensaje'] }}</p>
</body>
</html>
