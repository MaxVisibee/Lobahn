<?php

namespace App\Exports;

use App\Models\JobExperience;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JobExperienceExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobExperience::select('id', 'job_experience')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Years',
        ];
    }
}
