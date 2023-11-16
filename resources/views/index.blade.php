@extends('layout.app')
@section('content')

<div id="promocionesCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Slides del carrusel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1448932223592-d1fc686e76ea?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Promoción 1">
            <div class="carousel-caption">
                <h3>COMPROMISO</h3>
                <p class="frase">Comprometidos en ofrecer soluciones web innovadoras.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Promoción 2">
            <div class="carousel-caption">
                <h3>DEDICACIÓN</h3>
                <p class="frase">Dedicados a la creación de sitios web a medida.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Promoción 3">
            <div class="carousel-caption">
                <h3>CONOCIMIENTO</h3>
                <p class="frase">Amplio conocimiento en desarrollo de sistemas web.</p>
            </div>
        </div>
    </div>

    <!-- Controles del carrusel -->
    <a class="carousel-control-prev" href="#promocionesCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#promocionesCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </a>
</div>



 <!-- Sección de Clientes -->

 <div class="container clientes-section">
    <h2 class="section-title">Clientes</h2>
    <div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="client-item">
                    <img src="https://i0.wp.com/www.sergestec.com/wp-content/uploads/2020/10/cm_perpetuo_socorro.jpg?fit=300%2C100&#038;ssl=1" alt="Cliente 1">
                </div>
                <div class="client-item">
                    <img src="https://i0.wp.com/www.sergestec.com/wp-content/uploads/2020/10/cm_perpetuo_socorro.jpg?fit=300%2C100&#038;ssl=1" alt="Cliente 1">
                </div>
                <div class="client-item">
                    <img src="https://i0.wp.com/www.sergestec.com/wp-content/uploads/2020/10/minimarket_c__w.jpg?fit=300%2C100&#038;ssl=1" alt="Cliente 2">
                </div>
                <!-- Agrega más clientes según sea necesario -->
            </div>
            <div class="carousel-item">
                <div class="client-item">
                    <img src="https://i0.wp.com/www.sergestec.com/wp-content/uploads/2020/10/prime_profesional_sac.jpg?fit=300%2C100&#038;ssl=1" alt="Cliente 3">
                </div>
                <div class="client-item">
                    <img src="https://i0.wp.com/www.sergestec.com/wp-content/uploads/2020/10/prime_profesional_sac.jpg?fit=300%2C100&#038;ssl=1" alt="Cliente 3">
                </div>
                <div class="client-item">
                    <img src="https://i0.wp.com/www.sergestec.com/wp-content/uploads/2020/10/group_fernandez_international_sac.jpg?fit=300%2C100&#038;ssl=1" alt="Cliente 4">
                </div>
                <!-- Agrega más clientes según sea necesario -->
            </div>
        </div>
        <a class="carousel-control-prev" href="#clientsCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#clientsCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </a>
    </div>
</div>

    <!-- Nosotros -->

    <div class="div-1" >
        <div class="prueba">

            <div class="titulos">
                <h1 class="text-white"><b>NOSOTROS</b></h1>
            </div>



            <div class="contenidos" >

                <p class="text-white">Somos una empresa dedicada a brindar servicios de desarrollo de Software
                e Implementación de Sistemas de Gestión de Información con FACTURACIÓN ELECTRÓNICA INTEGRADA y así ayudar a nuestros clientes a administrarla eficientemente.</p>

                <p class="text-white">¡LO QUE NOS IMPULSA ES UNA INMENSA PASIÓN POR SISTEMATIZAR LOS PROCESOS COMPLEJOS Y HACERLOS SENCILLOS DE REALIZAR!</p>

                <a class="btn btn-warning" href="#">Ver mas</a>
            </div>
        </div>
    </div>

    <section class="elementor-section elementor-top-section elementor-element elementor-element-3b2f3ca1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3b2f3ca1" data-element_type="section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="imagebox-wrapper">
                <div class="imagebox-img">
                  <img src="https://digitalmarketing.pe/wp-content/uploads/2020/11/website_traffic.png" width="621" height="488" class="img-fluid" alt="website_traffic">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="spacer"></div>
              <h5 class="section-title">CREAMOS TU CAMINO AL ÉXITO</h5>
              <h2>Más de 10 Años y 200 Clientes</h2>
              <p>Diseñamos el Sitio Web que necesitas</p>
              <p>Contamos con la experiencia y los profesionales más capacitados para brindarte un servicio integral de Marketing Digital y Diseño Web que te permita diferenciarte en el mercado.</p>
              <div class="spacer"></div>
              <a href="https://digitalmarketing.pe/nosotros" class="btn btn-primary">Nosotros</a>
              <div class="spacer"></div>
            </div>
          </div>
        </div>
      </section>


      <div class="container mt-5 cotizacion-section">
        <div class="row">
          <div class="col-md-6">
            <img src="{{asset('img/contacto.png')}}" class="img-fluid cotizacion-img" alt="Cotización">
          </div>
          <div class="col-md-6">
            <div class="cotizacion-form">
              <h3 class="mb-4">Cotizar Ahora</h3>
              <form>
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
                </div>
                <div class="form-group">
                  <label for="correo">Correo Electrónico:</label>
                  <input type="email" class="form-control" id="correo" placeholder="Ingrese su correo electrónico">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono:</label>
                  <input type="tel" class="form-control" id="telefono" placeholder="Ingrese su número de teléfono">
                </div>
                <div class="form-group">
                  <label for="mensaje">Mensaje:</label>
                  <textarea class="form-control" id="mensaje" rows="3" placeholder="Ingrese su mensaje"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Cotización</button>
              </form>
            </div>
          </div>
        </div>
      </div>

