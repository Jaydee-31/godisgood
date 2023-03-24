{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8"> --}}
<x-app-layout>
    @section('title')
        Dashboard
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
    

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">

                @foreach ($blogs as $blog)
                    <a href="{{ route('blogs.show', $blog->id) }}" class="scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-xl shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="bg-white border border-gray-200 rounded-xl shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="rounded-t-lg">
                                <img class="rounded-t-lg object-none h-32 w-96" src="https://source.unsplash.com/random/480x360" alt="" />
                            </div>
                            <div class="p-6">
                                <h2 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white">{{ $blog['title'] }}</h2>
                                <h3 class="mt-2 text-xs font-medium text-gray-500 dark:text-white">
                                    {{ $blog->author->name }}
                                </h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed line-clamp-3">{{ $blog['content'] }}</p>
                            </div>
                            <div class="flex items-center justify-center pb-6">
                                <p class="text-gray-500 dark:text-gray-400 text-sm italic leading-relaxed">
                                    Read More
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="stroke-red-500 w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                                
                            </div>
                        </div>
                    </a>
                
                @endforeach

                @foreach ($blogs as $blog)
                <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-xl shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <div class="h-10 w-10 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-4 h-4 stroke-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>

                        <h2 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">{{ $blog['title'] }}</h2>
                        <h3 class="mt-2 text-base font-medium text-gray-500 dark:text-white">
                            Written by {{ $blog->author->name }}
                        </h3>
                        <h4 class="mt-1 text-base text-gray-400 dark:text-white">
                            {{-- {{ $blog['created_at'] }}  --}}
                            {{date('F d, Y', strtotime($blog->created_at->toDateString()))}}
                        </h4>
                        
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed line-clamp-3">
                            {{ $blog['content'] }}
                        </p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </a>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
