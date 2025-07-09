<x-admin-layout
    title="Pacientes | JimCode"
    :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Pacientes', 'href' => route('admin.patients.index')],
    ['name' => 'Editar']
]"
>

    <form action="{{ route('admin.patients.update', $patient) }}" method="post">
        @csrf
        @method('PUT')

        <x-wire-card class="mb-8">
            <div class="lg:flex lg:justify-between lg:items-center">
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
                <div class="flex space-x-3 mt-6 lg:mt-0">
                    <x-wire-button
                        outline
                        gray
                        href="{{ route('admin.patients.index') }}"
                    >
                        Volver
                    </x-wire-button>

                    <x-wire-button
                        type="submit"
                    >
                        <i class="fa-solid fa-check"></i>
                        Guardar cambios
                    </x-wire-button>
                </div>
            </div>
        </x-wire-card>
        <x-wire-card>
            <div
                x-data="{
                    tab: 'datos-personales'
                }"
            >
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li class="me-2">
                            <a
                                x-on:click="tab = 'datos-personales'"
                                :class="{
                                    'inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg group active' : tab === 'datos-personales',
                                    'inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 group' : tab !== 'datos-personales'
                                }"
                                href="#"
                            >
                                <i class="fa-solid fa-user me-2"></i>
                                Datos Personales
                            </a>
                        </li>
                        <li class="me-2">
                            <a
                                x-on:click="tab = 'antecedentes'"
                                href="#"
                                :class="{
                                    'inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg group active' : tab === 'antecedentes',
                                    'inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 group' : tab !== 'antecedentes'
                                }"
                            >
                                <i class="fa-solid fa-file-lines me-2"></i>
                                Antecedentes
                            </a>
                        </li>
                        <li class="me-2">
                            <a
                                x-on:click="tab = 'informacion-general'"
                                href="#"
                                :class="{
                                    'inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg group active' : tab === 'informacion-general',
                                    'inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 group' : tab !== 'informacion-general'
                                }"
                            >
                                <i class="fa-solid fa-info me-2"></i>
                                Información General
                            </a>
                        </li>
                        <li class="me-2">
                            <a
                                x-on:click="tab = 'contacto-emergencia'"
                                href="#"
                                :class="{
                                    'inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg group active' : tab === 'contacto-emergencia',
                                    'inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 group' : tab !== 'contacto-emergencia'
                                }"
                            >
                                <i class="fa-solid fa-phone me-2"></i>
                                Contacto de Emergencia
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="px-4 mt-4">
                    <div x-show="tab === 'datos-personales'">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="text-gray-500 font-semibold text-sm">
                                    Teléfono:
                                </span>
                                <span class="text-gray-900 text-sm ml-1 ">
                                    {{ $patient->user->phone }}
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-500 font-semibold text-sm">
                                    Email:
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-500 font-semibold text-sm">
                                    Dirección:
                                </span>
                            </div>
                        </div>
                    </div>
                    <div x-show="tab === 'antecedentes' ">
                        Antecedentes
                    </div>
                    <div x-show="tab === 'informacion-general' ">
                        Información General
                    </div>
                    <div x-show="tab === 'contacto-emergencia' ">
                        Contacto de Emergencia
                    </div>
                </div>
            </div>
        </x-wire-card>

    </form>


</x-admin-layout>
