<?php

namespace App\Imports;

use App\Models\KeyStrength;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class KeyStrengthImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new KeyStrength([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            KeyStrength::create([
                "key_strength_name" => $row['key_strength_name'],
            ]);
        }
    }

}
