<main>
    <ul role="list" class="divide-y divide-white/5 m-4 mx-12" wire:poll.1s>
        @foreach($projects as $project)
            <livewire:project-summary wire:key="{{ $project->id }}" :project="$project"/>
        @endforeach
    </ul>
</main>
