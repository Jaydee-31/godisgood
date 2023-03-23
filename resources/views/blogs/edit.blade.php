<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mx-5 md:col-span-2">
            <form method="post" action="{{ route('blogs.update', $blog->id) }}">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden rounded-xl sm:rounded-xl">
                    <div class="p-5  bg-white dark:bg-gray-800">
                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="title" value="{{ __('Tittle') }}" />
                            <x-input type="text" name="title" id="title" class="mt-1 block w-full"
                                   value="{{ old('title',  $blog->title) }}" />
                            <x-input-error for="title" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">                    
                            <x-label for="content" value="{{ __('Content') }}" />
                            <textarea name="content" id="content" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">{{ old('content', $blog->content) }}</textarea>
                            <x-input-error for="content" class="mt-1" />
                        </div>
                    </div> 

                    <div class="flex items-center sm:justify-end justify-center px-10 py-5 bg-gray-50 dark:bg-gray-800 text-right ">
                        <a href="{{ route('blogs.index') }}" class="text-sm">
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