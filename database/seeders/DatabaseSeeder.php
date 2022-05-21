<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(1000)->create();\

        // \App\Models\Posts::factory(1000)->create();

        $this->call([
            UserSeeder::class,
            // AboutMeSeeder::class,
            // AboutmesTableSeeder::class
            AboutmesTableSeeder::class,
            MediaTableSeeder::class,
            PortofilosTableSeeder::class,
            PostsTableSeeder::class,
            TaggablesTableSeeder::class,
            TagsTableSeeder::class,
        ]);
    }
}
