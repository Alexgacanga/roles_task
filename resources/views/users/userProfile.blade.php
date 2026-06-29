<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto px-6 py-8">

    <!-- Profile Card -->
    <div class="bg-white rounded-xl shadow border border-gray-200">

        <div class="p-6">

            <div class="flex items-center justify-between">

                <div class="flex items-center space-x-4">

                    <!-- Avatar -->
                    <div class="w-16 h-16 rounded-full bg-indigo-600 flex items-center justify-center text-white text-2xl font-bold">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">
                            {{ $user->name }}
                        </h2>

                        <p class="text-gray-500">
                            {{ $user->email }}
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">

                            @foreach($roles as $role)

                                <span class="bg-indigo-100 text-indigo-700 text-xs font-medium px-3 py-1 rounded-full">
                                    {{ $role->name }}
                                </span>

                            @endforeach

                        </div>

                    </div>

                </div>

                <div class="text-right">

                    <p class="text-gray-500 text-sm">
                        Total Articles
                    </p>

                    <p class="text-4xl font-bold text-indigo-600">
                        {{ $user->articles->count() }}
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Articles -->
    <div class="mt-8 bg-white rounded-xl shadow border border-gray-200">

        <div class="px-6 py-4 border-b border-gray-200">

            <h3 class="text-xl font-semibold">
                My Articles
            </h3>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                            Name
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                            Description
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                            Created
                        </th>

                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($user->articles as $article)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4 font-medium">
                                {{ $article->name }}
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ Str::limit($article->description,80) }}
                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $article->created_at }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ route('articles.show',$article) }}"
                                        class="bg-blue-600 text-white px-3 py-2 rounded-lg hover:bg-blue-700 text-sm">

                                        View

                                    </a>

                                    <a href="{{ route('articles.edit',$article) }}"
                                        class="bg-yellow-500 text-white px-3 py-2 rounded-lg hover:bg-yellow-600 text-sm">

                                        Edit

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-8 text-gray-500">

                                This user has not published any articles.

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
    </div>
</x-app-layout>
