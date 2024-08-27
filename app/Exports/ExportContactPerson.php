<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class ExportContactPerson implements FromQuery,WithHeadings,WithStyles
{
    /**
  * @return \Illuminate\Database\Query\Builder
    */
    public function query()
    {
        return DB::table('contact_persons')
        ->join('client_tables', 'contact_persons.client_id', '=', 'client_tables.id')
        ->select(
            'contact_persons.id',
            DB::raw('CONCAT(contact_persons.first_name, " ", contact_persons.last_name) as name'),
            'contact_persons.email',
            'contact_persons.contact_number',
            'contact_persons.address',
            'client_tables.client_name as client_name',
        )
        ->orderBy('contact_persons.id'); 
      
    }

    public function headings(): array
    {
        return [
            ['Contact Person Details'],
            ['ID', 'Contact Person Name', 'Email', 'Contact Number', 'Address', 'Associated Organization'],
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return void
     */
    public function styles(Worksheet $sheet)
    {
        // Make the table name bold and centered
        $sheet->mergeCells('A1:G1');
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
        $sheet->getStyle('A2:G2')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ]);

        // Make columns autoSize
        foreach (range('A', 'G') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}
