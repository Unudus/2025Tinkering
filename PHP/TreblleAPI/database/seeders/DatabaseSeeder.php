<?php

namespace Database\Seeders;

use App\Models\Check;
use App\Models\Service;
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
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Bobby DropTables',
            'email' => 'a@b.c',
        ]);

        $mainService = Service::factory()->for($user)->create([
            'name' => 'Trebble API',
            'url' => 'http://api.trebble.com'
        ]);
        Check::factory()->for($mainService)->count(10)->create();

        Service::factory()->for($user)->count(1000)->create();
    }
}
