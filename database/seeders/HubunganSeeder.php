<?php

namespace Database\Seeders;

use App\Models\AKP\Hubungan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HubunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'KEPALA KELUARGA',
            'SUAMI',
            'ISTRI',
            'ANAK',
            'MENANTU',
            'CUCU',
            'ORANGTUA',
            'MERTUA',
            'FAMILI',
            'PEMBANTU',
            'LAINNYA',
        ];

        foreach ($data as $item) {
            Hubungan::create(['nama' => $item]);
        }
    }
}