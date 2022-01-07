<?php

namespace App\Exports;

use App\Models\CarrierLevel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CarrierLevelExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CarrierLevel::select('id', 'carrier_level')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Carrier Level',
        ];
    }
}
