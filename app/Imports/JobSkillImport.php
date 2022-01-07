<?php

namespace App\Imports;

use App\Models\JobSkill;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class JobSkillImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new JobSkill([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            JobSkill::create([
                "job_skill" => $row['job_skill'],
            ]);
        }
    }
}
