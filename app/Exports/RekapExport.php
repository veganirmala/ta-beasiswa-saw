<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function query()
    {
        return DB::table('rekap')
            ->select('nim', 'tahun', 'skor_ipk', 'skor_prestasi', 'skor_ekonomi', 'total', 'status')
            ->orderBy('total', 'desc');
    }

    public function headings(): array
    {
        return [
            'NIM', 'Tahun', 'Skor IPK', 'Skor Prestasi', 'Skor Ekonomi', 'Total', 'Status'
        ];
    }
}
