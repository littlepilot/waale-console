<div x-data="{isOpenSidebar: false}">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div class="relative z-50 xl:hidden" role="dialog" aria-modal="true">
        <div
            x-show="isOpenSidebar"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900/80"
            aria-hidden="true"
        ></div>

        <div x-show="isOpenSidebar" class="fixed inset-0 flex">
            <div
                x-show="isOpenSidebar"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                class="relative mr-16 flex w-full max-w-xs flex-1"
            >
                <div x-show="isOpenSidebar" class="absolute left-full top-0 flex w-16 justify-center pt-5">
                    <button type="button" @click="isOpenSidebar = false" class="-m-2.5 p-2.5">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div
                    x-show="isOpenSidebar"
                    x-transition:enter="ease-in-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in-out duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 ring-1 ring-white/10"
                >
                    <livewire:sidebar />
                </div>
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden xl:fixed xl:inset-y-0 xl:z-50 xl:flex xl:w-72 xl:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-black/10 px-6 ring-1 ring-white/5">
            <livewire:sidebar />
        </div>
    </div>

    <div class="xl:pl-72">
        <!-- Sticky search header -->
        <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-6 border-b border-white/5 bg-gray-900 px-4 shadow-sm sm:px-6 lg:px-8">
            <button @click="isOpenSidebar = true" type="button" class="-m-2.5 p-2.5 text-white xl:hidden">
                <span class="sr-only">Open sidebar</span>
                <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
            </button>

            <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                <form class="grid flex-1 grid-cols-1" action="#" method="GET">
                    <input type="search" name="search" aria-label="Search" class="col-start-1 row-start-1 block size-full bg-transparent pl-8 text-base text-white outline-none placeholder:text-gray-500 sm:text-sm/6" placeholder="Search">
                    <svg class="pointer-events-none col-start-1 row-start-1 size-5 self-center text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z" clip-rule="evenodd" />
                    </svg>
                </form>
            </div>
        </div>

        <main class="lg:pr-96">
            <header class="flex items-center justify-between border-b border-white/5 px-4 py-4 sm:px-6 sm:py-6 lg:px-8">
                <h1 class="text-base/7 font-semibold text-white">Deployments</h1>

                <!-- Sort dropdown -->
                <div class="relative" x-data="{isOpen: false}" @click.outside="isOpen = false">
                    <button @click="isOpen = !isOpen" type="button" class="flex items-center gap-x-1 text-sm/6 font-medium text-white" id="sort-menu-button" aria-expanded="false" aria-haspopup="true">
                        Sort by
                        <svg class="size-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div
                        x-show="isOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2.5 w-40 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="sort-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-50 outline-none", Not Active: "" -->
                        <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="sort-menu-item-0">Name</a>
                        <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="sort-menu-item-1">Date updated</a>
                        <a href="#" class="block px-3 py-1 text-sm/6 text-gray-900" role="menuitem" tabindex="-1" id="sort-menu-item-2">Environment</a>
                    </div>
                </div>
            </header>

            <!-- Deployment list -->
            <ul role="list" class="divide-y divide-white/5">
                <li class="relative flex items-center space-x-4 px-4 py-4 sm:px-6 lg:px-8">
                    <div class="min-w-0 flex-auto">
                        <div class="flex items-center gap-x-3">
                            <div class="flex-none rounded-full bg-gray-100/10 p-1 text-gray-500">
                                <div class="size-2 rounded-full bg-current"></div>
                            </div>
                            <h2 class="min-w-0 text-sm/6 font-semibold text-white">
                                <a href="#" class="flex gap-x-2">
                                    <span class="truncate">Planetaria</span>
                                    <span class="text-gray-400">/</span>
                                    <span class="whitespace-nowrap">ios-app</span>
                                    <span class="absolute inset-0"></span>
                                </a>
                            </h2>
                        </div>
                        <div class="mt-3 flex items-center gap-x-2.5 text-xs/5 text-gray-400">
                            <p class="truncate">Deploys from GitHub</p>
                            <svg viewBox="0 0 2 2" class="size-0.5 flex-none fill-gray-300">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <p class="whitespace-nowrap">Initiated 1m 32s ago</p>
                        </div>
                    </div>
                    <div class="flex-none rounded-full bg-gray-400/10 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-gray-400/20">Preview</div>
                    <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </li>

                <!-- More deployments... -->
            </ul>
        </main>

        <!-- Activity feed -->
        <aside class="bg-black/10 lg:fixed lg:bottom-0 lg:right-0 lg:top-16 lg:w-96 lg:overflow-y-auto lg:border-l lg:border-white/5">
            <header class="flex items-center justify-between border-b border-white/5 px-4 py-4 sm:px-6 sm:py-6 lg:px-8">
                <h2 class="text-base/7 font-semibold text-white">Activity feed</h2>
                <a href="#" class="text-sm/6 font-semibold text-indigo-400">View all</a>
            </header>
            <ul role="list" class="divide-y divide-white/5">
                <li class="px-4 py-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-x-3">
                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-6 flex-none rounded-full bg-gray-800">
                        <h3 class="flex-auto truncate text-sm/6 font-semibold text-white">Michael Foster</h3>
                        <time datetime="2023-01-23T11:00" class="flex-none text-xs text-gray-600">1h</time>
                    </div>
                    <p class="mt-3 truncate text-sm text-gray-500">Pushed to <span class="text-gray-400">ios-app</span> (<span class="font-mono text-gray-400">2d89f0c8</span> on <span class="text-gray-400">main</span>)</p>
                </li>

                <!-- More items... -->
            </ul>
        </aside>
    </div>
</div>
