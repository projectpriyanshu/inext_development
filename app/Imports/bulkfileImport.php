<?php

namespace App\Imports;

use App\Models\bulkImport;
use Maatwebsite\Excel\Concerns\ToModel;

class bulkfileImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new bulkImport([
            'name' => $row[0],
            'email' => $row[1],
            'password' => bcrypt($row[2]),
        ]);
    }
}





