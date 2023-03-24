<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>       
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="block mb-8">
                <x-button-link href="{{ route('users.create') }}" class="">
                    {{ __('Add User') }}
                </x-button-link>
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
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
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
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gree-100 dark:bg-green-900 text-gray-800 dark:text-gray-400">
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
                                                <a href="{{ route('users.show', $user->id) }}" class="text-sky-500 dark:text-sky-400 hover:text-sky-900 mb-2 mr-2">View</a>
                                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 dark:text-blue-500 hover:text-blue-900 mb-2 mr-2">Edit</a>
                                                <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 cursor-pointer mb-2 mr-2" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="items-center px-4 py-3 bg-gray-50 dark:bg-gray-900 text-right mt-3 shadow sm:rounded-xl">
                                {{ $users->onEachSide(5)->links() }}  
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
