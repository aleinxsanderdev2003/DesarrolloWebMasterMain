@extends('layout.app')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/servicios.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
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


@endsection
