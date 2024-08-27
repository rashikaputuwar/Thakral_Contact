<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportUser implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
             // Join the 'add_users' table with the 'employees' table to get the employee's name
        return DB::table('add_users')
        ->join('employees', 'add_users.employee_id', '=', 'employees.id')
        ->select(
            'add_users.id',
            DB::raw('CONCAT(employees.fname, " ", employees.lname) as employee_name'), // Full name of the employee
            'add_users.user_name',
            'add_users.expiry_date',
            'add_users.status'
        )
        ->get();
      
    }

    public function headings(): array
    {
        return [
            ['User Details'],
            ['ID', 'Employee Name','Username', 'Expiry Date', 'Status'],
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Make the title bold and centered
        $sheet->mergeCells('A1:D1');
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
        $sheet->getStyle('A2:D2')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ]);

        // Make columns autoSize
        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}
