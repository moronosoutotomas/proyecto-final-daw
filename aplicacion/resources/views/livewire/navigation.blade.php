<nav class="shadow-lg border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo izquierda -->
            <div class="flex-shrink-0">
                <a href="{{ url('homepage') }}" class="flex items-center">
                    {{-- Logo --}}
                     <img src="{{ asset('./logo.png') }}" alt="Logo" class="h-10 w-auto">
{{--                    <div--}}
{{--                        class="h-10 w-10 bg-amber-600 rounded-lg flex items-center justify-center text-white font-bold text-lg">--}}
{{--                        B--}}
{{--                    </div>--}}
                    <span class="ml-2 text-xl font-semibold text-gray-800">Bookbag</span>
                </a>
            </div>

            <!-- Enlaces centrados -->
            <div class="hidden md:flex flex-1 justify-center">
                <div class="flex space-x-8">
                    <a href="{{ url('homepage') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('homepage') ? 'text-amber-600 border-b-2 border-amber-600' : '' }}">
                        Inicio
                    </a>
                    <a href="{{ url('books') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('books*') ? 'text-amber-600 border-b-2 border-amber-600' : '' }}">
                        Libros
                    </a>
                    <a href="{{ url('about') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('about') ? 'text-amber-600 border-b-2 border-amber-600' : '' }}">
                        Sobre nós
                    </a>
                    <a href="{{ url('contact') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('contact') ? 'text-amber-600 border-b-2 border-amber-600' : '' }}">
                        Contacto
                    </a>
                </div>
            </div>

            <!-- Botones derecha -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}"
                   class="text-gray-700 hover:text-amber-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out">
                    Rexístrate
                </a>
            </div>

            <!-- Menú móvil (hamburguesa) -->
            <div class="md:hidden">
                <button type="button"
                        class="bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-amber-600 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-amber-500"
                        aria-controls="mobile-menu"
                        aria-expanded="false">
                    <span class="sr-only">Abri-lo menú principal</span>
                    <!-- Icono hamburguesa -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menú móvil (oculto por defecto) -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
                <a href="{{ url('/') }}"
                   class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('homepage') ? 'text-amber-600 bg-amber-50' : '' }}">
                    Inicio
                </a>
                <a href="{{ url('/books') }}"
                   class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('books*') ? 'text-amber-600 bg-amber-50' : '' }}">
                    Libros
                </a>
                <a href="{{ url('/about') }}"
                   class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('about*') ? 'text-amber-600 bg-amber-50' : '' }}">
                    Sobre nós
                </a>
                <div class="border-t border-gray-200 pt-4 pb-3">
                    <a href="{{ route('login') }}"
                       class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-amber-600 hover:bg-amber-700 text-white block px-3 py-2 rounded-md text-base font-medium mt-2 text-center">
                        Rexístrate
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // Script para o menú móvil
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.querySelector('button[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', function () {
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !isExpanded);
                mobileMenu.classList.toggle('hidden');

                // Cambiar icono
                const icon = this.querySelector('svg');
                if (!isExpanded) {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
                } else {
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
                }
            });
        }
    });
</script>
