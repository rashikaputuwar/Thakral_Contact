<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use App\Models\Employee;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class ExportUser implements FromCollection,WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all()->map(function ($employee) {
            return [
                'id' => $employee->id,
                'name' => $employee->fname . ' ' . $employee->midname . ' ' . $employee->lname,
                'email' => $employee->email,
                'personal_contact' => $employee->personal_contact,
                'department' => $employee->departments->dept_name,
                'designation' => $employee->designations->desig_name,
               
            ];
        });
    }

    public function headings(): array
    {
        return [
            ['Employee Details'], 
            ['ID', 'Name', 'Email','Phone Number', 'Department', 'Designation'] 
        ];
    }

      /**
     * @param Worksheet $sheet
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
       // Make the table name bold and centered
       $sheet->mergeCells('A1:F1');
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
       $sheet->getStyle('A2:F2')->applyFromArray([
           'font' => [
               'bold' => true,
           ],
           'alignment' => [
               'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
           ]
       ]);

       //Make column autoSize
       foreach (range('A', 'F') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }
    }
}
