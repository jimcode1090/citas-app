<x-admin-layout
    title="Dashboard"
    :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Pruebas',
        'href' => ''
    ]
]">
    <x-wire-button>
        Prueba
    </x-wire-button>


</x-admin-layout>
