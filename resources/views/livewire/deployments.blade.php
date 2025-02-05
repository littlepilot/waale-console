<div wire:poll.1s>
    <main class="lg:pr-96">
        <header class="flex items-center justify-between border-b border-white/5 px-4 py-4 sm:px-6 sm:py-6 lg:px-8">
            <h1 class="text-base/7 font-semibold text-white">Deployments</h1>

            <!-- Sort dropdown -->
            <div class="relative" x-data="{isOpen: false}" @click.outside="isOpen = false">
                <button @click="isOpen = !isOpen" type="button" class="flex items-center gap-x-1 text-sm/6 font-medium text-white" id="sort-menu-button" aria-expanded="false" aria-haspopup="true">
                    {{ $selectedProject?->name ?? 'All projects' }}
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
                    <a href="{{ route('deployments') }}" class="block px-3 py-1 text-sm/6 text-gray-900 hover:bg-gray-50" role="menuitem" tabindex="-1" id="sort-menu-item-0">All projects</a>
                    @foreach($projects as $project)
                        <a href="{{ route('deployments', ['project' => $project]) }}" class="block px-3 py-1 text-sm/6 text-gray-900 hover:bg-gray-50" role="menuitem" tabindex="-1" id="sort-menu-item-0">{{ $project->name }}</a>
                    @endforeach
                </div>
            </div>
        </header>

        <!-- Deployment list -->
        <ul role="list" class="divide-y divide-white/5">
            @foreach($deployments as $deployment)
                <livewire:deployment-summary wire:key="{{ $deployment->id }}" :deployment="$deployment"/>
            @endforeach
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
