<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/articles') }}"
                        class="inline-block px-5 py-1.5  border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5  text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <section class="max-w-6xl mx-auto px-6 py-16">

        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    Explore Our Latest
                    <span class="underline decoration-teal-500 decoration-2 underline-offset-4">Articles</span>
                </h2>
                <p class="text-gray-500 text-sm max-w-md leading-relaxed mt-3">
                    Discover the latest news and updates.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-3 w-full md:w-auto">

                <form action="{{ route('articles.indexany') }}" method="GET" class="flex w-full sm:w-auto">
                    <input
                        class="w-full sm:w-64 rounded-l-lg border-gray-300 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 text-sm py-2.5 px-3"
                        name="search" placeholder="Search articles..." value="{{ request('search') }}">
                    <button
                        class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2.5 text-sm font-medium rounded-r-lg transition-colors border border-transparent"
                        type="submit">
                        Search
                    </button>
                </form>


            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($articles as $article)
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col h-full border border-gray-100">

                    <a href="{{ route('articles.showany', $article->id) }}">
                        <img src="{{ $article->cover_image ? asset('storage/' . $article->cover_image) : '' }}"
                            alt="{{ $article->name }}" class="w-full h-56 object-cover" />
                    </a>

                    <div class="p-5 flex flex-col flex-grow">
                        <div class="text-xs font-semibold tracking-wide text-teal-600 uppercase mb-2">
                            By <a href="{{ route('users.profileany', $article->user->id) }}" class="hover:underline">
                                {{ $article->user->name }}</a>
                        </div>

                        <h3 class="font-semibold text-gray-900 text-lg mb-2 leading-snug line-clamp-2">
                            {{ $article->name }}
                        </h3>

                        <div class="flex items-center gap-1.5 text-xs text-gray-400 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="9" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5l3 3" />
                            </svg>
                            <span>{{ $article->created_at->format('F j, Y') }}</span>
                        </div>

                        <p class="text-gray-500 text-sm line-clamp-2 mb-4 flex-grow">
                            {{ Str::limit(strip_tags($article->content), 100) }}
                        </p>

                        <div class="pt-4 mt-auto border-t border-gray-100 flex items-center justify-between">

                            <a href="{{ route('articles.showany', $article->id) }}"
                                class="inline-flex items-center gap-1.5 text-sm font-semibold text-gray-900 hover:text-teal-600 transition-colors">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>



                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-16 text-center bg-white rounded-xl shadow-sm border border-gray-100">
                    <p class="text-gray-500 mb-4">No articles found matching your search.</p>
                </div>
            @endforelse

        </div>

        <div class="mt-10">
            {{ $articles->links() }}
        </div>

    </section>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
