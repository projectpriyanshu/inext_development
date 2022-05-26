<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CurrencyMaster;

class CurrencyMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrencyMaster::Factory()->count(50)->create();
    }
}
