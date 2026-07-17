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


<div class="bg-white rounded-xl shadow border border-gray-200">

    <div class="border-b border-gray-200 px-6 py-4">
        <h2 class="text-2xl font-bold text-gray-900">
            Create Article
        </h2>
        <p class="mt-1 text-gray-500">
            Fill in the information below to publish a new article.
        </p>
    </div>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">

        @csrf

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

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                rows="3"
                placeholder="Enter a brief description"
                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>

            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">
                Upload your cover image
            </label>

            <input
                type="file"
                id="cover_image"
                name="cover_image"
                accept="image/*"
                class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-700 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 file:mr-4 file:rounded-md file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100">

            @error('cover_image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="my-editor" class="block text-sm font-medium text-gray-700 mb-2">
                Post Content
            </label>
            <textarea name="content" id="my-editor">{{ old('content') }}</textarea>

            @error('content')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-3 pt-4">

            <a href="{{ route('articles.index') }}"
               class="rounded-lg border border-gray-300 px-5 py-2.5 text-gray-700 hover:bg-gray-100 transition">
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-lg bg-indigo-600 px-5 py-2.5 text-white hover:bg-indigo-700 transition">
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
