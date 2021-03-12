<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create([
            'last_accident' => date('Y-m-d'),
            'main_info_text' => 'Actividad eventos 2021',
            'marquee_text' => 'Texto de prueba en marquesina',
            'display_main_info' => true,
            'display_media' => true,
            'display_charts' => true
        ]);
    }
}
