@extends("admin.layout.app")
@section("content")

<div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Editar Producto</h1>
    <!-- Contenido específico de tu dashboard -->

    <!-- Formulario de edición -->
    <form action="{{ route('admin.productos.actualizar', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Campos del formulario -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
        </div>


        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}">
        </div>

        <!-- Agrega los demás campos del producto según sea necesario -->

        <!-- Botón de enviar -->
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>

<!-- ... Resto de tu contenido ... -->

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

@endsection
