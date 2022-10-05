<?php

namespace App\Exports;

use App\Models\Space;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class SpaceExport implements FromCollection,ShouldAutoSize, WithHeadings,  WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('spaces')
        ->select(
            'name',
            'cities.city_name',
            'content',
            'location')
        ->join('cities','cities.id','=','spaces.id_city')
        ->orderBy('name','ASC')
        ->get();
    }

    public function headings(): array
    {
        return [
            ['List Data Perumahan'],
            ['Nama Perumahan', 'Kota/Kabupaten','Alamat', 'Titik Koordinat'],
         ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:D2'; // All headers
                $event->sheet->getDelegate()->mergeCells('A1:D1');
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle('A1:D2')
                ->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A2:D2')
                ->getFill()
                ->applyFromArray(['fillType' => 'solid','rotation' => 0, 'color' => ['rgb' => 'D9D9D9'],]);
                $to = $event->sheet->getDelegate()->getHighestColumn();
                $a = $event->sheet->getDelegate()->getHighestRow();
                $event->sheet->getStyle('A2:'.$to.$a)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ])->getAlignment()->setWrapText(true);
            },
        ];
    }
}
