<?php

namespace App\Exports;

use App\Models\PeopleManagementLevel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PeopleManagementLevelExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $peopleManagementLevelExport = PeopleManagementLevel::select('id', 'level')->get();
        return $peopleManagementLevelExport;
    }

    public function headings(): array
    {
        return [
            'Id',
            'level',
        ];
    }
}