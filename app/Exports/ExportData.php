<?php

namespace App\Exports;

use App\Models\Candidate;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportData implements FromQuery, WithHeadings
{
    use Exportable;

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return Candidate::select('matricule', 'lname', 'fname', 'serie', 'mention', 'center', 'admis');
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Matricule',
            'Nom',
            'Prénom',
            'Série',
            'Mention',
            'Centre',
            'Admis',
        ];
    }
}
