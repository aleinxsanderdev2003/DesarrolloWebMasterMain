 <!-- Asumiendo que tienes un layout base -->
 @extends("layout.app")
@section('content')

<link rel="stylesheet" href="{{asset('css/productomain.css')}}">

<div class="container-fluid">
    <div class="row">
        <!-- Barra lateral -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    @foreach($categorias as $categoria)
                        @if($categoria->nombre === 'Todo')
                            {{-- Si es la categoría 'Todo', agrega la clase 'active' si estamos en la página de productos --}}
                            <li class="nav-item {{ Request::is('productos') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('productos.index') }}">
                                    {{ $categoria->nombre }}
                                </a>
                            </li>
                        @else
                            {{-- Para otras categorías --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url("/categorias/{$categoria->nombre}") }}">
                                    {{ $categoria->nombre }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </nav>


        <!-- Contenido principal -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="container-fluid">
                <!-- Ajusta el margen superior e inferior según tus necesidades -->
                

                <!-- Agrega tu contenido específico aquí -->
                @yield('contenido')
            </div>
        </main>
    </div>
</div>



@endsection
