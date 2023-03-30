<x-app-layout>
    @section('title')
    Edit Blog
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Blog Post') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mx-5 md:col-span-2">
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden rounded-xl sm:rounded-xl">
                    <div class="p-5  bg-white dark:bg-gray-800 dark:bg-opacity-50">
                        {{-- @if ($blog->image)
                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <img src="/storage/blog-photos/{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full">
                        </div>
                        @endif --}}
                        {{-- <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <div class="flex items-center justify-center w-full">
                                <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload blog cover</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="image" type="file" name="image" class="hidden" />
                                </label>
                            </div> 
                            <x-input-error for="image" class="mt-1" />
                        </div> --}}
                     
                        {{-- <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="image" value="{{ __('Blog Cover') }}" />
                            <x-input id="image" class="block mt-1 w-full h-8" type="file" name="image"
                                    value="{{ old('image',  $blog->image) }}" />
                            <x-input-error for="image" class="mt-1" />
                            <img src="/storage/blog-photos/{{ $blog->image }}" class="w-16 rounded-lg m-3">
                            
                        </div> --}}

                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="image" value="{{ __('Cover') }}" />
                            <x-input type="file" name="image" id="image" class="mt-1 block w-full text-lg text-gray-900 border border-gray-300 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size"
                                   value="{{ old('image',  $blog->image) }}" />
                            <x-input-error for="image" class="mt-1" />
                        </div>


                        
                        <div class="px-2 py-3 sm:px-5 sm:py-3">
                            <x-label for="title" value="{{ __('Tittle') }}" />
                            <x-input type="text" name="title" id="title" class="mt-1 block w-full"
                                   value="{{ old('title',  $blog->title) }}" />
                            <x-input-error for="title" class="mt-1" />
                        </div>

                        <div class="px-2 py-3 sm:px-5 sm:py-3">                    
                            <x-label for="content" value="{{ __('Content') }}" />
                            <x-textarea name="content" id="content" class="mt-1 block w-full" rows="5">{{ old('content', $blog->content) }}</x-textarea>
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
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>