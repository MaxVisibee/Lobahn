<?php

namespace App\Exports;

use App\Models\Industry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IndustryExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Industry::select('id', 'industry_name')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Industry Name',
        ];
    }
}
