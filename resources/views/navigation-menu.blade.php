<nav x-data="{ open: false }" class="bg-gray-50 border-b border-gray-100">
    <!-- Search bar functions -->
    <div class="hidden" id="search-container">
        <div class="max-h-96 w-4/5 sm:w-1/2 m-auto rounded-md bg-gray-50 absolute inset-0 z-50">
            @livewire('post.search-post')
        </div>
        <div class="h-screen w-full bg-gray-900 bg-opacity-25 absolute inset-0 z-40" id="search-overlay">
        </div>
    </div>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <h6 class="font-black font-ibm">Yowndrift</h6>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 md:flex">
                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>
                    <x-jet-dropdown align="none" width="48">

                        <x-slot name="trigger">
                            <x-jet-nav-link class="mt-5">
                                Categories <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            </x-jet-nav-link>
                        </x-slot>

                        <x-slot name="content">
            
                                <form action="{{ route('posts.index') }}">
                                    <input type="hidden" value="technology" name="search">
                                    <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                        Technology
                                    </button>
                                </form>
                         
                                <form action="{{ route('posts.index') }}">
                                    <input type="hidden" value="health" name="search">
                                    <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                        Health
                                    </button>
                                </form>
                           
                                <form action="{{ route('posts.index') }}">
                                    <input type="hidden" value="science" name="search">
                                    <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                        Science
                                    </button>
                                </form>
                           
                                <form action="{{ route('posts.index') }}">
                                    <input type="hidden" value="society" name="search">
                                    <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                        Society
                                    </button>
                                </form>
                           
                        </x-slot>
                    </x-jet-dropdown>
                    <x-jet-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                        {{ __('Posts') }}
                    </x-jet-nav-link>
                    @auth
                        <x-jet-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                            {{ __('Write a post') }}
                        </x-jet-nav-link>  
                    @endauth
                    @guest
                        <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Write a post') }}
                        </x-jet-nav-link>
                    @endguest
                </div>
            </div>

            <div class="hidden md:flex sm:items-center sm:ml-6">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative flex items-center space-x-5">
                    <x-jet-nav-link class="cursor-pointer" id="search-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                          </svg>
                    </x-jet-nav-link>
                    @if (Route::has('login'))
                        @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                          </svg>
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
    
                                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
    
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>
                                
                                <x-jet-dropdown-link href="{{ route('users.index') }}">
                                    {{ __('Dashboard') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>
    
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif
    
                                <div class="border-t border-gray-100"></div>
    
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
    
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                        @else   
                            <x-jet-nav-link href="{{ route('login') }}">Log in</x-jet-nav-link>
                            @if (Route::has('register'))
                                <x-jet-nav-link href="{{ route('register') }}">Register</x-jet-nav-link>
                            @endif
                        @endauth
                    
                    @endif
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex justify-around items-center md:hidden">
                <x-jet-nav-link class="cursor-pointer" id="search-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                      </svg>
                </x-jet-nav-link>
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-jet-responsive-nav-link>
                <x-jet-dropdown align="none" width="screen">

                    <x-slot name="trigger">
                        <x-jet-responsive-nav-link class="flex flex-row">
                            Categories <svg class="ml-2 mt-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        </x-jet-responsive-nav-link>
                    </x-slot>

                    <x-slot name="content">
                        <form action="{{ route('posts.index') }}">
                            <input type="hidden" value="technology" name="search">
                            <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                Technology
                            </button>
                        </form>
                 
                        <form action="{{ route('posts.index') }}">
                            <input type="hidden" value="health" name="search">
                            <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                Health
                            </button>
                        </form>
                   
                        <form action="{{ route('posts.index') }}">
                            <input type="hidden" value="science" name="search">
                            <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                Science
                            </button>
                        </form>
                   
                        <form action="{{ route('posts.index') }}">
                            <input type="hidden" value="society" name="search">
                            <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                Society
                            </button>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
                <x-jet-responsive-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('Posts') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                    {{ __('Write a post') }}
                </x-jet-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->

                    <x-jet-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                        {{ __('Dashboard') }}
                     </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>
                </div>
            </div>
            @else
                <div class="pt-2 pb-3 space-y-1">
                    <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-dropdown align="none" width="screen">

                        <x-slot name="trigger">
                            <x-jet-responsive-nav-link class="flex flex-row">
                                Categories <svg class="ml-2 mt-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            </x-jet-responsive-nav-link>
                        </x-slot>

                        <x-slot name="content">
                            <form action="{{ route('posts.index') }}">
                                <input type="hidden" value="technology" name="search">
                                <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                    Technology
                                </button>
                            </form>
                     
                            <form action="{{ route('posts.index') }}">
                                <input type="hidden" value="health" name="search">
                                <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                    Health
                                </button>
                            </form>
                       
                            <form action="{{ route('posts.index') }}">
                                <input type="hidden" value="science" name="search">
                                <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                    Science
                                </button>
                            </form>
                       
                            <form action="{{ route('posts.index') }}">
                                <input type="hidden" value="society" name="search">
                                <button class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                    Society
                                </button>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                    <x-jet-responsive-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                        {{ __('Posts') }}
                    </x-jet-responsive-nav-link>
                   @auth
                        <x-jet-responsive-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                            {{ __('Write a post') }}
                        </x-jet-responsive-nav-link>    
                   @endauth
                   @guest
                        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Write a post') }}
                        </x-jet-responsive-nav-link>
                   @endguest
                    
                </div>

                <div class="border-t border-gray-200 space-y-1">
                    <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        {{ __('Log in') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-jet-responsive-nav-link>
                </div>
        @endauth
    </div>
</nav>