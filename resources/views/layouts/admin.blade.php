@props([
    'breadcrumbs' => [],
    'title' => config('app.name', 'Laravel')
])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Fontawesome -->
    <script src="{{ asset('js/df2a35555f.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Wireui -->
    <wireui:scripts />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">

@include('layouts.includes.admin.navigator')

@include('layouts.includes.admin.sidebar')


<div class="p-4 sm:ml-64">
    <div class="mt-14 flex items-center">
        @include('layouts.includes.admin.breadcrumb')

        @isset($action)
            <div class="ml-auto">
                {{ $action }}
            </div>
        @endisset
    </div>

    {{ $slot }}
</div>


@stack('modals')

@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

@if(session('swal'))

    <script>
        Swal.fire(@json(session('swal')))
    </script>

@endif

<script>

    const forms = document.querySelectorAll('.delete-form');

    forms.forEach(form => {
       form.addEventListener('submit', (e) => {
           e.preventDefault();

           Swal.fire({
               title: "¿Estas seguro?",
               text: "No podras revertir esta acción!",
               icon: "warning",
               showCancelButton: true,
               confirmButtonColor: "#3085d6",
               cancelButtonColor: "#d33",
               confirmButtonText: "Si, eliminar!",
               cancelButtonText: 'Cancelar'
           }).then((result) => {
               if (result.isConfirmed) {
                   form.submit();
               }
           });

       })
    });

</script>


</body>
</html>
