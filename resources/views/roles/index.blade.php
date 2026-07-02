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
                    <div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Roles & Permissions
            </h1>
            <p class="text-gray-500 mt-1">
                Manage application roles and their permissions.
            </p>
        </div>

        <a href="{{ route('roles.create') }}"
           class="inline-flex items-center rounded-lg bg-indigo-600 px-5 py-2.5 text-white font-medium hover:bg-indigo-700">
            + Add Role
        </a>
    </div>

    <!-- Table -->
    <div class="mb-5 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Role
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Permissions
                    </th>

                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">
                        Total
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">

                @forelse($roles as $role)

                <tr class="hover:bg-gray-50">

                    <!-- Role -->
                    <td class="px-6 py-5">
                        <div class="font-semibold text-gray-800">
                            {{ $role->name }}
                        </div>
                    </td>

                    <!-- Permissions -->
                    <td class="px-6 py-5">

                        <div class="flex flex-wrap gap-2">

                            @forelse($role->permissions as $permission)

                                <span
                                    class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-medium text-indigo-700">
                                    {{ $permission->name }}
                                </span>

                            @empty

                                <span class="text-sm text-gray-400">
                                    No permissions assigned
                                </span>

                            @endforelse

                        </div>

                    </td>

                    <!-- Count -->
                    <td class="px-6 py-5 text-center">
                        <span
                            class="rounded-full bg-gray-100 px-3 py-1 text-sm font-semibold text-gray-700">
                            {{ $role->permissions->count() }}
                        </span>
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-5">

                        <div class="flex justify-end gap-2">

                            <a href="{{ route('roles.edit',$role) }}"
                               class="rounded-lg bg-yellow-500 px-4 py-2 text-sm text-white hover:bg-yellow-600">
                                Edit
                            </a>

                            <form action="{{ route('roles.destroy',$role) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this role?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="rounded-lg bg-red-600 px-4 py-2 text-sm text-white hover:bg-red-700">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                        No roles found.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>
    </div>
{{ $roles->links() }}

</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>