<?php

namespace App\Exports\Admin;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Yajra\DataTables\Exports\DataTablesCollectionExport;

class ServiceExport extends DataTablesCollectionExport implements WithMapping, WithStyles
{
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID#',
            'Service Name',
            'Description',
            'Vehicle Categories',
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
            $row['vehicle_categories'],
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
