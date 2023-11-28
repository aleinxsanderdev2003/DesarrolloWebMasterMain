@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/contacto.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
<div class="content_nosotros" style="margin-top:-30px">
    <h1>Mi Página con Fondo de Imagen</h1>
  </div>

<div class="container continero mt-5" style="border-radius: 50px;
background: #31cdd8;
box-shadow:  20px 20px 60px #2aaeb8,
             -20px -20px 60px #38ecf8;">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="contact-form">
                <h1 class="text-center mb-4" style="font-family: 'Acme', sans-serif;">Contáctanos</h1>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form id="contactForm" action="{{ route('enviar-mensaje') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label class="labeli" for="mensaje">Mensaje:</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    @error('g-recaptcha-response')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    function onClick(e) {
      e.preventDefault();
      grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute('6LcQwxwpAAAAACXFwtV3GQZbb2kK0yF21yQR5UTL', {action: 'LOGIN'});
      });
    }
  </script>
  <script>
    function enviarMensaje() {
  // Aquí puedes agregar la lógica para enviar el mensaje y actualizar la lista de consultas recientes
  var nombre = document.getElementById("nombre").value;
  var email = document.getElementById("email").value;
  var mensaje = document.getElementById("mensaje").value;

  // Agrega la lógica para enviar el mensaje (puedes usar AJAX, Fetch, etc.)

  // Actualiza la lista de consultas recientes
  actualizarConsultas(nombre);
}

function actualizarConsultas(nombre) {
  var consultasList = document.getElementById("consultasList");
  var listItem = document.createElement("li");
  listItem.className = "list-group-item";
  listItem.textContent = "Nueva consulta - " + nombre;

  // Agrega la nueva consulta al principio de la lista
  consultasList.insertBefore(listItem, consultasList.firstChild);
}

  </script>
@endsection
