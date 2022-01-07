<?php

namespace App\Exports;

use App\Models\FilteredMail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MailExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function collection()
    { 
        return FilteredMail::select('id', 'email')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Email',
        ];
    }
}
