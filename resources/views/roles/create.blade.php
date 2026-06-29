<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-4xl mx-auto px-6 py-8">

    <!-- Card -->
    <div class="bg-white rounded-xl shadow border border-gray-200">

        <!-- Header -->
        <div class="border-b border-gray-200 px-6 py-4">
            <h2 class="text-2xl font-bold text-gray-900">
                Create Role
            </h2>
            <p class="mt-1 text-gray-500">
                Create a new role and assign permissions.
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('roles.store') }}" method="POST" class="p-6 space-y-6">

            @csrf

            <!-- Role Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Role Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Administrator"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    id="slug"
                    name="slug"
                    value="{{ old('slug') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                @error('slug')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Permissions -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">
                    Assign Permissions
                </label>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">

                    @foreach($permissions as $permission)

                        <label class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 hover:bg-gray-50 cursor-pointer">

                            <input
                                type="checkbox"
                                name="permissions[]"
                                value="{{ $permission->id }}"
                                {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">

                            <span class="text-sm text-gray-700">
                                {{ $permission->name }}
                            </span>

                        </label>

                    @endforeach

                </div>

                @error('permissions')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('roles.index') }}"
                   class="rounded-lg border border-gray-300 px-5 py-2.5 text-gray-700 hover:bg-gray-100 transition">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-indigo-600 px-5 py-2.5 text-black hover:bg-indigo-700 transition">
                    Save Role
                </button>

            </div>

        </form>

    </div>

</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
