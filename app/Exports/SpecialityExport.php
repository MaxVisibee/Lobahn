<?php

namespace App\Exports;

use App\Models\Speciality;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SpecialityExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Speciality::select('id', 'speciality_name')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Speciality Name',
        ];
    }
}