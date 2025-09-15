<x-layouts.app>

    <div class="mb-4 flex justify-between items-center">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item :href="route('dashboard')">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>Usuarios</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        @can('create')
            <a href="{{--{{ route('admin.users.create', $user) }}--}}" class="btn btn-blue text-xs">Nuevo usuario</a>
        @endcan
    </div>

    <div class="relative overflow-x-auto mb-4 rounded-lg">
        @can('filter')
            <input wire:model="search"
                   class="p-3 mb-4 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Ingrese aqui un nombre o un email para filtrar...">
        @endcan

        <table class="w-full">
            <thead
                class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded-lg">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="text-left px-6 py-3">
                    Name
                </th>
                <th scope="col" class="text-left px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3" width="10px">
                    Edit
                </th>
            </tr>
            </thead>
            <tbody class="rounded-lg">
            @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{--                        <x-button rounded="full" blue label="Edit"/>--}}
                        {{--                        <x-button rounded="full" red label="Delete"/>--}}
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-blue text-xs">Editar</a>

                            <form class="delete-form" action="{{--{{ route('admin.users.destroy', $user) }}--}}"
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

    {{--    <div class="mt-4">--}}
    {{--                {{ $users->links() }}--}}
    {{--    </div>--}}

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
