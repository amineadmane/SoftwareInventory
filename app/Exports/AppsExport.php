<?php

namespace App\Exports;

use App\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class AppsExport extends DefaultValueBinder implements WithEvents,WithCustomValueBinder,FromCollection,WithHeadings,WithMapping,ShouldAutoSize,WithCustomStartCell,WithColumnFormatting
{

    public function collection()
    {
        $applications = DB::select(DB::raw('SELECT applications.* , U.username FROM (SELECT id ,max(DDM) as dateMAJ FROM applications Group By id) as lastapp
         INNER JOIN applications ON applications.id = lastapp.id AND applications.DDM = lastapp.dateMAJ 
         JOIN users as U On applications.user_id = U.id'));
        $collect = Collection::make($applications);
        return $collect;
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [

        ];
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
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event)
            {
                $event->sheet->getStyle('B2:S2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFA500');
            },
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'Nom',
            "Numero de version",
            "Editeur",
            "Date de mise en place",
            "Derniere date de mise a jour",
            "Nom du serveur",
            "Adresse Ip",
            "OS",
            "Version OS",
            "Base de donne",
            "Version DB",
            "Type de l'application",
            "Admin Sys",
            "Admin BD",
            "Responsable",
            "Admin metrier",
            "struct_id",
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($app): array
    {
        return [
            $app->id,
            $app->nom,
            $app->Nver,
            $app->editeur,
            $app->DMP,
            $app->DDM,
            $app->nomserveur,
            $app->adressIP,
            $app->OS,
            $app->verOS,
            $app->DB,
            $app->verDB,
            $app->typeapp,
            $app->adsys,
            $app->adbd,
            $app->username,
            $app->admetier,
            $app->struct_id,
        ];
    }
}
