@php
    $links = [
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
            'icon' => 'fa-solid fa-gauge',
            'active' => request()->routeIs('admin.dashboard')
        ],
        [
            'header' => 'Gestión',
        ],
        [
            'name' => 'Roles y Permisos',
            'href' => route('admin.roles.index'),
            'icon' => 'fa-solid fa-shield-halved',
            'active' => request()->routeIs('admin.roles.*')
        ],
        [
            'name' => 'Usuarios',
            'href' => route('admin.users.index'),
            'icon' => 'fa-solid fa-users',
            'active' => request()->routeIs('admin.users.*')
        ],
        [
            'name' => 'Pacientes',
            'href' => route('admin.patients.index'),
            'icon' => 'fa-solid fa-user-injured',
            'active' => request()->routeIs('admin.patients.*')
        ],
        /*[
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
            'icon' => 'fa-solid fa-gauge',
            'active' => request()->routeIs('admin.dashboard'),
            'submenu' => [
                [
                   'name' => 'Productos',
                   'href' => route('admin.dashboard'),
                   'active' => request()->routeIs('admin.dashboard')
                ]
            ]
        ],*/
    ];
@endphp


<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
       aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach($links as $link)
                <li>
                    @isset($link['header'])
                        <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase">
                            {{ $link['header'] }}
                        </div>
                    @else
                        @isset($link['submenu'])
                            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <span class="inline-flex justify-center items-center w-6 h-6 text-gray-500">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
                                    {{ $link['name'] }}
                                </span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <ul id="dropdown-example" class="hidden py-2 space-y-2">
                                @foreach($link['submenu'] as $submenu)
                                    <li>
                                        <a href="{{ $submenu['href'] }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            {{ $submenu['name'] }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        @else
                            <a href="{{ $link['href'] }}"
                               class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100' : '' }}">
                                <span class="inline-flex justify-center items-center w-6 h-6 text-gray-500">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>
                                <span class="ms-3">
                                    {{ $link['name'] }}
                                </span>
                            </a>
                        @endisset

                    @endisset

                </li>
            @endforeach
        </ul>
    </div>
</aside>
