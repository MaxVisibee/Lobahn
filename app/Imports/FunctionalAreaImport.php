<?php

namespace App\Imports;

use App\Models\FunctionalArea;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FunctionalAreaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Industry([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            FunctionalArea::create([
                "area_name" => $row['functional_area_name'],
            ]);
        }
    }
}
