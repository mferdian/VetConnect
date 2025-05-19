<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Spesialisasi;
use App\Models\User;
use App\Models\Vet;
use App\Models\VetDate;
use App\Models\VetTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    Vet::factory(10)
        ->has(
            VetDate::factory()
                ->count(3)
                ->has(VetTime::factory()->count(4), 'vetTimes'),
            'vetDates'
        )
        ->create();

    Spesialisasi::factory()->count(5)->create();

    User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@vetconnect.com',
        'password' => bcrypt('gugun123'),
        'is_admin' => true,
    ]);

    User::factory()->create([
        'name' => 'birra',
        'email' => 'birra@gmaiL.com',
        'password' => bcrypt('birra123'),
        'is_admin' => false,
    ]);



    }
}
