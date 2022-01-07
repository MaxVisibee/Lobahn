<?php

namespace App\Exports;

use App\Models\JobShift;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JobShiftExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobShift::select('id', 'job_shift')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Job Shift',
        ];
    }

}
