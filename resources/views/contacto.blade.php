@extends('layout.app')
@section('content')

<div class="container mt-5">
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
              <label for="mensaje">Mensaje:</label>
              <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="enviarMensaje()">Enviar Mensaje</button>
          </form>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-8 mx-auto">
        <h2 class="text-center mb-4">Consultas Recientes</h2>
        <ul class="list-group" id="consultasList">
          <!-- Consultas recientes se cargarán aquí con JavaScript -->
        </ul>
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
