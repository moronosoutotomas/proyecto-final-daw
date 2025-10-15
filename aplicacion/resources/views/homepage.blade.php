<x-layouts.app>

    @section('title', 'Inicio')

    <div class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:from-blue-950 dark:to-amber-950 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center py-16">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                    Benvido a <span class="text-amber-600">Bookbag</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
                    atopa e rexistra as túas lecturas
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('books.index') }}"
                       class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-3 rounded-lg font-medium transition duration-300 transform hover:scale-105">
                        Explorar libros
                    </a>
                    <a href="{{ route('about') }}"
                       class="border border-amber-600 text-amber-600 hover:bg-amber-600 hover:text-white px-8 py-3 rounded-lg font-medium transition duration-300">
                        Coñece máis
                    </a>
                </div>
            </div>

            <!-- Features Grid -->
            {{--
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div
                        class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Amplio Catálogo</h3>
                    <p class="text-gray-600">Accede a miles de libros de diferentes géneros y autores.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div
                        class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Acceso Seguro</h3>
                    <p class="text-gray-600">Tu información y colección están protegidas y seguras.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div
                        class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Rápido y Eficiente</h3>
                    <p class="text-gray-600">Navegación fluida y búsqueda instantánea de contenido.</p>
                </div>
            </div>
            --}}
        </div>
    </div>

</x-layouts.app>
