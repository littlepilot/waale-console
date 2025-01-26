<div wire:poll.1s>
    @if($deployment)
        <div class="flex flex-col items-start justify-between gap-x-8 gap-y-4 bg-gray-700/10 px-4 py-4 sm:flex-row sm:items-center sm:px-6 lg:px-8">
            <div>
                <div class="flex items-center gap-x-3">
                    @if($deployment->status == \App\Models\DeploymentStatus::Pending)
                        <div class="flex-none rounded-full bg-gray-400/10 p-1 text-gray-400">
                            <div class="size-2 rounded-full bg-current"></div>
                        </div>
                    @elseif($deployment->status == \App\Models\DeploymentStatus::Running)
                        <div class="flex-none rounded-full bg-amber-400/10 p-1 text-amber-400 animate-blink">
                            <div class="size-2 rounded-full bg-current"></div>
                        </div>
                    @elseif($deployment->status == \App\Models\DeploymentStatus::Deployed)
                        <div class="flex-none rounded-full bg-green-400/10 p-1 text-green-400">
                            <div class="size-2 rounded-full bg-current"></div>
                        </div>
                    @elseif($deployment->status == \App\Models\DeploymentStatus::Failed)
                        <div class="flex-none rounded-full bg-rose-400/10 p-1 text-rose-400">
                            <div class="size-2 rounded-full bg-current"></div>
                        </div>
                    @endif
                    <h1 class="flex gap-x-3 text-base/7">
                        <span class="font-semibold text-white">{{ $deployment->project->name }}</span>
                        <span class="text-gray-600">/</span>
                        <span class="font-semibold text-white">{{ $deployment->project->domain }}</span>
                    </h1>
                </div>
                <p class="mt-2 text-xs/6 text-gray-400">Deploys from GitHub via main branch</p>
            </div>
            @if($deployment->status == \App\Models\DeploymentStatus::Deployed)
                <div class="order-first flex-none rounded-full bg-green-400/10 px-2 py-1 text-xs font-medium text-green-400 ring-1 ring-inset ring-green-400/30 sm:order-none">Preview</div>
            @elseif($deployment->status == \App\Models\DeploymentStatus::Running)
                <div class="order-first flex-none rounded-full bg-amber-400/10 px-2 py-1 text-xs font-medium text-amber-400 ring-1 ring-inset ring-amber-400/30 sm:order-none">Watch</div>
            @elseif($deployment->status == \App\Models\DeploymentStatus::Failed)
                <div class="order-first flex-none rounded-full bg-rose-400/10 px-2 py-1 text-xs font-medium text-rose-400 ring-1 ring-inset ring-rose-400/30 sm:order-none">See the logs</div>
            @endif
        </div>
    @endif
</div>

