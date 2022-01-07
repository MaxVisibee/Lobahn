<?php

namespace App\Imports;

use App\Models\Institution;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class InstitutionImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Institution([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            Institution::create([
                "institution_name" => $row['institution_name'],
            ]);
        }
    }
}
