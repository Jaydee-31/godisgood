<x-app-layout>
    @section('title')
        Home
    @endsection
    <x-slot name="header">
        <div class="sm:flex sm:flex-none sm:justify-center lg:justify-end md:w-full">
            <form class="flex" action="{{ route('homepage') }}" method="GET">  
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
    </x-slot>

    <div class="pb-12 pt-10"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-8">
                @foreach ($blogs as $blog)
                    <div>
                        <div class="max-w-md mx-auto h-full bg-white border border-gray-200 rounded-lg shadow-xl dark:bg-gray-800 dark:border-gray-700 overflow-hidden motion-safe:hover:scale-[1.03] transition-all duration-400">
                            <div class="">
                                <a href="#">
                                    <img class="rounded-t-lg object-cover md:max-h-32 h-auto md:w-full w-full" src="\storage\blog-photos\{{$blog->image}}"  alt="" />
                                </a>
                            </div>

                            <div class="p-5 flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="\storage\{{ $blog->author->profile_photo_path }}" alt="{{ $blog->author->name }}">
                                <div class="text-sm">
                                    <p class="text-gray-900 dark:text-gray-100 leading-none">{{ $blog->author->name }}</p>
                                    <p class="text-gray-600 dark:text-gray-400"> {{date('M d, Y', strtotime($blog->created_at->toDateString()))}}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="px-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $blog->title }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 leading-relaxed line-clamp-3">{{ $blog->content }}</p>
                                
                            </div>
                            <div class="px-5 pb-5 ">
                                <a href="{{ route('blogs.show', $blog->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-sky-700 rounded-lg hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                                Read more
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
