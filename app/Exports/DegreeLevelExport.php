<?php

namespace App\Exports;

use App\Models\DegreeLevel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DegreeLevelExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DegreeLevel::select('id', 'degree_name')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Degree Name',
        ];
    }
}
