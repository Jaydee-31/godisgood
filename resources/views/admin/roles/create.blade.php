<x-app-layout>
    @section('title')
        Add Role
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Role') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mx-5 md:col-span-2">
            <form method="post" action="{{ route('roles.store') }}">
                @csrf
                <div class="shadow overflow-hidden rounded-xl sm:rounded-xl">
                    <div class="p-5  bg-white dark:bg-gray-800 dark:bg-opacity-50">
                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="title" value="{{ __('Title') }}" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus/>
                            <x-input-error for="title" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="permissions" value="{{ __('Permissions') }}" />
                            <div class="flex items-center mb-4 mt-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio" class="select-all w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1" class="ml-2 mr-4 font-medium text-xs text-gray-700 dark:text-gray-300">Select All</label>
                                <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="deselect-all w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ml-2 font-medium text-xs text-gray-700 dark:text-gray-300">Deselect All</label>
                            </div>
                            <x-select2 class="mt-1 block w-full" name="permissions[]" id="permissions">
                                @foreach($permissions as $id => $permissions)
                                    <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                                @endforeach
                            </x-select2>
                            <x-input-error for="permissions" class="mt-1" />
                        </div>
                    </div>
                    
                    <div class="flex items-center sm:justify-end justify-center px-10 py-5 bg-gray-50 dark:bg-gray-800 text-right ">
                        <a href="{{ route('roles.index') }}" class="text-sm">
                            <x-span data-e2e="bottom-sign-up" class="ml-2 text-sm">
                                Cancel
                            </x-span>
                        </a>
        
                        <x-button class="ml-5">
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 
</x-app-layout>