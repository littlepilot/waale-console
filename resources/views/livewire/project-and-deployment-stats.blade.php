<div class="grid grid-cols-1 bg-gray-700/10 sm:grid-cols-2 lg:grid-cols-4" wire:poll.1s>
    <div class="border-t border-white/5 px-4 py-6 sm:px-6 lg:px-8">
        <p class="text-sm/6 font-medium text-gray-400">Number of deploys</p>
        <p class="mt-2 flex items-baseline gap-x-2">
            <span class="text-4xl font-semibold tracking-tight text-white">{{ $deploymentCount }}</span>
        </p>
    </div>
    <div class="border-t border-white/5 px-4 py-6 sm:border-l sm:px-6 lg:px-8">
        <p class="text-sm/6 font-medium text-gray-400">Average deploy time</p>
        <p class="mt-2 flex items-baseline gap-x-2">
            <span class="text-4xl font-semibold tracking-tight text-white">{{ $averageDeploymentDuration }}</span>
            <span class="text-sm text-gray-400">secs</span>
        </p>
    </div>
    <div class="border-t border-white/5 px-4 py-6 sm:px-6 lg:border-l lg:px-8">
        <p class="text-sm/6 font-medium text-gray-400">Number of project</p>
        <p class="mt-2 flex items-baseline gap-x-2">
            <span class="text-4xl font-semibold tracking-tight text-white">{{ $projectCount }}</span>
        </p>
    </div>
    <div class="border-t border-white/5 px-4 py-6 sm:border-l sm:px-6 lg:px-8">
        <p class="text-sm/6 font-medium text-gray-400">Success rate</p>
        <p class="mt-2 flex items-baseline gap-x-2">
            <span class="text-4xl font-semibold tracking-tight text-white">{{ round($successRate, 2) }}%</span>
        </p>
    </div>
</div>
