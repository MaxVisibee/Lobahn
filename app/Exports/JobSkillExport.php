<?php

namespace App\Exports;

use App\Models\JobSkill;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JobSkillExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobSkill::select('id', 'job_skill')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Job Skill',
        ];
    }
}
