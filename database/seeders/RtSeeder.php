<?php

namespace Database\Seeders;

use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rw = Rw::all();
        foreach ($rw as $item) {
            
            Rt::factory(3)->create([
                'jk_id' => 1,
                'rw_id' => $item->id,
                'alamat' => 'Desa Goa Boma'
            ]);
        }
    }
}