<li class="relative flex items-center space-x-4 px-4 py-4 sm:px-6 lg:px-8" wire:poll.1s>
    <div class="min-w-0 flex-auto">
        <div class="flex items-center gap-x-3">
            @if($deployment->status == \App\Models\DeploymentStatus::Pending)
                <div class="flex-none rounded-full bg-gray-100/10 p-1 text-gray-500">
                    <div class="size-2 rounded-full bg-current"></div>
                </div>
            @elseif($deployment->status == \App\Models\DeploymentStatus::Running)
                <div class="flex-none rounded-full p-1 text-amber-400 bg-amber-400/10 animate-blink">
                    <div class="size-2 rounded-full bg-current"></div>
                </div>
            @elseif($deployment->status == \App\Models\DeploymentStatus::Deployed)
                <div class="flex-none rounded-full p-1 text-green-400 bg-green-400/10">
                    <div class="size-2 rounded-full bg-current"></div>
                </div>
            @elseif($deployment->status == \App\Models\DeploymentStatus::Failed)
                <div class="flex-none rounded-full p-1 text-rose-400 bg-rose-400/10">
                    <div class="size-2 rounded-full bg-current"></div>
                </div>
            @endif
            <h2 class="min-w-0 text-sm/6 font-semibold text-white">
                <a href="#" class="flex gap-x-2">
                    <span class="truncate">{{ $deployment->project->name }}</span>
                    <span class="text-gray-400">/</span>
                    <span class="whitespace-nowrap">{{ $deployment->commit_hash }}</span>
                    <span class="absolute inset-0"></span>
                </a>
            </h2>
        </div>
        <div class="mt-3 flex items-center gap-x-2.5 text-xs/5 text-gray-400">
            <p class="truncate">Deploys from GitHub</p>
            <svg viewBox="0 0 2 2" class="size-0.5 flex-none fill-gray-300">
                <circle cx="1" cy="1" r="1" />
            </svg>
            <p class="whitespace-nowrap" x-data="{time: human(new Date('{{ $deployment->created_at }}'))}" x-text="time"></p>
        </div>
    </div>
    @if($deployment->status == \App\Models\DeploymentStatus::Deployed)
        <div class="flex-none rounded-full bg-green-400/10 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-green-400/20">Preview</div>
    @elseif($deployment->status == \App\Models\DeploymentStatus::Running)
        <div class="flex-none rounded-full bg-amber-400/10 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-amber-400/20">Watch</div>
    @elseif($deployment->status == \App\Models\DeploymentStatus::Failed)
        <div class="flex-none rounded-full bg-rose-400/10 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-rose-400/20">See the logs</div>
    @endif
    <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
    </svg>
</li>
