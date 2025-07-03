<x-admin-layout
    title="Roles | JimCode"
    :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Roles', 'href' => route('admin.roles.index')],
    ['name' => 'Nuevo']
]"
>
    <x-wire-card>

        <form action="{{ route('admin.roles.store') }}" method="post">
            @csrf
            <x-wire-input
                label="Nombre"
                name="name"
                placeholder="Nombre del rol"
                value="{{ old('name') }}"
            />
            <div class="flex justify-end mt-4">
                <x-wire-button blue type="submit">
                    Guardar
                </x-wire-button>
            </div>
        </form>

    </x-wire-card>

</x-admin-layout>