<br><br>
<!-- Sección de Productos y Servicios -->
<div class="container productos-section">
    <h1 class="display-5" style="font-family: 'Kdam Thmor Pro', sans-serif;">PRODUCTOS Y SERVICIOS</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="producto-card">
          <h2 style="font-family: 'Kdam Thmor Pro', sans-serif;">Sistema de Ventas Web</h2>
          <p>Software administrador de compras, ventas e inventario de propósito general, orientado a todo tipo de negocios, podrá gestionar los principales procesos como cotizaciones, caja chica, gastos, balance, clientes, proveedores, múltiples ...</p>
          <a href="#" class="btn btn-primary">VER MÁS</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="producto-card">
          <h2 style="font-family: 'Kdam Thmor Pro', sans-serif;">Sistema de Ventas Web</h2>
          <p>Software administrador de compras, ventas e inventario de propósito general, orientado a todo tipo de negocios, podrá gestionar los principales procesos como cotizaciones, caja chica, gastos, balance, clientes, proveedores, múltiples ...</p>
          <a href="#" class="btn btn-primary">VER MÁS</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="producto-card">
          <h2 style="font-family: 'Kdam Thmor Pro', sans-serif;">Sistema de Ventas Web</h2>
          <p>Software administrador de compras, ventas e inventario de propósito general, orientado a todo tipo de negocios, podrá gestionar los principales procesos como cotizaciones, caja chica, gastos, balance, clientes, proveedores, múltiples ...</p>
          <a href="#" class="btn btn-primary">VER MÁS</a>
        </div>
      </div>
      <!-- Agrega más productos y servicios según sea necesario -->
    </div>
  </div>
<style>

</style>
<div class="container mt-5 pilares-section">
    <div class="row">
      <div class="col-md-6">
        <h3 style="color : #120f1c; font-family: 'Kdam Thmor Pro', sans-serif;" class="display-4 text-center"><b>Nuestros Pilares Diferenciales</b></h3>
        <p class="text-center">En <b>Desarrollo Web Master</b>, creemos en la construcción de relaciones sólidas y exitosas. Nuestros pilares fundamentales son más que principios; son la base de nuestra cultura y el motor que impulsa cada proyecto que emprendemos. Estamos comprometidos con la excelencia y la satisfacción del cliente, estableciendo una colaboración efectiva y duradera con cada uno de nuestros socios.</p>
    </div>
      <div class="col-md-6">
        <img src="https://digitalmarketing.pe/wp-content/uploads/2020/11/What-We-Offer.png" class="img-fluid pilares-img" alt="Nuestros Pilares Diferenciales">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-4 pilar-box">
        <div class="imagebox-wrapper">
          <div class="imagebox-img">
            <img src="https://digitalmarketing.pe/wp-content/uploads/2020/11/home9_icon1.png" class="img-fluid" alt="ENFOCADOS EN RESULTADOS">
          </div>
          <div class="imagebox-content">
            <h5 class="section-title"><a href="#">ENFOCADOS EN RESULTADOS</a></h5>
            <p>Somos expertos analizando información y obteniendo conclusiones sostenibles para ofrecerte el servicio que necesitas.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 pilar-box">
        <div class="imagebox-wrapper">
          <div class="imagebox-img">
            <img src="https://digitalmarketing.pe/wp-content/uploads/2020/11/home9_icon2.png" class="img-fluid" alt="RAPIDEZ Y EFICIENCIA">
          </div>
          <div class="imagebox-content">
            <h5 class="section-title"><a href="#">RAPIDEZ Y EFICIENCIA</a></h5>
            <p>Somos amantes de los tiempos óptimos y la eficiencia en nuestros proyectos para beneficio de cada cliente.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 pilar-box">
        <div class="imagebox-wrapper">
          <div class="imagebox-img">
            <img src="https://digitalmarketing.pe/wp-content/uploads/2020/11/home9_icon3.png" class="img-fluid" alt="EXPERIENCIA Y CONOCIMIENTO">
          </div>
          <div class="imagebox-content">
            <h5 class="section-title"><a href="#">EXPERIENCIA Y CONOCIMIENTO</a></h5>
            <p>Conocemos tu negocio y lo que necesita. Solicita una asesoría de Marketing con nosotros sin compromisos.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<br>
