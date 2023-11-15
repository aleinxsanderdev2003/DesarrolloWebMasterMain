@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/contacto.css')}}">

<div class="parallax-container">
    <div class="parallax">
        <!-- Agrega aquí la URL de tu imagen de fondo -->
        <img src="https://images.unsplash.com/photo-1579389082289-3d6922d506c4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Fondo de Parallax">
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-white">
                <div class="contact-form">
                    <h2 class="text-center mb-4">Contáctanos</h2>

                    <form id="contactForm">
                        <!-- Tus campos de formulario aquí -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.parallax').parallax();
    });
</script>
<div class="container continero mt-5" style="border-radius: 50px;
background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);box-shadow:  20px 20px 60px #62b0d2,
             -20px -20px 60px #84eeff;">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="contact-form">
                <h2 class="text-center mb-4">Contáctanos</h2>

                <form id="contactForm">
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
                    <button type="button" class="btn btn-primary" onclick="enviarMensaje()">Enviar Mensaje</button>
                <br>
                &nbsp;
                <br>
                &nbsp;
                <br>

                </form>
            </div>
        </div>
    </div>
</div>

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
