<x-layouts.app>

    <div class="mb-4 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Posts</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{ route('admin.posts.create') }}" class="btn btn-blue text-xs">Nuevo post</a>
    </div>

    <div class="relative overflow-x-auto mb-4 rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3" width="10px">
                    Edit
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $post->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $post->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{--                        <x-button rounded="full" blue label="Edit"/>--}}
                        {{--                        <x-button rounded="full" red label="Delete"/>--}}
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-blue text-xs">Editar</a>

                            <form class="delete-form" action="{{ route('admin.posts.destroy', $post) }}"
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
        {{ $posts->links() }}
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
