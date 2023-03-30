<x-guest-layout>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
        <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="#" class="flex items-center">
                <img src="assets/image/logo-br.png" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">BlogRealm</span>
            </a>
            <div class="flex md:order-2">
                <div class="sm:right-0 text-right">
                    @auth
                        <a href="{{ url('/homepage') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white mr-2">Homepage</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</a>
    
                        @if (Route::has('register'))
                            <x-button-link href="{{ route('register') }}" class="ml-4 font-semibold capitalize">
                                {{ __('Register') }}
                            </x-button-link>
                            {{-- <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> --}}
                        @endif
                    @endauth
                </div>
              
            </div>
        
            </div>
        </nav>
            
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center align-middle">
                <div class="flex max-w-xs">
                    <img class="object-center" src="assets/image/logo-main.png" >
                </div>
                <div class="flex">
                    <h2>Uniting Voices, Empowering Ideas</h2>
                </div>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                    @foreach ($blogs as $blog)
                        <a href="{{ route('blogs.show', $blog->id) }}" class="flex flex-col items-center md:flex-row md:max-w-xl scale-100 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-xl shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div class="lg:flex">
                                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-l-xl text-center overflow-hidden" style="background-image: url('/storage/blog-photos/{{$blog->image}}')" title="">
                                </div>
                                <div class="rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                  <div class="mb-8">
                                    <p class="text-sm text-gray-600 flex items-center">
                                      <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                      </svg>
                                      Members only
                                    </p>
                                    <div class="text-gray-900 font-bold text-xl mb-2">{{$blog->title}}</div>
                                    <p class="text-gray-700 text-base leading-relaxed line-clamp-3">{{$blog->content}}</p>
                                  </div>
                                  <div class="flex items-center">
                                    <img class="w-10 h-10 rounded-full mr-4" src="\storage\{{ $blog->author->profile_photo_path }}" alt="{{ $blog->author->name }}">
                                    <div class="text-sm">
                                        <p class="text-gray-900 leading-none">{{ $blog->author->name }}</p>
                                        <p class="text-gray-600"> {{date('F d, Y', strtotime($blog->created_at->toDateString()))}}
                                        </p>
                                    </div>
                                  </div>
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

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>