<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <img src="img/user.png" alt="" width="400px" class="mx-auto py-12">
                <div class="mx-24 mb-6 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <h1 class="text-lg text-center text-gray-400">username:</h1>
                    <h1 class="text-xl text-center text-gray-200 font-semibold border border-gray-400 p-2 mx-4 mb-8 rounded-lg">
                        {{ $user->username }}
                    </h1>
                    <h1 class="text-lg text-center text-gray-400">name:</h1>
                    <h1 class="text-xl text-center text-gray-200 font-semibold border border-gray-400 p-2 mx-4 mb-8 rounded-lg">
                        {{ $user->name }}
                    </h1>
                    <h1 class="text-lg text-center text-gray-400">email:</h1>
                    <h1 class="text-xl text-center text-gray-200 font-semibold border border-gray-400 p-2 mx-4 mb-8 rounded-lg">
                        {{ $user->email }}
                    </h1>
                </div>
                <div class="flex justify-center space-x-4 mb-12">
                    <x-primary-button onclick="window.location.href='{{ route('profile.edit') }}'">
                        {{ __('Pengaturan') }}
                    </x-primary-button>                    

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-secondary-button :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
