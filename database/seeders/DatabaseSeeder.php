<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(SexSeeder::class);
        $this->call(DusunSeeder::class);
        $this->call(RwSeeder::class);
        $this->call(RtSeeder::class);

        // AKP
        $this->call(AgamaSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(PendidikanSeeder::class);
        $this->call(HubunganSeeder::class);
        $this->call(KawinSeeder::class);
        $this->call(SukuSeeder::class);
        $this->call(DarahSeeder::class);
        $this->call(BahasaSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}