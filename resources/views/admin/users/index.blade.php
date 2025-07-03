<x-admin-layout
    title="Usuarios | JimCode"
    :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Usuarios']
]"
>
    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.users.create') }}">
            <i class="fa-solid fa-plus"></i>
            Nuevo
        </x-wire-button>
    </x-slot>
    @livewire('admin.datatables.user-table')
</x-admin-layout>
