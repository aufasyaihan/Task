<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('task.index') }}">
                        <img src="{{ asset('/src') }}/check.png " width="40">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                    <x-nav-link :href="url('task')" :active="request()->routeIs('task.index')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                    <x-nav-link :href="url('task/completed')" :active="request()->Is('task/completed')">
                        {{ __('Completed Task') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-5 sm:flex">
                    <x-nav-link :href="url('task/incompleted')" :active="request()->Is('task/incompleted')">
                        {{ __('Incompleted Task') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
