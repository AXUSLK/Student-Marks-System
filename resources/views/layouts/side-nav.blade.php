<!-- Static sidebar for mobile -->
<div x-show="open" class="fixed inset-0 flex z-40 md:hidden"
    x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog" aria-modal="true">

    <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75"
        x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." @click="open = false"
        aria-hidden="true">
    </div>

    <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        x-description="Off-canvas menu, show/hide based on off-canvas menu state."
        class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-indigo-700">

        <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-description="Close button, show/hide based on off-canvas menu state."
            class="absolute top-0 right-0 -mr-12 pt-2">
            <button type="button"
                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                @click="open = false">
                <span class="sr-only">Close sidebar</span>
                <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/x"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="flex-shrink-0 flex items-center px-4">
            <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                alt="Student Management System">
        </div>

        <div class="mt-5 flex-1 h-0 overflow-y-auto">
            <nav class="px-2 space-y-1">

                <a href="#"
                    class="bg-indigo-800 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md"
                    x-state:on="Current" x-state:off="Default"
                    x-state-description="Current: &quot;bg-indigo-800 text-white&quot;, Default: &quot;text-indigo-100 hover:bg-indigo-600&quot;">
                    <svg class="mr-4 flex-shrink-0 h-6 w-6 text-indigo-300" x-description="Heroicon name: outline/home"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>
            </nav>
        </div>
    </div>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
</div>


<!-- Static sidebar for desktop -->
<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow pt-5 bg-indigo-700 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
            <img class=" w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-cyan-200.svg"
                alt="Student Management System">
        </div>

        <div class="mt-5 flex-1 flex flex-col">
            <nav class="flex-1 px-2 pb-4 space-y-1">
                <!-- DASHBOARD -->

                <a href="/dashboard"
                    class="hover:bg-gray-100 {{ request()->is('dashboard') ? 'bg-gray-100 text-gray-900' : 'hover:text-gray-900 text-indigo-100' }} flex items-center px-2 py-2 text-sm font-medium rounded-md"
                    x-state:on="Current" x-state:off="Default"
                    x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;text-indigo-100 hover:bg-gray-100&quot;">

                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                        class="mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z">
                        </path>
                    </svg>
                    Dashboard
                </a>

                <!-- SUBJECTS -->
                <div x-data="{{ request()->is('subjects*') ? '{open:true}' : '{open:false}' }}" class="space-y-1">
                    <button type="button"
                        class="hover:bg-gray-100 hover:text-gray-900 {{ request()->is('subjects*') ? 'bg-gray-100 text-black' : 'hover:text-gray-900 text-indigo-100' }} group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1" @click="open = !open"
                        aria-expanded="open" x-bind:aria-expanded="open.toString()"
                        x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;text-indigo-100 hover:bg-gray-100&quot;">
                        <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <span class="flex-1">
                            Subjects
                        </span>
                        <svg class="text-gray-50 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-500 transition-colors ease-in-out duration-150"
                            viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true"
                            :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                            <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <div x-description="Expandable link section, show/hide based on state." class="space-y-1"
                        :class="open ? 'd-block' : 'd-none'" id="sub-menu-1" x-show="open">
                        @if (Auth::check())
                            @if (Auth::user()->IsAdmin() || Auth::user()->IsTeacher())
                                <a href="{{ route('subjects.create') }}"
                                    class="{{ request()->is('subjects/create') ? 'bg-indigo-300 text-gray-900' : 'hover:text-gray-900 text-indigo-100' }} group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md hover:text-gray-900 hover:bg-indigo-400">
                                    Add a subjects
                                </a>
                            @endif
                            @if (Auth::user()->IsStudent())
                                <a href="{{ route('get.attach.subjects', Auth::user()) }}"
                                    class="{{ request()->is('subjects/create') ? 'bg-indigo-300 text-gray-900' : 'hover:text-gray-900 text-indigo-100' }} group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md hover:text-gray-900 hover:bg-indigo-400">
                                    Add a subjects
                                </a>
                            @endif
                        @endif
                        <a href="{{ route('subjects.index') }}"
                            class="{{ request()->is('subjects') ? 'bg-indigo-300 text-gray-900' : 'hover:text-gray-900 text-indigo-100' }} group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md hover:text-gray-900 hover:bg-indigo-400">
                            Manage subjects
                        </a>
                    </div>
                </div>

                <!-- STUDENTS -->
                @if (Auth::check())
                    @if (Auth::user()->IsAdmin() || Auth::user()->IsTeacher())
                        <div x-data="{{ request()->is('students*') ? '{open:true}' : '{open:false}' }}" class="space-y-1">
                            <button type="button"
                                class="hover:bg-gray-100 hover:text-gray-900 {{ request()->is('students*') ? 'bg-gray-100 text-black' : 'hover:text-gray-900 text-indigo-100' }} group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1"
                                @click="open = !open" aria-expanded="open" x-bind:aria-expanded="open.toString()"
                                x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;text-indigo-100 hover:bg-gray-100&quot;">
                                <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                                <span class="flex-1">
                                    Students
                                </span>
                                <svg class="text-gray-50 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-500 transition-colors ease-in-out duration-150"
                                    viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed"
                                    aria-hidden="true"
                                    :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                                </svg>
                            </button>
                            <div x-description="Expandable link section, show/hide based on state." class="space-y-1"
                                :class="open ? 'd-block' : 'd-none'" id="sub-menu-1" x-show="open">
                                <a href="{{ route('students.index') }}"
                                    class="{{ request()->is('students') ? 'bg-indigo-300 text-gray-900' : 'hover:text-gray-900 text-indigo-100' }} group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md hover:text-gray-900 hover:bg-indigo-400">
                                    Manage students
                                </a>
                            </div>
                        </div>
                    @endif
                @endif

                <!-- USERS -->
                @if (Auth::check() && Auth::user()->IsAdmin())
                    <div x-data="{{ request()->is('users*') ? '{open:true}' : '{open:false}' }}" class="space-y-1">
                        <button type="button"
                            class="hover:bg-gray-100 hover:text-gray-900 {{ request()->is('users*') ? 'bg-gray-100 text-black' : 'hover:text-gray-900 text-indigo-100' }} group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            x-state:on="Current" x-state:off="Default" aria-controls="sub-menu-1"
                            @click="open = !open" aria-expanded="open" x-bind:aria-expanded="open.toString()"
                            x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;text-indigo-100 hover:bg-gray-100&quot;">
                            <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <span class="flex-1">
                                Users
                            </span>
                            <svg class="text-gray-50 ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-500 transition-colors ease-in-out duration-150"
                                viewBox="0 0 20 20" x-state:on="Expanded" x-state:off="Collapsed" aria-hidden="true"
                                :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }">
                                <path d="M6 6L14 10L6 14V6Z" fill="currentColor"></path>
                            </svg>
                        </button>
                        <div x-description="Expandable link section, show/hide based on state." class="space-y-1"
                            :class="open ? 'd-block' : 'd-none'" id="sub-menu-1" x-show="open">
                            <a href="{{ route('users.index') }}"
                                class="{{ request()->is('users') ? 'bg-indigo-300 text-gray-900' : 'hover:text-gray-900 text-indigo-100' }} group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium rounded-md hover:text-gray-900 hover:bg-indigo-400">
                                Manage users
                            </a>
                        </div>
                    </div>
                @endif
            </nav>
        </div>
        <!-- User Name and Role  -->
        <span class="p-4 text-gray-200">
            @if (Auth::check())
                {{ Auth::user()->name }} - {{ Auth::user()->roles->pluck('name')[0] ?? '' }}
            @endif
        </span>
    </div>
</div>
