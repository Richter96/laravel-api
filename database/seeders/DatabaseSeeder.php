<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //crea dal factory user dati fake
        \App\Models\User::factory(1)->create();

        //crea dal factory user dati fake
        \App\Models\User::factory()->create([
            'name' => 'Riccardo',
            'email' => 'Riccardo@example.com',
        ]);

        // per dire al database di seedare tutto assieme
        $this->call([
            ProjectSeeder::class,
            TypeSeeder::class,
            TechnologySeeder::class,

        ]);
    }
}
