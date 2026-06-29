<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.update', $role) }}" method="POST" class="space-y-6">

    @csrf
    @method('PUT')

    <!-- Role Name -->
    <div>
        <label class="block mb-2 text-sm font-medium">
            Role Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $role->name) }}"
            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

    </div>

    <!-- Permissions -->
    <div>

        <label class="block mb-3 text-sm font-medium">
            Permissions
        </label>

        <div class="grid md:grid-cols-3 gap-3">

            @foreach($permissions as $permission)

                <label class="flex items-center gap-2 border rounded-lg p-3">

                    <input
                        type="checkbox"
                        name="permissions[]"
                        value="{{ $permission->id }}"

                        {{ in_array($permission->id,
                        old('permissions',
                        $role->permissions->pluck('id')->toArray()))
                        ? 'checked' : '' }}

                        class="rounded text-indigo-600">

                    {{ $permission->name }}

                </label>

            @endforeach

        </div>

    </div>

    <div class="flex justify-end gap-3">

        <a href="{{ route('roles.index') }}"
           class="border rounded-lg px-5 py-2">
            Cancel
        </a>

        <button
            class="bg-indigo-600 text-black px-5 py-2 rounded-lg hover:bg-indigo-700">

            Update Role

        </button>

    </div>

</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>