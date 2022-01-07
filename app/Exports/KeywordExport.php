<?php

namespace App\Exports;

use App\Models\Keyword;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KeywordExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Keyword::select('id', 'keyword_name')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Keyword Name',
        ];
    }
}
