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
                    <div class="flex justify-between items-center">
                         <form action = {{ route('users.index') }} method="GET">
                            <input name="search" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Search users...">
                            <button class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700" type="submit">Search</button>
                        </form>
                        @can('create-users')
                            <a class="inline-flex items-center rounded-lg bg-indigo-600 px-5 py-2.5 text-white font-medium hover:bg-indigo-700" href="{{ route('users.create') }}">
                                + Add User
                            </a>
                            @endcan
                    </div>
                    <div class="overflow-x-auto px-4 md:px-8 mt-6">
                        
                        <table class="mb-5 w-full max-w-7xl mx-auto">
      <thead
         class="text-slate-900 text-left text-sm font-semibold border-b border-slate-300 whitespace-nowrap">
         <tr>
            <th scope="col" class="pl-0 px-3 py-3.5">Name</th>
            <th scope="col" class="px-3 py-3.5">Email</th>
            <th scope="col" class="px-3 py-3.5">Role</th>
            <th scope="col" class="pr-0 px-3 py-3.5">Actions</th>
         </tr>
      </thead>

      <tbody class="text-sm divide-y divide-slate-200">
        @foreach ($users as $user)

         <tr>


                <td class="pl-0 px-3 py-4 font-medium text-slate-900 whitespace-nowrap">
                   <a href="{{ route('users.userProfile', $user->id) }}">{{ $user->name }}</a>
                </td>

            <td class="px-3 py-4 text-slate-500">
               {{ $user->email }}
            </td>
           <td class="px-3 py-4 text-slate-500">
    {{ $user->roles->isEmpty() ? 'Basic User' : $user->roles->pluck('name')->join(', ') }}
</td>

            
            <td class="pr-0 px-3 py-4 flex gap-3">
               <a href="{{ route('users.edit', $user) }}">
                   <button type="button"
                      class="text-sm text-blue-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded"
                      aria-label="Edit John Doe">
                      Edit
                   </button>
               </a>
               <form action={{ route('users.destroy', $user) }} method="POST" onsubmit="return confirm('Delete this role?')">
                    @csrf
                    @method('DELETE')
                   <button
                      class="text-sm text-red-700 cursor-pointer hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 rounded"
                      aria-label="Delete John Doe">
                      Delete
                   </button>
               </form>
            </td>

         </tr>
         @endforeach
      </tbody>
   </table>
         {{ $users->links() }}
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
