<?php

namespace Database\Seeders;

use App\Models\AKP\Kawin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KawinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'BELUM KAWIN',
            'KAWIN',
            'CERAI HIDUP',
            'CERAI MATI', 
        ];

        foreach ($data as $item) {
            Kawin::create(['nama' => $item]);
        }
    }
}