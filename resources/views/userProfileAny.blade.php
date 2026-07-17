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
                        <a
                            href="{{ url('/articles') }}"
                            class="inline-block px-5 py-1.5  border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5  text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

    <section class="max-w-6xl mx-auto px-6 py-16">

    <!-- Profile Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8 mb-12">

        <div class="flex items-center gap-6">

            <div class="w-24 h-24 rounded-full bg-teal-600 flex items-center justify-center text-white text-4xl font-bold shadow">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                    {{ $user->name }}
                </h1>

                <p class="text-gray-500 mt-2">
                    {{ $user->email }}
                </p>

                <div class="flex flex-wrap gap-2 mt-4">
                    @foreach ($roles as $role)
                        <span
                            class="bg-teal-100 text-teal-700 text-sm font-medium px-3 py-1 rounded-full">
                            {{ $role->name }}
                        </span>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="grid grid-cols-2 gap-6">

            <div class="bg-white border border-gray-100 rounded-xl shadow-sm px-8 py-6 text-center">
                <p class="text-gray-500 text-sm">
                    Articles
                </p>

                <p class="text-4xl font-bold text-teal-600 mt-2">
                    {{ $articles->count() }}
                </p>
            </div>

            <div class="bg-white border border-gray-100 rounded-xl shadow-sm px-8 py-6 text-center">
                <p class="text-gray-500 text-sm">
                    Roles
                </p>

                <p class="text-4xl font-bold text-gray-900 mt-2">
                    {{ $roles->count() }}
                </p>
            </div>

        </div>

    </div>

    <!-- Section Heading -->
    <div class="flex items-center justify-between mb-8">

        <div>
            <h2 class="text-3xl font-bold text-gray-900">
                Articles by
                <span class="underline decoration-teal-500 decoration-2 underline-offset-4">
                    {{ $user->name }}
                </span>
            </h2>

            <p class="text-gray-500 text-sm mt-2">
                Browse all articles published by this author.
            </p>
        </div>

        @can('create', App\Models\Article::class)
            @if(auth()->id() == $user->id)
                <a href="{{ route('articles.create') }}"
                   class="inline-flex items-center rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-teal-700 transition">
                    + Add Article
                </a>
            @endif
        @endcan

    </div>

<!-- Search -->
<div class="flex justify-end mb-8">
    <form action="{{ route('users.userProfile', $user->id) }}"
          method="GET"
          class="flex w-full sm:w-auto">

        <input
            class="w-full sm:w-72 rounded-l-lg border-gray-300 focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 text-sm py-2.5 px-3"
            name="search"
            placeholder="Search articles..."
            value="{{ request('search') }}">

        <button
            class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2.5 text-sm font-medium rounded-r-lg transition-colors"
            type="submit">
            Search
        </button>
    </form>
</div>

<!-- Articles -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse ($articles as $article)

        <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col h-full border border-gray-100">

            <a href="{{ route('articles.showany', $article->id) }}">
                <img
                    src="{{ asset('storage/' . $article->cover_image) }}"
                    alt="{{ $article->name }}"
                    class="w-full h-56 object-cover">
            </a>

            <div class="p-5 flex flex-col flex-grow">

                <div class="text-xs font-semibold tracking-wide text-teal-600 uppercase mb-2">
                    By
                    <a href="{{ route('users.userProfile', $article->user->id) }}"
                       class="hover:underline">
                        {{ $article->user->name }}
                    </a>
                </div>

                <h3 class="font-semibold text-gray-900 text-lg mb-2 line-clamp-2">
                    {{ $article->name }}
                </h3>

                <div class="flex items-center gap-2 text-xs text-gray-400 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <circle cx="12" cy="12" r="9"/>
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 7v5l3 3"/>
                    </svg>

                    {{ $article->created_at->format('F j, Y') }}
                </div>

                <p class="text-gray-500 text-sm line-clamp-2 flex-grow">
                    {{ Str::limit(strip_tags($article->content), 100) }}
                </p>

                <div class="pt-4 mt-auto border-t border-gray-100 flex items-center justify-between">

                    <a href="{{ route('articles.show', $article) }}"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-gray-900 hover:text-teal-600">
                        Read More
                    </a>

                    <div class="flex gap-3">
                        @can('update', $article)
                            <a href="{{ route('articles.edit', $article) }}"
                               class="text-xs font-medium text-amber-500 hover:text-amber-600">
                                Edit
                            </a>
                        @endcan

                        @can('delete', $article)
                            <form action="{{ route('articles.destroy', $article) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this article?')">
                                @csrf
                                @method('DELETE')

                                <button class="text-xs font-medium text-red-500 hover:text-red-600">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </div>

                </div>

            </div>

        </article>

    @empty

        <div class="col-span-full py-16 text-center bg-white rounded-xl border border-gray-100 shadow-sm">

            <h3 class="text-xl font-semibold text-gray-700">
                No articles yet.
            </h3>

            <p class="text-gray-500 mt-2">
                {{ $user->name }} hasn't published any articles.
            </p>

        </div>

    @endforelse

</div>


    </div>

    @if(method_exists($articles, 'links'))
        <div class="mt-10">
            {{ $articles->links() }}
        </div>
    @endif

</section>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
