<x-app-layout>
    @section('title')
        Add User
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New User') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mx-5 md:col-span-2">
            <form method="post" action="{{ route('users.store') }}">
                @csrf
                <div class="shadow overflow-hidden rounded-xl sm:rounded-xl">
                    <div class="p-5  bg-white dark:bg-gray-800 dark:bg-opacity-50">
                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus/>
                            <x-input-error for="name" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
                            <x-input-error for="email" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" />
                            <x-input-error for="password" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="roles" value="{{ __('Roles') }}" />
                            <x-select name="roles[]" id="roles" class="form-multiselect mt-1 block w-full">
                                <option value="" selected disabled>Select a role</option>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"{{ in_array($id, old('roles', [])) ? ' selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error for="roles" class="mt-1" />
                        </div>
                    </div>
                    
                    <div class="flex items-center sm:justify-end justify-center px-10 py-5 bg-gray-50 dark:bg-gray-800 text-right ">
                        <a href="{{ route('users.index') }}" class="text-sm">
                            <span data-e2e="bottom-sign-up" class="ml-2 text-sm text-sky-500 dark:text-sky-400">
                                Cancel
                            </span>
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