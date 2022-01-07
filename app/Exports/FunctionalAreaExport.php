<?php

namespace App\Exports;

use App\Models\FunctionalArea;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FunctionalAreaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FunctionalArea::select('id', 'area_name')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Functional Area Name',
        ];
    }
}
