<?php

namespace App\Exports;

use App\Models\TargetCompany;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TargetCompanyExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TargetCompany::select('id', 'company_name')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Company Name',
        ];
    }
}
