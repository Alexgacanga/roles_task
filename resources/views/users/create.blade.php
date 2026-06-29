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
                   <div class="max-w-3xl mx-auto px-6 py-8">

    <!-- Card -->
    <div class="bg-white shadow rounded-xl border border-gray-200">

        <!-- Header -->
        <div class="border-b border-gray-200 px-6 py-4">
            <h2 class="text-2xl font-bold text-gray-900">
                Add User
            </h2>
            <p class="mt-1 text-gray-500">
                Create a new user and assign roles.
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('users.store') }}" method="POST" class="p-6 space-y-6">

            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="John Doe">

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="john@example.com">

                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Confirm Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <!-- Roles -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Assign Role(s)
                </label>

                <select
                    name="roles[]"
                    multiple
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                    @endforeach

                </select>

                @error('roles')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('users.index') }}"
                   class="rounded-lg border border-gray-300 px-5 py-2.5 text-gray-700 hover:bg-gray-100">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg  px-5 py-2.5 text-black hover:bg-indigo-700">
                    Save User
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
