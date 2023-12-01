document.addEventListener('DOMContentLoaded', function () {
    function toggleSidebar() {
        document.body.classList.toggle('sidebar-toggled');
        document.querySelector('.sidebar').classList.toggle('toggled');

        if (document.querySelector('.sidebar').classList.contains('toggled')) {
            // Si la barra lateral está contraída, oculta todos los elementos colapsables
            var collapses = document.querySelectorAll('.sidebar .collapse');
            collapses.forEach(function (collapse) {
                collapse.classList.remove('show');
            });
        }
    }

    // Agrega un evento de clic al botón de alternar la barra lateral (ID: sidebarToggle y sidebarToggleTop)
    document.querySelectorAll("#sidebarToggle, #sidebarToggleTop").forEach(function (element) {
        element.addEventListener('click', toggleSidebar);
    });

    // Agrega un evento de redimensionamiento de la ventana
    window.addEventListener('resize', function () {
        if (window.innerWidth < 768) {
            // Si el ancho de la ventana es menor a 768, oculta los elementos colapsables
            document.querySelectorAll('.sidebar .collapse').forEach(function (collapse) {
                collapse.classList.remove('show');
            });
        }

        if (window.innerWidth < 480 && !document.querySelector('.sidebar').classList.contains('toggled')) {
            // Si el ancho de la ventana es menor a 480 y la barra lateral no está contraída, contrae la barra lateral
            document.body.classList.add('sidebar-toggled');
            document.querySelector('.sidebar').classList.add('toggled');
            document.querySelectorAll('.sidebar .collapse').forEach(function (collapse) {
                collapse.classList.remove('show');
            });
        }
    });

    // Agrega un evento de desplazamiento de la página
    document.addEventListener('scroll', function () {
        if (document.documentElement.scrollTop > 100) {
            document.querySelector('.scroll-to-top').style.display = 'block';
        } else {
            document.querySelector('.scroll-to-top').style.display = 'none';
        }
    });

    // Agrega un evento de clic al enlace "scroll-to-top"
    document.addEventListener('click', function (event) {
        if (event.target.matches('a.scroll-to-top')) {
            var targetElement = document.querySelector(event.target.getAttribute('href'));
            if (targetElement) {
                // Desplaza suavemente hacia arriba al hacer clic en el enlace "scroll-to-top"
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
                event.preventDefault();
            }
        }
    });
});
