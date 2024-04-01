<x-app-layout>

    @section('title')
        {{ $user->name }}
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <x-button-link href="{{ route('users.index') }}" class="">
                    {{ __('Back to list') }}
                </x-button-link>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow-lg overflow-hidden border-b border-gray-200 dark:border-gray-900 sm:rounded-xl">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-900 w-full">
                                <tr class="border-b dark:border-gray-800">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-50 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Profile Photo
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-slate-800 dark:bg-opacity-50 divide-y divide-gray-200 dark:divide-gray-900">
                                        <img src="\storage\{{ $user->profile_photo_path }}" class="w-16 h-16 rounded-full">
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-800">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Name & ID
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-slate-800 dark:bg-opacity-50 divide-y divide-gray-200 dark:divide-gray-900">
                                        {{ $user->name }} - {{ $user->id }}
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-800">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-slate-800 dark:bg-opacity-50 divide-y divide-gray-200 dark:divide-gray-900">
                                        {{ $user->email }}
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-800">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Email Verified At
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-slate-800 dark:bg-opacity-50 divide-y divide-gray-200 dark:divide-gray-900">
                                        {{ $user->email_verified_at }}
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-800">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Date Created
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-slate-800 dark:bg-opacity-50 divide-y divide-gray-200 dark:divide-gray-900">
                                        {{ $user->created_at }}
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-800">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Date Updated
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-slate-800 dark:bg-opacity-50 divide-y divide-gray-200 dark:divide-gray-900">
                                        {{ $user->updated_at }}
                                    </td>
                                </tr>
                                <tr class="border-b dark:border-gray-800">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-slate-800 dark:bg-opacity-50 divide-y divide-gray-200 dark:divide-gray-900">
                                        @foreach ($user->roles as $role)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-gray-900 text-gray-800 dark:text-gray-400">
                                                    {{ $role->title }}
                                                </span>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
