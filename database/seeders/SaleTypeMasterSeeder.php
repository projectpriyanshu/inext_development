<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SaleTypeMaster;

class SaleTypeMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SaleTypeMaster::Factory()->count(50)->create();
    }
}
