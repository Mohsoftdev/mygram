<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home_page') }}">
                        <x-application-logo class="block h-12 w-auto fill-current text-gray-800" />
                    </a>
                </div>


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex items-center md:ml-6 justify-center">
                @auth
                <div class="md:flex md:flex-row justify-center space-x-3 items-center">
                    <a href="{{route('home_page')}}">
                        {!! url()->current() == route('home_page') ?
                          '<i class="bx bxs-home-alt-2 text-2xl"></i>'
                         :'<i class="bx bx-home-alt-2 text-2xl"></i>'
                        !!}
                    </a>
                    <a href="{{route('explore')}}">
                        {!! url()->current() == route('explore') ?
                          '<i class="bx bxs-compass text-2xl"></i>'
                         :'<i class="bx bx-compass text-2xl"></i>'
                        !!}
                    </a>
                    <button onclick="Livewire.dispatch('openModal', {component: 'create-post-modal'})">
                            <i class="bx bx-message-square-add text-[1.6rem]"></i>
                    </button>
                    <div class="hidden md:block">
                            <x-dropdown width="96">
                                <x-slot name="trigger">
                                    <button class="text-[1.6rem] me-2">
                                        <div class=" position-relative">
                                            <i class="bx bxs-inbox"></i>
                                            <livewire:pending-followers-count />
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <livewire:pending-followers-list />
                                </x-slot>
                            </x-dropdown>
                    </div>
                </div>
                @endauth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <a href="{{auth()->user()->username}}">
                                <img src="{{str(auth()->user()->image)->startsWith('http') ? auth()->user()->image : asset('/storage/' . auth()->user()->image)}}" class="h-10 w-10 rounded-full">
                            </a>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="text-red-600"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
