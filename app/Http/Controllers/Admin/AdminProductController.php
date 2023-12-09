<?php

namespace App\Http\Controllers\Admin;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        return view('admin.producto');
    }

    public function agregar()
    {
        return view('admin.producto');
    }

    public function verTodos()
    {
        $productos = Producto::where('activo', 1)->get();
        foreach ($productos as $producto){
            $imagen = $producto->imgProducto;
        $producto->imagen = $imagen;
        }

        return view('admin.ver-todos-productos')->with('productos', $productos);
    }

    public function store(Request $request)
    {

        // Validación de campos (ajústalo según tus necesidades)
        $request->validate([
            'nombre' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'id_categoria' => 'required|integer',
            'activo' => 'required|boolean',
            'linkDemo' => 'nullable|string', // Puedes ajustar las reglas según tus necesidades
            'imgProducto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Crear el nuevo producto
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->id_categoria = $request->id_categoria;
        $producto->activo = $request->activo;

        // Guardar la imagen (si se proporciona)
        if ($request->hasFile('imgProducto')) {
            $imagenPath = $request->file('imgProducto')->store('img/productos/' . $producto->id, 'public');
            $producto->imgProducto = $imagenPath;

        }
        $producto->linkDemo = $request->input('linkDemo');



        $producto->save();

        // Redireccionar a la lista de productos o a donde lo necesites
        return redirect()->route('admin.productos.ver-todos');
    }
    public function editar($id)
{
    // Obtén el producto por su ID
    $producto = Producto::find($id);

    // Verifica si el producto existe
    if (!$producto) {
        abort(404); // Puedes manejar esto según tus necesidades
    }

    // Pasa el producto a la vista
    return view('admin.editar_productos', compact('producto'));
} public function eliminarProducto($id)
{
    try {
        // Encuentra el producto por su ID
        $producto = Producto::findOrFail($id);

        // Elimina la imagen asociada al producto (ajusta la lógica según sea necesario)
        $imagenPath = public_path("img/productos/{$id}/principal.jpg");
        if (file_exists($imagenPath)) {
            unlink($imagenPath);
        }

        // Elimina el producto de la base de datos
        $producto->delete();

        // Puedes redirigir a la lista de productos o a donde desees
        return redirect()->route('admin.productos.ver-todos')->with('success', 'Producto eliminado correctamente');
    } catch (\Exception $e) {
        // Maneja cualquier excepción que pueda ocurrir (por ejemplo, si el producto no se encuentra)
        return redirect()->route('admin.productos.ver-todos')->with('error', 'Error al eliminar el producto');
    }
}

    public function mostrarEditar(){
        return view("admin.editar_productos");
    }

    public function actualizarProducto(Request $request, $id)
    {
        // Validación de los campos del formulario
        $request->validate([
            'nombre' => 'required|max:255',
            // Agrega otras reglas de validación según tus necesidades
        ]);

        // Obtén el producto por su ID
        $producto = Producto::find($id);

        // Verifica si el producto existe
        if (!$producto) {
            abort(404); // Puedes manejar esto según tus necesidades
        }

        // Actualiza los campos del producto con los valores del formulario
        $producto->nombre = $request->input('nombre');
        // Agrega otros campos según tus necesidades
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');

        // Guarda los cambios en la base de datos
        $producto->save();

        // Redirecciona a la lista de productos o a donde desees
        return redirect()->route('admin.productos.ver-todos')->with('success', 'Producto actualizado exitosamente');
    }
}
