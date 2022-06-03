<?php

namespace Database\Seeders;

use App\Models\AKP\Pendidikan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'TIDAK / BELUM SEKOLAH',
            'BELUM TAMAT SD/SEDERAJAT',
            'TAMAT SD / SEDERAJAT',
            'SLTP/SEDERAJAT',
            'SLTA / SEDERAJAT',
            'DIPLOMA I / II',
            'AKADEMI/ DIPLOMA III/S. MUDA',
            'DIPLOMA IV/ STRATA I',
            'STRATA II',
            'STRATA III',

        ];

        foreach ($data as $item) {
            Pendidikan::create(['nama' => $item]);
        }
    }
}