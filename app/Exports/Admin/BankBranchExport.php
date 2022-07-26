<?php

namespace App\Exports\Admin;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Yajra\DataTables\Exports\DataTablesCollectionExport;

class BankBranchExport extends DataTablesCollectionExport implements WithMapping, WithStyles
{
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID#',
            'Bank',
            'Branch',
            'Status',
        ];
    }

    /**
     * @param  mixed  $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row['id'],
            $row['bank_name'],
            $row['branch_name'],
            $row['status'],
        ];
    }

    /**
     * @param  Worksheet  $sheet
     * @return array
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true, 'size' => 12]]
        ];
    }
}
