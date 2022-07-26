<?php

namespace App\Exports\Admin;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Yajra\DataTables\Exports\DataTablesCollectionExport;

class BlogExport extends DataTablesCollectionExport implements WithMapping, WithStyles
{
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID#',
            'Blog Name',
            'Description',
            'Blog Date',
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
            $row['name'],
            $row['description'],
            $row['date'],
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
