<x-layouts.app>

    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item>Dashboard</flux:breadcrumbs.item>
        <flux:breadcrumbs.item :href="route('admin.users.index')">Usuarios</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Editar</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user) }}" method="post">
                @csrf
                @method('put')

                    <label>
                        Nombre:
                        <input class="mr-1" type="text" name="">
                    </label>

                @foreach($roles as $rol)
                    <input class="mr-1" type="checkbox" name="roles[]">
                @endforeach

                <p class="h5">Nombre:</p>
                <p class="form-control">{{ $user->name }}</p>

                {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach($roles as $rol)
                    <div>
                        <label>
                            <input type="checkbox" name="" id="">
                        </label>
                    </div>
                @endforeach
                {!! Form::close() !!}

                <div class="flex justify-end mt-4">
                    <flux:button variant="primary" type="submit">Enviar</flux:button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>
