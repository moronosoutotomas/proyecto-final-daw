<x-layouts.app>

    <div class="mb-4 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Libros</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('books.create') }}" class="btn btn-blue text-xs">Nuevo libro</a>
    </div>

    <div class="relative overflow-x-auto mb-4 rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ISBN
                </th>
                <th scope="col" class="px-6 py-3">
                    Título
                </th>
                <th scope="col" class="px-6 py-3" width="10px">
                    Autor
                </th>
                <th scope="col" class="px-6 py-3" width="10px">
                    Fecha de publicación
                </th>
                <th scope="col" class="px-6 py-3" width="10px">
                    Valoración
                </th>
                <th scope="col" class="px-6 py-3" width="10px">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody class="rounded-lg">
            @foreach($books as $book)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $book->isbn13 }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $book->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $book->author }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $book->publication_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $book->avg_rating }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-blue text-xs">Editar</a>

                            <form class="delete-form" action=""
                                  method="post">
                                @csrf
                                @method('delete')

                                <button class="btn btn-red text-xs">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $books->links() }}
    </div>

    @push('js')
        <script>
            forms = document.querySelectorAll('.delete-form');

            forms.forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    Swal.fire({
                        title: "Estás seguro?",
                        text: "No podrás revertir esto!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí, bórralo",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush


</x-layouts.app>
