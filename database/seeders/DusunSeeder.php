<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dusun::factory()->create([
            'nama' => 'GOA BOMA',
            'alamat' => 'Desa Goa Boma',
            'jk_id' => 1,
        ]);
        Dusun::factory()->create([
            'nama' => 'RUNGKANANG',
            'alamat' => 'Desa Goa Boma',
            'jk_id' => 1,
        ]);
        Dusun::factory()->create([
            'nama' => 'SINGKONG',
            'alamat' => 'Desa Goa Boma',
            'jk_id' => 1
        ]);
    }
}