<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task List') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="block mb-8">
                    <x-button-link href="{{ route('tasks.create') }}" class="">
                        {{ __('Add Task') }}
                    </x-button-link>
                </div>

                @if ($message = Session::get('success'))
                    <x-alert-success class="bg-green-100 border dark:bg-gray-800 border-green-400 dark:border-green-800 text-green-700  dark:text-green-400 duration">
                        <strong class="font-bold">Success!</strong>
                        {{ $message }}
                    </x-alert-success>
                @endif
                
                @if ($message = Session::get('destroyed'))
                    <x-alert-delete x-data="{open:true}" x-show="open" class="bg-orange-100 border dark:bg-gray-800 border-orange-400 dark:border-orange-800 text-orange-700  dark:text-orange-400">
                        <strong class="font-bold">Success!</strong>
                        {{ $message }}
                    </x-alert-delete>
                @endif

                @if($tasks->isEmpty())
                    <x-alert-empty class="bg-gray-50 border dark:bg-gray-800 border-gray-400 dark:border-gray-500 text-gray-700  dark:text-gray-400">
                        No Tasks found.
                    </x-alert-empty>
                @else
                <div class="flex flex-col bg-white dark:bg-gray-800">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-xl">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $task->id }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $task->description }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                                @can('user_access')
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                                @endcan
                                                <form class="inline-block" action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        
        </div>
    </div>
</x-app-layout>
