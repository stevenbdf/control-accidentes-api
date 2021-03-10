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
            UserSeeder::class,
            ConfigSeeder::class
        ]);

        Chart::create([
            'name' => 'product_KPI',
            'type' => 'bar'
        ]);
    }
}
