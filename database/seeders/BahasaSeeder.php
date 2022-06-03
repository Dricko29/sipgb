<?php

namespace Database\Seeders;

use App\Models\AKP\Bahasa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Latin', 'inisial'  => 'L'],
            ['nama' => 'Daerah', 'inisial'  => 'D'],
            ['nama' => 'Arab', 'inisial'  => 'A'],
            ['nama' => 'Arab dan Latin', 'inisial'  => 'AL'],
            ['nama' => 'Arab dan Daerah', 'inisial'  => 'AD'],
            ['nama' => 'Arab, Latin dan Daerah', 'inisial'  => 'ALD'],

        ];

        foreach ($data as $item) {
            Bahasa::create([
                'nama' => $item['nama'],
                'inisial' => $item['inisial'],
            ]);
        }
    }
}