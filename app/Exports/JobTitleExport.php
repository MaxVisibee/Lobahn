<?php

namespace App\Exports;

use App\Models\JobTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JobTitleExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobTitle::select('id', 'job_title')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Position Title',
        ];
    }
}
