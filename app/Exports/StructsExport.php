<?php

namespace App\Exports;

use App\structure;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class StructsExport extends DefaultValueBinder implements WithEvents,WithCustomValueBinder,FromCollection,WithHeadings,WithMapping,ShouldAutoSize,WithCustomStartCell,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return structure::all();
    }

    /**
     * @return string
     */
    public function startCell(): string
    {
        return 'B2';
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'Nom',
            "Nombre d'applications",
            "Nombre d'utilisateurs",
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($struct): array
    {
        if($struct->nb_apps == 0)
        {
            $nb_apps = '0';
        }
        else
        {
            $nb_apps = $struct->nb_apps;
        }
        if($struct->nb_users == 0)
        {
            $nb_users = '0';
        }
        else
        {
            $nb_users = $struct->nb_users;
        }
        return [
            $struct->id,
            $struct->nom,
            $nb_apps,
            $nb_users,
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
            'D' => NumberFormat::FORMAT_NUMBER,
            'E' => NumberFormat::FORMAT_NUMBER,
        ];
    }


    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event)
                    {
                        $event->sheet->getStyle('B2:E2')->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()->setARGB('FFA500');
                    },
                ];
    }
}
