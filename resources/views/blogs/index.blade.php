<x-app-layout>
    @section('title')
    List
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="block mb-8">
                    <x-button-link href="{{ route('blogs.create') }}" class="">
                        {{ __('Create a Blog') }}
                    </x-button-link>                    
                </div>
                
                @if ($message = Session::get('success'))
                    <x-alert-success>
                        {{ $message }}
                    </x-alert-success>
                @endif

                @if ($message = Session::get('destroyed'))
                    <x-alert-delete>
                        {{ $message }}
                    </x-alert-delete>
                @endif

                @if($blogs->isEmpty())
                <x-alert-empty class="bg-gray-50 border dark:bg-gray-800 border-gray-400 dark:border-gray-500 text-gray-700  dark:text-gray-400">
                    No Blogs found.
                </x-alert-empty>
                @else  
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-900 sm:rounded-xl">
                                
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 w-full">
                                        <thead class="bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-300 ">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Image
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Title
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Content
                                                </th>
                                                
                                                @can('admin_access')
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                        Author
                                                    </th>
                                                @endcan
                                               

                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    
                                                </th>
                                            </tr>
                                        </thead>
                    
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">                           
                                            @foreach ($blogs as $blog)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    {{ $blog->id }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    <img src="storage\blog-photos\{{$blog->image}}" class="w-16 rounded-lg">
                                                </td>
                    
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                    {{ $blog->title }}
                                                </td>
                    
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white max-w-xs overflow-ellipsis truncate">
                                                    {{ $blog->content }}
                                                </td>

                                                @can('admin_access')
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                        {{ $blog->author->name }}
                                                        {{-- {{ Auth::blog()->name }} --}}
                                                    </td>
                                                @endcan
                                               
                    
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="{{ route('blogs.show', $blog->id) }}" class="text-sky-500 dark:text-sky-400 hover:text-sky-900 mb-2 mr-2">View</a>
                                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="text-blue-600 dark:text-blue-500 hover:text-blue-900 mb-2 mr-2">Edit</a>
                                                    <form class="inline-block" action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 cursor-pointer mb-2 mr-2" value="Delete">
                                                    </form>
                                                </td>
                                            </tr>                                        
                                            @endforeach
                                        </tbody>
                                    </table> 
                    
                                </div>
                                <div class="items-center px-4 py-3 bg-gray-50 dark:bg-gray-900 text-right mt-3 shadow sm:rounded-xl">
                                    {{ $blogs->onEachSide(5)->links() }}  
                                </div>
                            
                            </div>
                        
                        </div>
                    </div>
                @endif
        </div>
    </div>
</x-app-layout>
