@extends("admin.layout.app")
@section("content")
<h1 class="h3 mb-0 text-gray-800">Ver Todos los Productos</h1>
<!-- Contenido específico de tu dashboard -->
<p>Lista completa de productos.</p>
<main>
    <div class="container" id="cartas">
        <div class="row row-cols-1 row-cols-md-3 g-3">
            @foreach ($productos as $producto)
                <div class="col">
                    <div class="card h-100 border-0 shadow product-card">
                        @php
                            $id = $producto->id;
                            $imagen = "img/productos/" . $id . "/principal.jpg";

                            if (!file_exists($imagen)) {
                                $imagen = "img/artesania4.jpg";
                            }
                        @endphp

                        <img src="{{ asset($imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">$ {{ $producto->precio }}</p>

                            <!-- Agregar botones de editar y eliminar -->
                            <div class="mt-auto">
                                <a href="{{ route('admin.editar_productos', ['id' => $producto->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('admin.productos.eliminar', ['id' => $producto->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-dangero" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

<script>
    // Función para editar producto
    function editarProducto(id) {
        window.location.href = '{{ url("admin/productos/editar") }}/' + id;
    }

    // Función para eliminar producto
    function eliminarProducto(id) {
        if (confirm('¿Estás seguro de eliminar este producto?')) {
            // Si el usuario confirma la eliminación, realiza la petición DELETE
            fetch('{{ url("admin/productos/eliminar") }}/' + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.ok) {
                    // Actualiza la página u realiza alguna acción adicional si es necesario
                    window.location.reload();
                } else {
                    alert('Error al eliminar el producto.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
</script>
            @endforeach
        </div>
    </div>
</main>


@endsection
