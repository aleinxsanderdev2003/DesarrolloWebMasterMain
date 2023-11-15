@extends('layout.app')
@section('content')
<div class="container mt-5">
    <div class="row">
      <div class="col">
        <h1 class="page-title">Productos</h1>
      </div>
    </div>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom" style="border-radius: 0px;">

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Todo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">E-Commerce</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Landing page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Web Administrable</a>
        </li>
      </ul>
    </div>
  </nav>
    <div class="row">
      <!-- Aquí puedes agregar un bucle para mostrar tus productos -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{asset('img/projects/viser.jpeg')}}" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h2 class="card-title text-black">Producto 1</h2>
            <p class="card-text">Descripción corta del producto.</p>
            <p class="price">
              <del>$20.00</del>
              <ins>$15.00</ins>
            </p>
            <a href="#" class="btn btn-primary">Añadir al carrito</a>
            <a href="https://restaurante123.site" class="btn btn-light">Ver Sitio web</a>
          </div>
        </div>
      </div>
      <!-- Fin del bucle de productos -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{asset('img/projects/chiphy.jpeg')}}" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h2 class="card-title text-black">Producto 1</h2>
            <p class="card-text">Descripción corta del producto.</p>
            <p class="price">
              <del>$20.00</del>
              <ins>$15.00</ins>
            </p>
            <a href="#" class="btn btn-primary">Añadir al carrito</a>
            <a href="https://restaurante123.site" class="btn btn-light">Ver Sitio web</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{asset('img/projects/yumi.jpeg')}}" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h2 class="card-title text-black">Plataforma de Pedidos en Línea para Restaurantes</h2>
            <p class="card-text">Descripción corta del producto.</p>
            <p class="price">
              <del>$60.00</del>
              <ins>$5.00</ins>
            </p>
            <a href="" class="btn btn-primary">Añadir al carrito</a>
            <a href="https://restaurante123.site" class="btn btn-light">Ver Sitio web</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{asset('img/projects/yumi.jpeg')}}" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h2 class="card-title text-black">Plataforma de Pedidos en Línea para Restaurantes</h2>
            <p class="card-text">Descripción corta del producto.</p>
            <p class="price">
              <del>$60.00</del>
              <ins>$5.00</ins>
            </p>
            <a href="" class="btn btn-primary">Añadir al carrito</a>
            <a href="https://restaurante123.site" class="btn btn-light">Ver Sitio web</a>
          </div>
        </div>
      </div>


      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{asset('img/projects/yumi.jpeg')}}" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h2 class="card-title text-black">Plataforma de Pedidos en Línea para Restaurantes</h2>
            <p class="card-text">Descripción corta del producto.</p>
            <p class="price">
              <del>$60.00</del>
              <ins>$5.00</ins>
            </p>
            <a href="" class="btn btn-primary">Añadir al carrito</a>
            <a href="https://restaurante123.site" class="btn btn-light">Ver Sitio web</a>
          </div>
        </div>
      </div>


      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{asset('img/projects/yumi.jpeg')}}" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h2 class="card-title text-black">Plataforma de Pedidos en Línea para Restaurantes</h2>
            <p class="card-text">Descripción corta del producto.</p>
            <p class="price">
              <del>$60.00</del>
              <ins>$5.00</ins>
            </p>
            <a href="" class="btn btn-primary">Añadir al carrito</a>
            <a href="https://restaurante123.site" class="btn btn-light">Ver Sitio web</a>
          </div>
        </div>
      </div>





    </div>



    <!-- Puedes agregar la paginación aquí si es necesario -->
 <!-- Paginación -->
 <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <span class="page-link">Anterior</span>
        </li>
        <li class="page-item active"><span class="page-link">1</span></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
  </div>

@endsection
