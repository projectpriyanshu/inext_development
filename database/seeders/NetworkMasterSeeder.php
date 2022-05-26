<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NetworkMaster;

class NetworkMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NetworkMaster::factory()->count(50)->create();
    }
}
