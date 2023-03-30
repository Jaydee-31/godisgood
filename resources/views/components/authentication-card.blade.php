<div class="min-h-screen flex flex-col justify-center sm:justify-center items-center  bg-gray-100 dark:bg-gray-900">
    <div>
        {{ $logo }}
    </div>

    <div class="sm:w-96 w-96 sm:px-8 px-8 py-8 sm:py-8 mt-6  bg-white dark:bg-gray-800 dark:bg-opacity-50 shadow-md overflow-hidden rounded-xl sm:rounded-xl">
        {{ $slot }}
    </div>
</div>
