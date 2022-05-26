<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceMaster;

class ServiceMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceMaster::factory()->count(50)->create();
    }
}
