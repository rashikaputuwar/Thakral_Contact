<?php

namespace App\Exports;

use App\Models\add_user;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class ExportUserRole implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('add_users')
    ->join('employees', 'add_users.employee_id', '=', 'employees.id')
    ->join('userroles', 'add_users.employee_id', '=', 'userroles.employee_id')
    ->join('roles', 'userroles.role_id', '=', 'roles.id')
    ->select(
        'add_users.employee_id as id', // Include employee ID
        DB::raw('CONCAT(employees.fname, " ", employees.lname) as employee_name'), // Concatenate first name and last name
        'roles.role_name'
    )
    ->get()
    ->map(function($item) {
        return [
            'id' => $item->id, // Include ID in the mapped output
            'employee_name' => $item->employee_name, // Include concatenated employee name
            'role_name' => $item->role_name,
        ];
    });

    }

    public function headings(): array
    {
        return [
            ['User Roles'],
            ['ID', 'Name', 'Role Name'],
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Make the title bold and centered
        $sheet->mergeCells('A1:C1');
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ]);

        // Make the headers bold and centered
        $sheet->getStyle('A2:C2')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ]);

        // Make columns autoSize
        foreach (range('A', 'C') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}
