<?php

namespace App\Imports;

use App\Models\Language;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LanguageImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Language([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            Language::create([
                "language_name" => $row['language_name'],
            ]);
        }
    }
}