<br>
<!-- Sección de Testimonios -->
  <div class="container testimonials-section">
    <h2 class="section-title" style="font-family: 'Kdam Thmor Pro', sans-serif;">TESTIMONIOS</h2>
    <div class="section-desc">
        <p>Socios y clientes agradecidos con nuestros servicios</p>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card testimonial-card card-color-1"id="testimonios">
                <div class="card-block">
                    <div class="tes_author" id="autor">
                        <img width="60px" class="circular-image" src="https://3.bp.blogspot.com/__3ubXQGOdTg/SxFQQPEXTuI/AAAAAAAABLw/4DlbjKkevtY/s1600/rostroh.jpg" alt="">

                        <div class="container" id="autor">
                            <span class="nombre">Alexander Rios</span>
                            <cite class="tes__name" id="referencia">Químico farmacéutico</cite>
                        </div>
                    </div>

                    <div class="container" id="content-tes">

                        <h4 class="card-title">Excelente atención</h4>
                        <p class="card-text">
                            Muy satisfechos con el servicio recibido, adquirimos el Sistema Administrador de Ventas e Inventario para nuestro Centro Médico, todo funciona de maravilla.
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3" >
            <div class="card testimonial-card card-color-2" id="testimonios">
                <div class="card-block">
                    <div class="tes_author" id="autor">
                        <img width="60px" class="circular-image" src="https://www.maskusplanet.com/blog/imagenes/lima_mujer.jpg" alt="">
                        <div class="container" id="autor">
                            <span class="nombre">Alexander Maxwell</span>
                            <cite class="tes__name" id="referencia">Agente de ventas</cite>
                        </div>
                    </div>

                    <div class="container" id="content-tes">
                        <h4 class="card-title">Ingresos adicionales</h4>
                        <p class="card-text">
                            Soy parte de la empresa y recibo excelentes ganancias mensuales a través del Programa de Socios donde promociono los diferentes Sistemas.
                        </p>

                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-3" >
            <div class="card testimonial-card card-color-3"id="testimonios">
                <div class="card-block">
                    <div class="tes_author"id="autor">
                        <img width="60px" class="circular-image" src="https://www.maskusplanet.com/blog/imagenes/rio_hombre.JPG" alt="">

                        <div class="container" id="autor">
                            <span class="nombre">Peter Mendez</span>
                            <cite class="tes__name"id="referencia">Director de MIMOBIL SA</cite>
                        </div>
                    </div>

                    <div class="container" id="content-tes">
                        <h4 class="card-title">Sistemas versátiles</h4>
                        <p class="card-text">
                            Adquirimos el Sistema de Ventas e Inventario, la implementación y uso fue muy rápida, permitiéndonos continuar con nuestras actividades habituales.
                        </p>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card testimonial-card card-color-4"id="testimonios">
                <div class="card-block" >
                    <div class="tes_author" id="autor">
                        <img width="60px" class="circular-image" src="https://www.maskusplanet.com/blog/imagenes/rio_mujer.JPG" alt="">

                        <div class="container" id="autor">
                            <span class="nombre">Yessica V</span>
                            <cite class="tes__name" id="referencia">Director de MIMOBIL SA</cite>
                        </div>
                    </div>

                    <div class="container" id="content-tes">
                        <h4 class="card-title">Facturación electrónica</h4>
                        <p class="card-text">
                            Excelente ! Nos presto servicio de Facturación, todo súper rápido y fácil de usar !
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






@endsection
