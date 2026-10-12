<nav x-data="{ open: false }" class="bg-slate-900 border-b border-slate-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('jobs.index') }}" class="flex items-center gap-2 font-black text-2xl tracking-tight text-white">
                        <span class="bg-gradient-to-r from-indigo-500 to-cyan-400 bg-clip-text text-transparent">JobPortal</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-4">
                    <a href="{{ route('jobs.index') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('jobs.index') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-500/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        Explore Jobs
                    </a>

                    @auth
                        @if (Auth::user()->isEmployer())
                            <a href="{{ route('jobs.my-jobs') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('jobs.my-jobs') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-500/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                                Manage Jobs
                            </a>
                            <a href="{{ route('jobs.create') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold bg-indigo-600 hover:bg-indigo-500 text-white shadow-md shadow-indigo-600/30 transition flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Post a Job
                            </a>
                        @elseif(Auth::user()->isSeeker())
                            <a href="{{ route('applications.my') }}" class="px-3 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('applications.my') ? 'bg-indigo-600/20 text-indigo-400 border border-indigo-500/30' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                                My Applications
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown / Guest Links -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-slate-700 text-sm font-medium rounded-lg text-slate-200 bg-slate-800 hover:bg-slate-700 hover:text-white focus:outline-none transition">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2"></span>
                                <div>{{ Auth::user()->name }} <span class="text-xs text-indigo-400 uppercase tracking-wider ml-1 font-bold">({{ Auth::user()->role }})</span></div>
                                <svg class="ms-2 fill-current h-4 w-4 opacity-70" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-slate-700 dark:text-slate-300">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="text-red-500 hover:text-red-600" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-300 hover:text-white transition">Log in</a>
                        <a href="{{ route('register') }}" class="px-3.5 py-1.5 rounded-lg text-sm font-semibold bg-indigo-600 hover:bg-indigo-500 text-white shadow transition">Get Started</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger Button for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-slate-400 hover:text-white hover:bg-slate-800">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>