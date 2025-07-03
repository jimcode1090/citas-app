<x-admin-layout
    title="Roles | JimCode"
    :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Roles', 'href' => route('admin.roles.index')],
    ['name' => 'Editar']
]"
>

    <x-wire-card>

        <form action="{{ route('admin.roles.update', $role) }}" method="post">
            @csrf
            @method('PUT')
            <x-wire-input
                label="Nombre"
                name="name"
                placeholder="Nombre del rol"
                value="{{ old('name', $role) }}"
            />
            <div class="flex justify-end mt-4">
                <x-wire-button blue type="submit">
                    Actualizar
                </x-wire-button>
            </div>
        </form>

    </x-wire-card>
</x-admin-layout>
