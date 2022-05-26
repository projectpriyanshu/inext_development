<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShipmentTypeMaster;

class ShipmentTypeMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipmentTypeMaster::factory()->count(50)->create();
    }
}
