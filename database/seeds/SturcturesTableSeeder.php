<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SturcturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('structures')->delete();

        for($i = 0; $i < 10; ++$i)
        {
            DB::table('structures')->insert([
                'nom' => 'Structure' . $i,
            ]);
        }
    }
}
