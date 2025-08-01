<div class="flex items-center space-x-2">
    <x-wire-button blue xs href="{{ route('admin.roles.edit', $role) }}">
        <i class="fa-solid fa-pen-to-square"></i>
    </x-wire-button>
    <form
        action="{{ route('admin.roles.destroy', $role) }}"
        method="post"
        class="delete-form"
    >
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" red xs>
            <i class="fa-solid fa-trash"></i>
        </x-wire-button>
    </form>
</div>
