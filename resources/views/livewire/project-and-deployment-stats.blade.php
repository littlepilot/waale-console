<div class="bg-gray-900" wire:poll.1s>
    <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-sm/6 font-medium text-gray-400">Number of deploys</p>
                <p class="mt-2 flex items-baseline gap-x-2">
                    <span class="text-4xl font-semibold tracking-tight text-white">{{ $deploymentCount }}</span>
                </p>
            </div>
            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-sm/6 font-medium text-gray-400">Average deploy time</p>
                <p class="mt-2 flex items-baseline gap-x-2">
                    <span class="text-4xl font-semibold tracking-tight text-white">{{ $averageDeploymentDuration }}</span>
                    <span class="text-sm text-gray-400">seconds</span>
                </p>
            </div>
            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-sm/6 font-medium text-gray-400">Number of projects</p>
                <p class="mt-2 flex items-baseline gap-x-2">
                    <span class="text-4xl font-semibold tracking-tight text-white">{{ $projectCount }}</span>
                </p>
            </div>
            <div class="bg-gray-900 px-4 py-6 sm:px-6 lg:px-8">
                <p class="text-sm/6 font-medium text-gray-400">Success rate</p>
                <p class="mt-2 flex items-baseline gap-x-2">
                    <span class="text-4xl font-semibold tracking-tight text-white">{{ round($successRate, 2) }}%</span>
                </p>
            </div>
        </div>
    </div>
</div>
