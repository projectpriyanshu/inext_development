<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportData implements FromArray,WithHeadings,WithEvents
{

    protected $data;
    protected $head;

    public function __construct(array $head,$data)
    {
        $this->data = $data;
        $this->head = $head;
    }

    public function headings() :array
    {
        return $this->head;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function registerEvents(): array
    {
       return [
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->styleCells(
                    'A:Z',
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                        ],
                    ]
                );
                $event->sheet->styleCells(
                    'A1:Z1',
                    [
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        ],
                    ]
                );
                $event->sheet->getStyle('A1:Z1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('ffffff')->setARGB('000000');
                $event->sheet->getStyle("A1:Z1")->getFont()->setBold(true)
                ->setName('Arial')
                ->setSize(14)
                ->getColor()
                ->setRGB('FFFFFF');
                $event->sheet->getColumnDimension('A')->setWidth(14);
                $event->sheet->getColumnDimension('B')->setWidth(14);
                $event->sheet->getColumnDimension('C')->setWidth(14);
                $event->sheet->getColumnDimension('D')->setWidth(14);
                $event->sheet->getColumnDimension('E')->setWidth(14);
                $event->sheet->getColumnDimension('F')->setWidth(14);
                $event->sheet->getColumnDimension('G')->setWidth(14);
                $event->sheet->getColumnDimension('H')->setWidth(14);
                $event->sheet->getColumnDimension('I')->setWidth(14);
                $event->sheet->getColumnDimension('J')->setWidth(14);
                $event->sheet->getColumnDimension('K')->setWidth(14);
                $event->sheet->getColumnDimension('L')->setWidth(14);
                $event->sheet->getColumnDimension('M')->setWidth(14);
                $event->sheet->getColumnDimension('N')->setWidth(14);
                $event->sheet->getColumnDimension('O')->setWidth(14);
                $event->sheet->getColumnDimension('P')->setWidth(14);
                $event->sheet->getColumnDimension('Q')->setWidth(14);
                $event->sheet->getColumnDimension('R')->setWidth(14);
                $event->sheet->getColumnDimension('S')->setWidth(14);
                $event->sheet->getColumnDimension('T')->setWidth(14);
                $event->sheet->getColumnDimension('U')->setWidth(14);
                $event->sheet->getColumnDimension('V')->setWidth(14);
                $event->sheet->getColumnDimension('W')->setWidth(14);
                $event->sheet->getColumnDimension('X')->setWidth(14);
                $event->sheet->getColumnDimension('Y')->setWidth(14);
                $event->sheet->getColumnDimension('Z')->setWidth(14);
            },
        ];
    }

}
