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
                    <div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                Articles
            </h1>
            <p class="mt-1 text-gray-500">
                Manage all published articles.
            </p>
        </div>

        <a href="{{ route('articles.create') }}"
           class="inline-flex items-center rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-700 transition">
            + Add Article
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <table class="min-w-full divide-y divide-gray-200">

            <!-- Table Header -->
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Name
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Description
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Content
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Actions
                    </th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-gray-100 bg-white">

                @forelse($articles as $article)

                    <tr class="hover:bg-gray-50 transition">

                        <!-- Name -->
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $article->name }}
                        </td>

                        <!-- Description -->
                        <td class="px-6 py-4 text-gray-600 max-w-sm">
                            {{ Str::limit($article->description, 80) }}
                        </td>

                        <!-- Content -->
                        <td class="px-6 py-4 text-gray-600 max-w-md">
                            {{ Str::limit(strip_tags($article->content), 120) }}
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">



                                <a href="{{ route('articles.edit', $article) }}"
                                   class="rounded-lg bg-amber-500 px-4 py-2 text-sm font-medium text-white hover:bg-amber-600 transition">
                                    Edit
                                </a>
                             

                                <form action="{{ route('articles.destroy', $article) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this article?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 transition">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                            No articles found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
