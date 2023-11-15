@extends('layout.app')
@section("content")
<link rel="stylesheet" href="{{asset("css/empresa.css")}}">
<div class="content_nosotros">
    <h1>Mi Página con Fondo de Imagen</h1>
  </div>

  <!-- Sección de Misión y Visión -->
  <div class="section mission-vision">
    <div class="container">
      <div class="row">
        <div class="col-md-6 animate">
          <h2>Misión</h2>
          <p>Nuestra misión es proporcionar soluciones web innovadoras y de alta calidad, superando las expectativas de nuestros clientes y contribuyendo al éxito de sus proyectos.</p>
        </div>
        <div class="col-md-6 animate">
          <h2>Visión</h2>
          <p>Buscamos ser líderes en el desarrollo web, destacando por nuestra creatividad, profesionalismo y compromiso con la excelencia, siendo reconocidos a nivel nacional e internacional.</p>
        </div>
      </div>
    </div>
  </div>

 <!-- Sección de Historia -->
 <div class="section history">
    <div class="container">
      <div class="row">
        <div class="col-md-6 animate">
          <img src="https://images.unsplash.com/photo-1606857521015-7f9fcf423740?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Imagen Histórica 1">
          <h2>Historia</h2>
          <p>Desde nuestro inicio en [año], hemos recorrido un camino de constante evolución y crecimiento. Cada paso ha sido guiado por nuestra pasión por la tecnología y el deseo de ofrecer soluciones web excepcionales.</p>
        </div>
        <div class="col-md-6 animate">
          <img src="img/logo.png" alt="Imagen Histórica 2">
        </div>
      </div>
    </div>
  </div>


@endsection
