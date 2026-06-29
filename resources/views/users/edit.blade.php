<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Name -->
    <div>
        <label class="block mb-2 text-sm font-medium">Name</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

        @error('name')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email -->
    <div>
        <label class="block mb-2 text-sm font-medium">Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

        @error('email')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <!-- Roles -->
    <div>
        <label class="block mb-2 text-sm font-medium">
            Roles
        </label>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

            @foreach($roles as $role)

                <label class="flex items-center gap-2 border rounded-lg p-3">

                    <input
                        type="checkbox"
                        name="roles[]"
                        value="{{ $role->id }}"

                        {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}

                        class="rounded text-indigo-600">

                    {{ $role->name }}

                </label>

            @endforeach

        </div>

    </div>

    <div class="flex justify-end gap-3">
        <a href="{{ route('users.index') }}"
           class="px-5 py-2 border rounded-lg">
            Cancel
        </a>

        <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700">
            Update User
        </button>
    </div>

</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
