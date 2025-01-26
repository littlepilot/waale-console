<li class="relative flex justify-between gap-x-6 py-5" wire:poll.1s>
    <div class="flex min-w-0 gap-x-4">
                    <span class="flex size-12 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[2rem] font-medium text-gray-400">
                        {{ $project->name[0] }}
                    </span>
        <div class="min-w-0 flex-auto">
            <p class="text-sm/6 font-semibold text-white">
                <a href="{{ route('deployments', ['project' => $project->id]) }}">
                    <span class="absolute inset-x-0 -top-px bottom-0"></span>
                    {{ $project->name }}
                </a>
            </p>
            <p class="mt-1 truncate text-xs/5 text-gray-400">
                <a href="{{ url('http://' . $project->domain) }}" class="relative truncate hover:underline">{{ $project->domain }}</a>
            </p>
        </div>
    </div>
    <div class="flex shrink-0 items-center gap-x-4">
        <div class="hidden sm:flex sm:flex-col sm:items-end">
            <p class="text-sm/6 text-white">{{ $project->repository }}</p>
            <div class="mt-1 flex items-center gap-x-1.5">
                @if(blank($project?->lastDeployment?->status))

                @elseif($project->lastDeployment->status == \App\Models\DeploymentStatus::Pending)
                    <div class="flex-none rounded-full bg-gray-500/20 p-1">
                        <div class="size-1.5 rounded-full bg-gray-500"></div>
                    </div>
                @elseif($project->lastDeployment->status == \App\Models\DeploymentStatus::Running)
                    <div class="flex-none rounded-full bg-amber-500/20 p-1 animate-blink">
                        <div class="size-1.5 rounded-full bg-amber-500"></div>
                    </div>
                @elseif($project->lastDeployment->status == \App\Models\DeploymentStatus::Deployed)
                    <div class="flex-none rounded-full bg-green-500/20 p-1">
                        <div class="size-1.5 rounded-full bg-green-500"></div>
                    </div>
                @elseif($project->lastDeployment->status == \App\Models\DeploymentStatus::Failed)
                    <div class="flex-none rounded-full bg-rose-500/20 p-1">
                        <div class="size-1.5 rounded-full bg-rose-500"></div>
                    </div>
                @endif

                @if(filled($project?->lastDeployment?->status))
                    <p class="text-xs/5 text-gray-400">
                        Last deployment <time datetime="{{ $project->lastDeployment->created_at }}">{{ $project->lastDeployment->created_at->diffForHumans() }}</time>
                    </p>
                @else
                    <p class="text-xs/5 text-gray-400">
                        Deployment has not been done yet.
                    </p>
                @endif
            </div>
        </div>
        <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
    </div>
</li>
