@extends('layout.app')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/servicios.css">
<div class="parallax-container">
    <div class="parallax">
        <!-- Agrega aquí la URL de tu imagen de fondo -->
        <img src="https://images.unsplash.com/photo-1579389082289-3d6922d506c4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Fondo de Parallax">
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-white">
                <div class="contact-form">
                    <h2 class="text-center mb-4" style="font-family: 'EB Garamond', serif;">Contáctanos</h2>
                    <form id="contactForm">
                        <!-- Tus campos de formulario aquí -->
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                <a style="margin-top: 70px; padding-right:20px" class="btn btn-success">Ver más</a>
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

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Escribe tu dominio aquí" aria-label="Dominio" aria-describedby="button-search">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="button-search">Buscar</button>
            </div>
        </div>

        <p id="domain-availability"></p>
    </section>
</div>


@endsection
