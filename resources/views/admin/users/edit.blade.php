<x-admin-layout
    title="Roles | JimCode"
    :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Usuarios', 'href' => route('admin.users.index')],
    ['name' => 'Editar']
]"
>

    <x-wire-card>

        <form action="{{ route('admin.users.update', $user) }}" method="post">
            @csrf
            @method('PUT')
            <div class="space-y-4">

                <div class="grid lg:grid-cols-2 gap-4">
                    <x-wire-input
                        label="Nombre"
                        name="name"
                        placeholder="Ingrese el nombre del usuario"
                        :value="old('name', $user->name)"
                    />
                    <x-wire-input
                        label="Correo Electrónico"
                        name="email"
                        placeholder="Ingrese el correo electrónico del usuario"
                        :value="old('email', $user->email)"
                    />
                    <x-wire-input
                        label="Número de DNI"
                        name="dni"
                        placeholder="Ingrese el dni del usuario"
                        :value="old('dni', $user->dni)"
                    />
                    <x-wire-input
                        label="Teléfono"
                        name="phone"
                        placeholder="Ingrese el número de teléfono del usuario"
                        :value="old('phone', $user->phone)"
                    />
                </div>
                <x-wire-input
                    label="Dirección"
                    name="address"
                    placeholder="Ingrese la dirección del usuario"
                    :value="old('address', $user->address)"
                />

                <x-wire-native-select
                    label="Rol"
                    name="role_id"
                >
                    <option value="">
                        Seleccione un rol
                    </option>
                    @foreach($roles as $role)
                        <option
                            value="{{ $role->id }}"
                            @selected(old('role', $user->roles->first()->id) == $role->id)
                        >
                            {{ $role->name }}
                        </option>
                    @endforeach
                </x-wire-native-select>


                <div class="flex justify-end mt-4">
                    <x-wire-button blue type="submit">
                        Guardar
                    </x-wire-button>
                </div>

            </div>
        </form>

    </x-wire-card>
</x-admin-layout>
