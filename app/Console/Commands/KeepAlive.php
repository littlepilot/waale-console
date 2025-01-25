<?php

namespace App\Console\Commands;

use App\Models\DeploymentStatus;
use App\Models\User;
use Illuminate\Console\Command;

class KeepAlive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:live {user_id=2}';

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
        $projects = User::find($this->argument('user_id'))->projects;

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
