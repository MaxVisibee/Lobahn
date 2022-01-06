<?php

namespace App\Exports;

use App\Models\JobType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JobTypeExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobType::select('id', 'job_type')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Job Type',
        ];
    }
}
