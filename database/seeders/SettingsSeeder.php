<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'site_name' => 'Université de Mahajanga - Résultats du Baccaluréat Année 2023',
            'fblink' => 'www.facebook.com/page',
            'title_message' => 'Résultats du Baccalauréat en direct année 2023',
            'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image' => 'default.jpg',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}