<x-app-layout>
    @section('title')
        User Management
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>       
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mb-8 px-5 sm:px-0 ">
                <div>
                    <x-button-link href="{{ route('users.create') }}" class="">
                        {{ __('Add User') }}
                    </x-button-link>
                </div>
                
                <div>
                    <form class="flex" action="{{ route('users.index') }}" method="GET">  
                        <label for="search-input" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" name="search" id="search-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500" placeholder="Search">
                        </div>
                        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-sky-700 rounded-lg border border-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>

                </div>
                
            </div>

            @if ($message = Session::get('success'))
                <x-alert-success class="bg-green-100 border border-green-400 text-green-700">
                    {{ $message }}
                </x-alert-success>
            @endif
            
            @if ($message = Session::get('destroyed'))
                <x-alert-delete class="bg-orange-100 border border-orange-400 text-orange-700">
                 {{ $message }}
                </x-alert-delete>
            @endif

            @if($users->isEmpty())
                <x-alert-empty class="bg-gray-100 border border-gray-400 text-gray-700">
                    No Users found.
                </x-alert-empty>
            @else
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-900 sm:rounded-xl">
                            
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 w-full">
                                <thead class="bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-300 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Date Added
                                        </th>
                                        <th scope="col" class="px-6 py-3  text-left text-xs font-medium uppercase tracking-wider">
                                            Roles
                                        </th>
                                        <th scope="col" class="px-6 py-3  text-left text-xs font-medium uppercase tracking-wider">
                                        
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 dark:bg-opacity-50 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                {{ $user->id }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                {{ $user->name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                {{ $user->email }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                {{ $user->created_at->format('Y-m-d') }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                @foreach ($user->roles as $role)
                                                    @if ($user->id == auth()->id())
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-sky-200 dark:bg-green-900 text-gray-800 dark:text-gray-400">
                                                        Myself - {{ $role->title }} 
                                                    </span>
                                                    @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-gray-900 text-gray-800 dark:text-gray-400">
                                                        {{ $role->title }}                                                    
                                                    </span>                
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @if ($user->id != auth()->user()->id)
                                                <a href="{{ route('users.show', $user->id) }}" class="text-sky-500 dark:text-sky-400 hover:text-sky-900 mb-2 mr-2">View</a>
                                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 dark:text-blue-500 hover:text-blue-900 mb-2 mr-2">Edit</a>
                                                <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 cursor-pointer mb-2 mr-2" value="Delete">
                                                </form>
                                                @else
                                                <a href="{{ route('users.show', $user->id) }}" class="text-sky-500 dark:text-sky-400 hover:text-sky-900 mb-2 mr-2">View</a>
                                                @endif
                                                
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($users->total() > 5)
                                <div class="items-center px-4 py-3 bg-gray-50 dark:bg-gray-900 text-right mt-3 shadow sm:rounded-xl">
                                    {{ $users->onEachSide(5)->links() }}  
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
