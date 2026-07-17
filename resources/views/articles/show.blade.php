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
                    <div class="max-w-4xl mx-auto px-6 py-10">
                        <article class="bg-white rounded-xl shadow-lg overflow-hidden">

                            <!-- Header -->
                            <div class="border-b border-gray-200 px-8 py-6">
                                <h1 class="text-4xl font-bold text-gray-900">
                                    {{ $article->name }}
                                </h1>

                                <p class="mt-3 text-lg text-gray-600">
                                    {{ $article->description }}
                                </p>
                            </div>
                            <img src="{{ $article->cover_image ? asset('storage/' . $article->cover_image) : '' }}"
                                alt="{{ $article->name }}" class="w-full h-64 object-cover">
                            <!-- Content -->
                            <div class="px-8 py-8">
                                <div class="prose max-w-none text-gray-700 leading-8">
                                    <div class="post-content">
                                        {!! $article->content !!}
                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
