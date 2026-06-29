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
                Create Article
            </h2>
            <p class="mt-1 text-gray-500">
                Fill in the information below to publish a new article.
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('articles.store') }}" method="POST" class="p-6 space-y-6">

            @csrf

            <!-- Article Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Article Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter article title"
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    placeholder="Write a short description..."
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>

                @error('description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                    Content
                </label>

                <textarea
                    id="content"
                    name="content"
                    rows="10"
                    placeholder="Write your article content here..."
                    class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('content') }}</textarea>

                @error('content')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('articles.index') }}"
                   class="rounded-lg border border-gray-300 px-5 py-2.5 text-gray-700 hover:bg-gray-100 transition">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-indigo-600 px-5 py-2.5 text-black hover:bg-indigo-700 transition">
                    Save Article
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
