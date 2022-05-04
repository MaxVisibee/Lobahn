<?php

namespace App\Exports;

use App\Models\StudyField;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudyFieldExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StudyField::select('id', 'study_field_name')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Study Field Name',
        ];
    }
}
