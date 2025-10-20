<nav class="shadow-lg border-b border-gray-200 dark:text-white dark:border-gray-700 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo izquierda -->
            <div class="flex-shrink-0">
                <a href="{{ url('homepage') }}" class="flex items-center">
                    {{-- Logo --}}
                    <img src="{{ asset('./logo.png') }}" alt="Logo" class="h-10 w-auto">
                    <span class="ml-2 text-xl font-semibold text-gray-800 dark:text-white">Bookbag</span>
                </a>
            </div>

            <!-- Enlaces centrados -->
            <div class="hidden md:flex flex-1 justify-center">
                <div class="flex space-x-8">
                    <a href="{{ url('homepage') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('homepage') ? 'text-amber-600 border-b-2 border-amber-600' : '' }} dark:text-white">
                        Inicio
                    </a>
                    <a href="{{ url('books') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('books*') ? 'text-amber-600 border-b-2 border-amber-600' : '' }} dark:text-white">
                        Libros
                    </a>
                    @can('bookshelves.addBook')
                        <a href="{{ url('bookshelves') }}"
                           class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('bookshelves') ? 'text-amber-600 border-b-2 border-amber-600' : '' }} dark:text-white">
                            Estanterías
                        </a>
                    @endcan
                    <a href="{{ url('about') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('about') ? 'text-amber-600 border-b-2 border-amber-600' : '' }} dark:text-white">
                        Sobre nós
                    </a>
                    <a href="{{ url('contact') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 text-sm font-medium transition duration-300 ease-in-out {{ request()->is('contact') ? 'text-amber-600 border-b-2 border-amber-600' : '' }} dark:text-white">
                        Contacto
                    </a>
                </div>
            </div>

            <!-- Botones derecha -->
            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}"
                       class="text-gray-700 hover:text-amber-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out dark:text-white">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out dark:text-white">
                        Rexístrate
                    </a>
                @endguest

                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false"
                                class="flex items-center space-x-2 text-gray-700 hover:text-amber-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300 ease-in-out dark:text-white">
                            <div
                                class="h-8 w-8 rounded-full bg-amber-600 flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span>{{ auth()->user()->name }}</span>
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 dark:bg-gray-900 dark:ring-white dark:ring-opacity-5"
                             style="display: none;">
                            <div class="py-1">
                                <a href="{{ route('settings.profile') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:text-amber-600 transition duration-150 dark:text-white">
                                    O meu perfil
                                </a>
                                <a href="{{ route('settings.password') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:text-amber-600 transition duration-150 dark:text-white">
                                    Cambiar contrasinal
                                </a>
                                <div class="border-t dark:border-gray-800"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:text-red-600 transition duration-150 dark:text-white">
                                        Pechar sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Menú móvil (hamburguesa) -->
            <div class="md:hidden">
                <button type="button"
                        class="bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-amber-600 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-amber-500 dark:bg-gray-900 dark:text-white dark:hover:text-amber-600 dark:hover:bg-gray-800"
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
            <div
                class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200 dark:bg-gray-900 dark:border-gray-700">
                <a href="{{ url('/') }}"
                   class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('homepage') ? 'text-amber-600 bg-amber-50' : '' }}">
                    Inicio
                </a>
                <a href="{{ url('/books') }}"
                   class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('books*') ? 'text-amber-600 bg-amber-50' : '' }} dark:text-white">
                    Libros
                </a>
                @can('bookshelves.addBook')
                    <a href="{{ url('/bookshelves') }}"
                       class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('bookshelves') ? 'text-amber-600 bg-amber-50' : '' }} dark:text-white">
                        Estanterías
                    </a>
                @endcan
                <a href="{{ url('/contact') }}"
                   class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('contact') ? 'text-amber-600 bg-amber-50' : '' }} dark:text-white">
                    Contacto
                </a>
                <a href="{{ url('/about') }}"
                   class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium {{ request()->is('about*') ? 'text-amber-600 bg-amber-50' : '' }} dark:text-white">
                    Sobre nós
                </a>

                <div class="border-t border-gray-200 pt-4 pb-3">
                    @guest
                        <a href="{{ route('login') }}"
                           class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium dark:text-white">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="bg-amber-600 hover:bg-amber-700 text-white block px-3 py-2 rounded-md text-base font-medium mt-2 text-center dark:text-white">
                            Rexístrate
                        </a>
                    @endguest

                    @auth
                        <div class="px-3 py-2 text-base font-medium text-gray-900 dark:text-white">
                            {{ auth()->user()->name }}
                        </div>
                        <a href="{{ route('settings.profile') }}"
                           class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium dark:text-white">
                            O meu perfil
                        </a>
                        <a href="{{ route('settings.password') }}"
                           class="text-gray-700 hover:text-amber-600 block px-3 py-2 rounded-md text-base font-medium dark:text-white">
                            Cambialo contrasinal
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium dark:text-white dark:hover:text-red-600 dark:text-red-600">
                                Pechar sesión
                            </button>
                        </form>
                    @endauth
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
