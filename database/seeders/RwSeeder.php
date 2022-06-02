<?php

namespace Database\Seeders;

use App\Models\Dusun;
use App\Models\Rw;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dusun = Dusun::all();
        foreach ($dusun as $item) {
            Rw::factory(2)->create([
            
                'jk_id' => 1,
                'dusun_id' => $item->id,
                'alamat' => 'Desa Goa Boma'
            ]);
        }
    }
}