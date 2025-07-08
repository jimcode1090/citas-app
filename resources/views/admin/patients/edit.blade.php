<x-admin-layout
    title="Pacientes | JimCode"
    :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Pacientes', 'href' => route('admin.patients.index')],
    ['name' => 'Editar']
]"
>

    <form action="">

        <x-wire-card>
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-5">
                    <img
                        class="h-20 w-20 rounded-full object-cover object-center"
                        src="{{ $patient->user->profile_photo_url }}" alt="{{ $patient->user->name }}">
                    <div>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $patient->user->name }}
                        </p>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <x-wire-button
                        outline
                        gray
                        href="{{ route('admin.patients.index') }}"
                    >
                        Volver
                    </x-wire-button>

                    <x-wire-button>
                        <i class="fa-solid fa-check"></i>
                        Guardar cambios
                    </x-wire-button>
                </div>
            </div>
        </x-wire-card>

        <x-wire-card>

        </x-wire-card>

    </form>


</x-admin-layout>
