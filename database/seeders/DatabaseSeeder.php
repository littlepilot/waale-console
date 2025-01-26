<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Ahmet Recep Navruz',
            'email' => 'navruzahmet@gmail.com',
            'password' => bcrypt('_response1024'),
        ]);
        $user1->projects()->create([
            'name' => 'Waale Console',
            'domain' => 'waale.dev',
            'repository' => 'navruzahmet/waale-console',
        ], ['role' => 'owner']);

        $user2 = User::create([
            'name' => 'Oğuz Han Özmen',
            'email' => 'oushan16@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $user2->projects()->create([
            'name' => 'Waale App',
            'domain' => 'waale.app',
            'repository' => 'littlepilot/waale-app',
        ], ['role' => 'owner']);
    }
}
