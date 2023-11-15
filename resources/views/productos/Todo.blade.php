@extends('productos.index')
@section('contenido')
<div class="row mt-3">
    <div class="col">
        <h1 class="page-title">Todos los Productos</h1>
    </div>
</div>

<div class="row">
    @foreach($productos as $producto)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('img/products/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                <div class="card-body">
                    <h2 class="card-title text-black">{{ $producto->nombre }}</h2>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                    <p class="price">
                        <del>${{ number_format($producto->precio + 5, 2) }}</del>
                        <ins>${{ number_format($producto->precio, 2) }}</ins>
                    </p>
                    <a href="#" class="btn btn-primary">Añadir al carrito</a>
                    <!-- Enlace al sitio web del producto -->
                    <a href="{{ $producto->sitio_web }}" class="btn btn-light">Ver Sitio web</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
