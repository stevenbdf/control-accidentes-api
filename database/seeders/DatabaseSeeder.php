<?php

namespace Database\Seeders;

use App\Models\Chart;
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
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MediaSeeder::class,
            ConfigSeeder::class
        ]);

        Chart::create([
            'name' => 'KPI Productos',
            'type' => 'bar'
        ]);
    }
}
