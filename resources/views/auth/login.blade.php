<x-guest-layout>
    
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex mt-4">
                <div class="flex-1 justify-start">
                    <label for="remember_me"">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex-2">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 dark:text-gray-400 hover:underline hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif 
                </div>              
            </div>

            <div class="flex items-center justify-end mt-5">
                <label for="dhaa" class="flex items-center">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Don’t have an account? ') }}</span>
                </label>   
            
                <a href="{{ route('register') }}" class="text-sm">
                    <span data-e2e="bottom-sign-up" class="ml-2 text-sm text-sky-500 dark:text-sky-400">
                        Sign up
                    </span>
                </a>

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
            
        </form>
    </x-authentication-card>
</x-guest-layout>
