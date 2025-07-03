<x-admin-layout
    title="Pacientes | JimCode"
    :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Pacientes']
]"
>

    @livewire('admin.datatables.patient-table')
</x-admin-layout>
