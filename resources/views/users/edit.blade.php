<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}     {{ $user->name }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mx-5 md:col-span-2">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden rounded-xl sm:rounded-xl">
                    <div class="p-5  bg-white dark:bg-gray-800">
                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="title" value="{{ __('Tittle') }}" />
                            <x-input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('name', $user->name) }}" />
                            <x-input-error for="title" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">                    
                            <x-label for="title" value="{{ __('Email') }}" />
                                <x-input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('email', $user->email) }}" />
                                    <x-input-error for="email" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">                    
                            <x-label for="title" value="{{ __('Password') }}" />
                            <x-input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            <x-input-error for="password" class="mt-1" />
                        </div>
                        <div class="px-2 py-3 sm:px-5 sm:py-3">                    
                            <x-label for="title" value="{{ __('Role') }}" />
                            <x-select name="roles[]" id="roles" class="form-multiselect mt-1 block w-full">
                                <option value="" selected disabled>Select a role</option>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"{{ in_array($id, old('roles', $user->roles->pluck('id')->toArray())) ? ' selected' : '' }}>
                                        {{ $role }}
                                    </option>
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
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>