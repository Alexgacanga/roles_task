<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

                        <section class="max-w-6xl mx-auto px-6 py-16">

                            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
                                <div>
                                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                                        Explore Our Latest
                                        <span
                                            class="underline decoration-teal-500 decoration-2 underline-offset-4">Articles</span>
                                    </h2>
                                    <p class="text-gray-500 text-sm max-w-md leading-relaxed mt-3">
                                        Discover the latest news and updates.
                                    </p>
                                </div>

                                <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">

                                    <form action="{{ route('articles.index') }}" method="GET"
                                        class="flex w-full sm:w-auto">
                                        <input
                                            class="w-full sm:w-64 rounded-l-lg border-gray-300 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 text-sm py-2.5 px-3"
                                            name="search" placeholder="Search articles..."
                                            value="{{ request('search') }}">
                                        <button
                                            class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2.5 text-sm font-medium rounded-r-lg transition-colors border border-transparent"
                                            type="submit">
                                            Search
                                        </button>
                                    </form>

                                    @can('create', App\Models\Article::class)
                                        <a href="{{ route('articles.create') }}"
                                            class="w-full sm:w-auto inline-flex justify-center items-center rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-teal-700 transition whitespace-nowrap">
                                            + Add Article
                                        </a>
                                    @endcan
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                                @forelse ($articles as $article)
                                    <article
                                        class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col h-full border border-gray-100">

                                        <a href="{{ route('articles.show', $article) }}">
                                            <img src="{{ $article->cover_image ? asset('storage/' . $article->cover_image) : '' }}"
                                                alt="{{ $article->name }}" class="w-full h-56 object-cover" />
                                        </a>

                                        <div class="p-5 flex flex-col flex-grow">
                                            <div
                                                class="text-xs font-semibold tracking-wide text-teal-600 uppercase mb-2">
                                                By <a href="{{ route('users.userProfile', $article->user->id) }}"
                                                    class="hover:underline">{{ $article->user->name }}</a>
                                            </div>

                                            <h3
                                                class="font-semibold text-gray-900 text-lg mb-2 leading-snug line-clamp-2">
                                                {{ $article->name }}
                                            </h3>

                                            <div class="flex items-center gap-1.5 text-xs text-gray-400 mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <circle cx="12" cy="12" r="9" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 7v5l3 3" />
                                                </svg>
                                                <span>{{ $article->created_at->format('F j, Y') }}</span>
                                            </div>

                                            <p class="text-gray-500 text-sm line-clamp-2 mb-4 flex-grow">
                                                {{ Str::limit(strip_tags($article->content), 100) }}
                                            </p>

                                            <div
                                                class="pt-4 mt-auto border-t border-gray-100 flex items-center justify-between">

                                                <a href="{{ route('articles.show', $article) }}"
                                                    class="inline-flex items-center gap-1.5 text-sm font-semibold text-gray-900 hover:text-teal-600 transition-colors">
                                                    Read More
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                                    </svg>
                                                </a>

                                                <div class="flex items-center gap-3">
                                                    @can('update', $article)
                                                        <a href="{{ route('articles.edit', $article) }}"
                                                            class="text-xs font-medium text-amber-500 hover:text-amber-600 transition">
                                                            Edit
                                                        </a>
                                                    @endcan

                                                    @can('delete', $article)
                                                        <form action="{{ route('articles.destroy', $article) }}"
                                                            method="POST" class="inline m-0"
                                                            onsubmit="return confirm('Are you sure you want to delete this article?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-xs font-medium text-red-500 hover:text-red-600 transition">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </div>

                                            </div>
                                        </div>
                                    </article>
                                @empty
                                    <div
                                        class="col-span-full py-16 text-center bg-white rounded-xl shadow-sm border border-gray-100">
                                        <p class="text-gray-500 mb-4">No articles found matching your search.</p>
                                        @can('create', App\Models\Article::class)
                                            <a href="{{ route('articles.create') }}"
                                                class="text-teal-600 font-medium hover:underline">Write the first
                                                article</a>
                                        @endcan
                                    </div>
                                @endforelse

                            </div>

                            <div class="mt-10">
                                {{ $articles->links() }}
                            </div>

                        </section>
                        
</x-app-layout>
