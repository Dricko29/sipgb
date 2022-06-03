<?php

namespace Database\Seeders;

use App\Models\AKP\Agama;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'ISLAM',
            'KRISTEN',
            'KATHOLIK',
            'HINDU',
            'BUDHA',
            'KONGHUCU',
            'LAINNYA'

        ];
        foreach ($data as $item) {

            Agama::create(['nama' => $item]);
        }
    }
}