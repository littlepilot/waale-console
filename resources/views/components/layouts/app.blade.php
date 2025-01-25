<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-900">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="h-full">
        <div x-data="{isOpenSidebar: false}">
            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <livewire:sidebar-mobile />

            <!-- Static sidebar for desktop -->
            <livewire:sidebar-desktop />

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

                {{ $slot }}
            </div>
        </div>

        @vite('resources/js/app.js')
        @livewireScripts
    </body>
</html>

