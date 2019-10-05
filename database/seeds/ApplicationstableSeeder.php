<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->delete();

        for($i = 0; $i < 30; ++$i)
        {
            DB::table('applications')->insert([
                'id' => $i,
                'nom' => 'application' . $i,
                'description' => 'description'.$i,
                'Nver' => 'Nver'.$i,
                'editeur' => 'editeur'.$i,
                'DMP' =>'2000-01-01',
                'DDM' => '2000-01-01',
                'nomserveur' => 'serveur'.$i,
                'adressIP' => 'adressIP'.$i,
                'OS' => 'OS'.$i,
                'verOS' => 'verOS'.$i,
                'DB' => 'DB'.$i,
                'verDB' => 'verDB'.$i,
                'typeapp' => 'typaapp'.$i,
                'adsys' => 'adsys'.$i,
                'user_id' => rand(0,10),
                'adbd' => 'adbd'.$i,
                'admetier' => 'admetier'.$i,
                'struct_id' => rand(0,10),
            ]);
        }
    }
}
