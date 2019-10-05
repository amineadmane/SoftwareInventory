<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements WithEvents,FromCollection,WithHeadings,WithMapping,ShouldAutoSize,WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('users as U')
            ->join('structures as S' , 'S.id' , '=','U.struct_id')
            ->select ('U.id', 'U.username', 'U.nom', 'U.prenom', 'S.nom as Str','U.Admin')
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'Username',
            'nom',
            'Prenom',
            'Type du profil',
            'Structure'
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($user): array
    {
        if($user->Admin)
        {
            $type = 'Administrateur';
        }
        else
        {
            $type = 'Gestionnaire';
        }
        return [
            $user->id,
            $user->username,
            $user->nom,
            $user->prenom,
            $type,
            $user->Str
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
                $event->sheet->getStyle('B2:G2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFA500');
            },
        ];
    }
}
