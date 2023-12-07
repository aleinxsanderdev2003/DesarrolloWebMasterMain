@extends('layout.app')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/servicios.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&family=Bungee+Spice&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xrXmPMSmBduyZba6tf+PrA8sCNxZP1BC8AotZZQGoH/OqZnRtXaQO4KKfZ67wLsfdd0R0VAfcgQpWwEG3bBEV4Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="content_nosotros" style="margin-top:-30px">
    <h1>Mi Página con Fondo de Imagen</h1>
  </div>

<div class="container mt-5">
    <h1 class="text-center" style="font-family: 'Acme', sans-serif;">Nuestros Servicios</h1>

    <section id="services" class="mt-4">
        <h2 style="font-family: 'Acme', sans-serif;">PLANES</h2>

    <!-- pLANES -->
    <section id="books" class="mt-4">
        <div class="book-container">

            <div class="book">
                <p class="text-center" style="font-family: 'Acme', sans-serif;">S/ 6.90 c/mes*</p>
                <div class="cover cover1">
                    <p style="font-family: 'Acme', sans-serif;">Plan Personal</p>
                </div><br>
                <br>

            </div>


            <div class="book">
                <p style="font-family: 'Acme', sans-serif;">S/ 9.40 c/mes*</p>
                <div class="cover cover2">
                    <p style="font-family: 'Acme', sans-serif;">Plan Premium</p>
                </div>
            </div>


            <div class="book">
                <p style="font-family: 'Acme', sans-serif;">S/ 15.50 c/mes*</p>
                <div class="cover cover3">
                    <p style="font-family: 'Acme', sans-serif;">Plan Avanzado</p>
                </div>
            </div>

        </div>
    </section>
</div>

    <!-- Buscador de Dominios -->
    <section id="domain-search" class="mt-4">
        <h2>Buscador de Dominios</h2>
        <form id="domain-search-form">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="domain" id="domain-input" class="form-control" placeholder="Escribe tu dominio aquí" aria-label="Dominio" aria-describedby="button-search" required>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="button-search">
                    <button class="btn btn-outline-primary" type="button" id="button-search"> <i class="fas fa-search"></i> Buscar</button>

                    </span>
                </div>
            </div>
        </form>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
     document.getElementById('button-search').addEventListener('click', function () {
    var domain = document.getElementById('domain-input').value;

    fetch('/buscar-dominio', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ domain: domain })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message.includes('disponible')) {
            Swal.fire('¡Dominio Disponible!', data.message, 'success');
        } else {
            Swal.fire('Dominio Ocupado', data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error al realizar la solicitud:', error);
        Swal.fire('Error', 'Ha ocurrido un error al verificar la disponibilidad del dominio.', 'error');
    });
});

    </script>
</div>
<div class="container promotion-container">
    <div class="row">
      <div class="col-md-6">
        <!-- Imagen promocional -->
        <img src="img/presentadornerito.png" alt="Promoción Especial" class="img-fluid promotion-image">
     </div>
      <div class="col-md-6">
        <!-- Contenido de la promoción -->
        <div class="promotion-content">
          <h2>Promoción Especial</h2>
          <ul>
            <li>Almacenamiento NVMe SSD Ilimitado</li>
            <li>Dominio Comercial e Internacional gratis un año (.COM )</li>
            <li>Cuentas de Correos Ilimitadas</li>
            <li>Cuentas FTP Ilimitadas</li>
            <li>Bases De Datos Ilimitadas</li>
            <li>Transferencia Mensual Ilimitada</li>
            <li>Subdominios Ilimitados</li>
            <li>Dominios Adicionales Ilimitados</li>
            <li>Administrador cPanel (Cuenta principal)</li>
            <li>Servidores de nombres privados</li>
            <li>Liet's Encrypt + HTTP/3 Supported</li>
            <li>Certificado SSL Gratis</li>
            <li>Soporte Técnico</li>
            <li>Sistema de Backups Diarios</li>
            <li>WordPress pre-instalado (Softaculous)</li>
            <li>Servidores Nvme + LiteSpeed</li>
            <li>Migración gratuita</li>
            <li>Soporte Personalizado 24/7</li>
          </ul>
          <p class="price">Antes: S/350 <span>AHORA: S/79.99</span></p>
        </div>
      </div>
    </div>
  </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>

@endsection
