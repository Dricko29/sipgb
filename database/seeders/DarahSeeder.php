<?php

namespace Database\Seeders;

use App\Models\AKP\Darah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'A',
            'B',
            'AB',
            'O',
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
            'TIDAK TAHU',
        ];

        foreach ($data as $item) {
            Darah::create(['nama' => $item]);
        }
    }
}