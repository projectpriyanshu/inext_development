<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleMaster;

class VehicleMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleMaster::Factory()->Count(50)->create();
    }
}
