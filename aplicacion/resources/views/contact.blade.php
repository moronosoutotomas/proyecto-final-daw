<x-layouts.app>

    @section('title', 'Contacto')

    <div
        class="min-h-screen bg-gradient-to-bl from-blue-50 to-amber-100 dark:bg-gradient-to-bl dark:from-amber-950 dark:to-blue-950 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Encabezado -->
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Contáctanos</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    ¿Tes algunha pregunta, suxerencia ou precisas ayuda? Estaremos encantades de axudarte.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Formulario de contacto -->
                <div
                    class="border shadow dark:shadow-gray-900 dark:text-gray-400 rounded-lg p-6 bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">Envíanos unha mensaxe</h2>

                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
                                Nome completo *
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md dark:bg-amber-900/10 dark:border-gray-700 dark:text-gray-400-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300"
                                placeholder="Seu nome">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
                                Enderezo electrónico *
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md dark:border-gray-700 dark:bg-amber-900/10 dark:text-gray-400-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300"
                                placeholder="seu@enderezo.com">
                        </div>

                        <!-- Asunto -->
                        <div>
                            <label for="subject"
                                   class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
                                Asunto *
                            </label>
                            <select
                                id="subject"
                                name="subject"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md dark:border-gray-700 bg-white dark:bg-amber-900/10 dark:text-gray-400-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300 [&>option]:bg-white [&>option]:dark:bg-gray-800 [&>option]:text-gray-900 [&>option]:dark:text-gray-300">
                                <option value="">Selecciona un asunto</option>
                                <option value="support">Soporte técnico</option>
                                <option value="suggestion">Suxerencia</option>
                                <option value="partnership">Colaboración</option>
                                <option value="other">Outro</option>
                            </select>
                        </div>

                        <!-- Mensaje -->
                        <div>
                            <label for="message"
                                   class="block text-sm font-medium text-gray-700 dark:text-white mb-2">
                                Mensaxe *
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md dark:border-gray-700 dark:bg-amber-900/10 dark:text-gray-400-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-300"
                                placeholder="Escribe a túa mensaxe aquí..."></textarea>
                        </div>

                        <!-- Botón enviar -->
                        <div>
                            <button
                                type="submit"
                                class="w-full bg-amber-600 hover:bg-amber-700 text-white font-medium py-3 px-4 rounded-md duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                                Enviar mensaxe
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Información de contacto -->
                <div class="space-y-6">
                    <!-- Información general -->
                    <div
                        class="border shadow dark:shadow-gray-900 dark:text-white rounded-lg p-6  bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">
                            Información de contacto
                        </h2>

                        <div class="space-y-4">
                            <!-- Email -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Email</h3>
                                    <p class="text-sm text-gray-400">contacto@bookbag.com</p>
                                    <p class="text-sm text-gray-400">soporte@bookbag.com</p>
                                </div>
                            </div>

                            <!-- Teléfono -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Teléfono</h3>
                                    <p class="text-sm  text-gray-400">+34 123 45 67 89</p>
                                </div>
                            </div>

                            <!-- Dirección -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Dirección</h3>
                                    <p class="text-sm text-gray-400">
                                        C/ Alcalde Lavadores nº 10<br>
                                        Vigo, Pontevedra 36210<br>
                                        España
                                    </p>
                                </div>
                            </div>

                            <!-- Horario -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-gray-900 dark:text-white">Horario de
                                        atención</h3>
                                    <p class="text-sm text-gray-400">
                                        Lunes a Venres: 9:00 - 18:00<br>
                                        Sábados e domingos: Pechado
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ rápida -->
                    <div
                        class="border shadow dark:shadow-gray-900 rounded-lg p-6  bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700">
                        <h2 class="text-xl font-semibold text-gray-800  dark:text-white mb-4">
                            FAQ - Preguntas frecuentes
                        </h2>

                        <div class="space-y-3">
                            <div>
                                <h3 class="font-medium text-gray-900 dark:text-white">
                                    ¿Cómo me rexistro na plataforma?
                                </h3>
                                <p class="text-sm text-gray-400 mt-1">
                                    Fai clic en "Rexístrate" na esquina superior dereita e completa o formulario.
                                </p>
                            </div>

                            <div>
                                <h3 class="font-medium text-gray-900 dark:text-white">
                                    ¿É gratuita a plataforma?
                                </h3>
                                <p class="text-sm text-gray-400 mt-1">
                                    Sí, ofrecemos acceso gratuito a tódo-los nosos libros e recursos.
                                </p>
                            </div>

                            <div>
                                <h3 class="font-medium text-gray-900 dark:text-white">¿Podo suxerir libros?</h3>
                                <p class="text-sm text-gray-400 mt-1">Evidentemente! Usa o formulario
                                    de contacto para
                                    enviárno-las túas suxerencias.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
