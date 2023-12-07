@extends("admin.layout.app")
@section("content")

    <!-- Contenido específico de tu dashboard -->
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="card-body">
                <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nombre">Nombre del Producto:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción del Producto:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="id_categoria">ID de Categoría:</label>
                        <input type="number" class="form-control" id="id_categoria" name="id_categoria" required>
                    </div>

                    <div class="form-group">
                        <label for="activo">Activo:</label>
                        <select class="form-control" id="activo" name="activo">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen del Producto:</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
            </div>
        </div>
    </div>
@endsection
