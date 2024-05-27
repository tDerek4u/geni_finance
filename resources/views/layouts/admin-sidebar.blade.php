<nav class="fixed top-0 z-50 w-full bg-cyan-900 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-4 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">Flowbite</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('admin.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Settings</a>
                            </li>

                            </li>

                            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href=""
                                onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                                <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 rounded-xl left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.index') }}"
                    class="flex items-center  p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.index') ? ' bg-cyan-900 dark:bg-gray-600 text-white' : 'text-gray-500' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 24 24">
                        <path fill="black"
                            d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6zm2-10h4V5H5zm10 8h4v-6h-4zm0-12h4V5h-4zM5 19h4v-2H5zm4-2" />
                    </svg>
                    <span
                        class="ms-3  {{ request()->routeIs('admin.index') ? '  dark:bg-gray-600 text-white' : 'text-gray-500' }}">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.index') }}"
                    class="flex items-center  p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 24 24"><path fill="black" d="M6.5 11L12 2l5.5 9zm11 11q-1.875 0-3.187-1.312T13 17.5t1.313-3.187T17.5 13t3.188 1.313T22 17.5t-1.312 3.188T17.5 22M3 21.5v-8h8v8zM17.5 20q1.05 0 1.775-.725T20 17.5t-.725-1.775T17.5 15t-1.775.725T15 17.5t.725 1.775T17.5 20M5 19.5h4v-4H5zM10.05 9h3.9L12 5.85zm7.45 8.5"/></svg>
                    <span
                        class="ms-3 ">Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.index') }}"
                    class="flex items-center  p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 24 24"><path fill="black" d="M8 12h8v2H8zm2 8H6V4h7v5h5v3.1l2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h4zm-2-2h4.1l.9-.9V16H8zm12.2-5c.1 0 .3.1.4.2l1.3 1.3c.2.2.2.6 0 .8l-1 1l-2.1-2.1l1-1c.1-.1.2-.2.4-.2m0 3.9L14.1 23H12v-2.1l6.1-6.1z"/></svg>
                    <span
                        class="ms-3 ">Voucher</span>
                </a>
            </li>

        </ul> <hr> <br>
        <ul class="space-y-2 font-medium">

            <li>
                <a href="{{ route('admin.roles.index') }}"
                    class="flex items-center  p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.roles.index') ? ' bg-cyan-900 dark:bg-gray-600 text-white' : 'text-gray-500' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 32 32">
                        <path fill="black"
                            d="M16 5c-3.9 0-7 3.1-7 7a6.96 6.96 0 0 0 3.07 5.813C8.51 19.346 6 22.892 6 27h2c0-4.4 3.6-8 8-8c.341 0 .673-.032 1-.078V23.5c0 5.2 6.8 8.2 7.1 8.3l.4.2l.4-.2c.3-.1 7.1-3.1 7.1-8.3V18h-.9c-1.9 0-3-.7-3.9-1.2c-.9-.4-1.7-.8-2.7-.8c-1 0-1.8.4-2.5.8c-.506.282-1.114.622-1.88.87A6.956 6.956 0 0 0 23 12c0-3.9-3.1-7-7-7m0 2c2.8 0 5 2.2 5 5s-2.2 5-5 5s-5-2.2-5-5s2.2-5 5-5m8.5 11c.5 0 .9.2 1.7.6l.3.1c.8.4 1.9 1 3.5 1.2v3.5c0 3.3-4.3 5.7-5.5 6.3c-1.2-.6-5.5-3-5.5-6.3v-3.5c1.7-.2 2.8-.8 3.6-1.2l.3-.1h.2c.6-.5.9-.6 1.4-.6" />
                    </svg>
                    <span
                        class="ms-3  {{ request()->routeIs('admin.roles.index') ? '  dark:bg-gray-600 text-white' : 'text-gray-500' }}">Roles</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.permissions.index') }}"
                    class="flex items-center  p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group  {{ request()->routeIs('admin.permissions.index') ? ' bg-cyan-900 dark:bg-gray-600 text-white' : 'text-gray-500' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 2048 2048">
                        <path fill="black"
                            d="M2048 1573v475h-512v-256h-256v-256h-256v-207q-74 39-155 59t-165 20q-97 0-187-25t-168-71t-142-110t-111-143t-71-168T0 704q0-97 25-187t71-168t110-142T349 96t168-71T704 0q97 0 187 25t168 71t142 110t111 143t71 168t25 187q0 51-8 101t-23 98zm-128 54l-690-690q22-57 36-114t14-119q0-119-45-224t-124-183t-183-123t-224-46q-119 0-224 45T297 297T174 480t-46 224q0 119 45 224t124 183t183 123t224 46q97 0 190-33t169-95h89v256h256v256h256v256h256zM512 384q27 0 50 10t40 27t28 41t10 50q0 27-10 50t-27 40t-41 28t-50 10q-27 0-50-10t-40-27t-28-41t-10-50q0-27 10-50t27-40t41-28t50-10" />
                    </svg>
                    <span
                        class="ms-3  {{ request()->routeIs('admin.permissions.index') ? '  dark:bg-gray-600 text-white' : 'text-gray-500' }}">Permissions</span>
                </a>
            </li>

            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 24 24">
                    <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M6 6.5C4.159 8.148 3 10.334 3 13a9 9 0 1 0 18 0c0-2.666-1.159-4.852-3-6.5M12 2v9m0-9c-.7 0-2.008 1.994-2.5 2.5M12 2c.7 0 2.008 1.994 2.5 2.5"
                        color="black" />
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
            </a>
            </li>

        </ul>
    </div>
</aside>
