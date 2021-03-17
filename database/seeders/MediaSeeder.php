<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::create(['name' => 'Imagen individual']);
        Media::create(['name' => 'Video']);
        Media::create(['name' => 'Carrusel']);
    }
}
