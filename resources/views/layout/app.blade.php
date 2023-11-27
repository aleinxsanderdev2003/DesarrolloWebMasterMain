
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desarrollo Web Master</title>
    <meta property="og:title" content="Contacto | Diseño de páginas web | Creación de páginas web" />
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <meta property="og:site_name" content="Diseño de páginas web | Creación de páginas web" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Estilos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/wsp.css')}}">
</head><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    // Simula un tiempo de carga (puedes ajustar esto según tus necesidades)
    setTimeout(function () {
        // Oculta el loader
        document.getElementById("loader").style.opacity = 0;
        // Muestra el contenido
        document.querySelector(".content").style.display = "block";
        // Espera un poco antes de establecer la opacidad a 1 para una transición suave
        setTimeout(function () {
            document.getElementById("loader").style.display = "none";
            document.querySelector(".content").style.opacity = 1;
        }, 500);
    }, 2000); // Esto simula un tiempo de carga de 2 segundos, ajusta según sea necesario
});

    </script>

<div id="loader-container">
    <div class="loader" id="loader">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
</div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:#000011;">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="Logo" width="80" height="70"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('empresa')}}">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tienda')}}">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('servicios')}}">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        // JavaScript para cambiar la sombra al hacer scroll
        $(window).scroll(function () {
            if ($(window).scrollTop() > 50) {
                $('.navbar').css('box-shadow', '0px 2px 5px rgba(0, 0, 0, 0.2)');
            } else {
                $('.navbar').css('box-shadow', 'none');
            }
        });
    </script>

    <main class="py-4">
        @yield('content')
    </main>


    <footer class="text-light  py-3" id="footer">
        <div class="contaiyner">
            <div class="footer-link">
                <div class="links">
                    <div class="link">
                        <h2>
                            prueba 1
                        </h2>
                        <div class="enlaces">
                            <ul>
                                <li><a href="">ejemplo</a></li>
                                <li><a href="">ejemplo</a></li>
                                <li><a href="">ejemplo</a></li>
                                <li><a href="">ejemplo</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="link">
                        <h2>
                            Visitar
                        </h2>
                        <div class="enlaces">
                            <ul>
                                <li><a href="{{route('index')}}">Inicio</a></li>
                                <li><a href="{{route('servicios')}}">Servicios</a></li>
                                <li><a href="{{route('empresa')}}">Empresa</a></li>
                                <li><a href="{{route('tienda')}}">Tienda</a></li>
                                <li><a href="{{route('contacto')}}">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="redes">
                    <h2>
                        Redes sociales
                    </h2>
                    <div class="sociales">
                        <div class="facebook" id="redes-img">
                            <a href="">
                                <img width="40px" class="circular-image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/2048px-2021_Facebook_icon.svg.png" alt="">
                        </a>
                        </div>
                        <div class="twiter" id="redes-img">
                            <a href="">
                                <img width="40px" class="circular-image" src="https://cdn.pixabay.com/photo/2021/06/15/12/28/tiktok-6338430_1280.png" alt="">
                            </a>
                        </div>
                        <div class="instagram" id="redes-img">
                            <a href="">
                                <img width="40px" class="circular-image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/768px-Instagram-Icon.png" alt="">
                            </a>
                        </div>
                    </div>

                    <h3>Informes</h3>
                    <form action="" id="informes">
                        <input id="correo" type="email" placeholder="correo"  >
                        <input id="btn" type="submit" value="enviar">
                    </form>
                </div>
            </div>
            <hr>
            <div class="footer-text">
                <div class="imagenes-pagos">
                    <div class="visa">
                        <a href="">
                            <img width="60px"  src="https://i.ibb.co/WKK1S8h/visa.png" alt="">
                        </a>
                    </div>
                    <div class="masterCard">
                        <a href="">
                            <img width="80px" src="https://i.ibb.co/3R7mWrH/marter-Card.png" alt="">
                        </a>
                    </div>
                    <div class="paypal">
                        <a href="">
                            <img width="50px" src="https://i.ibb.co/f9mRQF0/paypal.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="copy">
                    <div class="copy-img">
                        <a href="">
                            <img width="50px" src="img/logo.png" alt="" id="logo-pa">
                        </a>
                    </div>
                    <div class="contenido-Copy">
                        <p>&copy; 2023 Desarrollo Web Master. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="whatsapp-button" class="radar-button">
        <img src="https://cdn.icon-icons.com/icons2/3685/PNG/512/whatsapp_logo_icon_229310.png" alt="WhatsApp">
        <div class="waves"></div>
    </div>
         <!-- Scripts -->
         <script src="{{asset('js/navbar.js')}}"></script>
         <script src="https://kit.fontawesome.com/6b76d54a65.js" crossorigin="anonymous"></script>
         <script src="{{asset('js/boton_wsp.js')}}"></script>
         <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>





</body>
</html>
