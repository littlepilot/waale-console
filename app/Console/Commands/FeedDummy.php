<?php

namespace App\Console\Commands;

use App\Models\DeploymentStatus;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class FeedDummy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dummy {user_id=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::find($this->argument('user_id'));

        $this->createDummyProjects($user);
        $this->feedDeployments($user->projects);
    }

    protected function createDummyProjects(User $user)
    {
        $names = json_decode(file_get_contents(storage_path('app/private/creative_project_name_lists.json')), true);
        $firstNames = collect($names['first']);
        $lastNames = collect($names['last']);

        $extensions = collect(json_decode(file_get_contents(storage_path('app/private/domain_extensions.json')), true));

        foreach (range(1, random_int(5, 10)) as $i) {
            $firstName = $firstNames->random();
            $lastName = $lastNames->random();
            $extension = $extensions->random();

             $user->projects()->create([
                 'name' => $firstName . ' ' . $lastName,
                 'domain' => Str::slug($firstName . ' ' . $lastName) . $extension,
                 'repository' => Str::slug($firstName) . '/' . Str::slug($lastName),
             ]);
        }
    }

    protected function feedDeployments($projects)
    {
        while (true) {
            $project = $projects->random();

            $deployment = $project->deployments()->create([
                'commit_hash' => sprintf('%08x', random_int(0, 4294967295)),
            ]);

            sleep(random_int(3, 5));

            $deployment->update([
                'status' => DeploymentStatus::Running,
            ]);

            sleep(random_int(5, 15));

            $deployment->update([
                'status' => random_int(0, 9) >= 7 ? DeploymentStatus::Failed: DeploymentStatus::Deployed,
            ]);

            sleep(random_int(3, 5));
        }
    }
}
