<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MisellaneousMaster;

class MisellaneousMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MisellaneousMaster::Factory()->count(50)->create();
    }
}
