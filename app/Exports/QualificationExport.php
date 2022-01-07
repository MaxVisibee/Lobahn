<?php

namespace App\Exports;

use App\Models\Qualification;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class QualificationExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Qualification::select('id', 'qualification_name')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Qualification Name',
        ];
    }
}
