<x-app-layout>
    @section('title')
        Edit role
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }} {{ $role->name }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mx-5 md:col-span-2">
            <form method="post" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden rounded-xl sm:rounded-xl">
                    <div class="p-5  bg-white dark:bg-gray-800 dark:bg-opacity-50">

                        <div class="px-2 py-3 sm:px-5 sm:py-3">                    
                            <x-label for="title" value="{{ __('Title') }}" />
                                <x-input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('title', $role->title) }}" />
                                    <x-input-error for="title" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">                    
                            <x-label for="title" value="{{ __('Role') }}" />
                            <div class="flex items-center mb-4 mt-4">
                                <input id="default-radio-1" type="radio" value="" name="default-radio" class="select-all w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1" class="ml-2 mr-4 font-medium text-xs text-gray-700 dark:text-gray-300">Select All</label>
                                <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="deselect-all w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ml-2 font-medium text-xs text-gray-700 dark:text-gray-300">Deselect All</label>
                            </div>
                            <x-select2 class="mt-1 block w-full" name="permissions[]" id="permissions">
                                @foreach($permissions as $id => $permissions)
                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>
                                    {{ $permissions }}
                                </option>
                            @endforeach
                            </x-select2>
                            <x-input-error for="roles" class="mt-1" />
                        </div>
                    </div> 

                    <div class="flex items-center sm:justify-end justify-center px-10 py-5 bg-gray-50 dark:bg-gray-800 text-right ">
                        <a href="{{ route('roles.index') }}" class="text-sm">
                            <span data-e2e="bottom-sign-up" class="ml-2 text-sm text-sky-500 dark:text-sky-400">
                                Cancel
                            </span>
                        </a>
                        <x-button class="ml-5">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>