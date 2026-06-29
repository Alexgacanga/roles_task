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
                    <form action="{{ route('articles.update', $article) }}" method="POST" class="space-y-6">

    @csrf
    @method('PUT')

    <!-- Name -->
    <div>

        <label class="block mb-2 text-sm font-medium">
            Article Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $article->name) }}"
            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

    </div>

    <!-- Description -->
    <div>

        <label class="block mb-2 text-sm font-medium">
            Description
        </label>

        <textarea
            name="description"
            rows="3"
            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $article->description) }}</textarea>

    </div>

    <!-- Content -->
    <div>

        <label class="block mb-2 text-sm font-medium">
            Content
        </label>

        <textarea
            name="content"
            rows="10"
            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('content', $article->content) }}</textarea>

    </div>

    <div class="flex justify-end gap-3">

        <a href="{{ route('articles.index') }}"
           class="border rounded-lg px-5 py-2">
            Cancel
        </a>

        <button
            class="bg-indigo-600 text-black px-5 py-2 rounded-lg hover:bg-indigo-700">

            Update Article

        </button>

    </div>

</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>