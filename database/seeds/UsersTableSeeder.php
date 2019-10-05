<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        for($i = 0; $i < 10; ++$i)
        {
            DB::table('users')->insert([
                'nom' => 'User' . $i,
                'password' => bcrypt('password' . $i),
                'Admin' => rand(0,1),
                'prenom' => 'prenom'.$i,
                'username' => 'username'.$i,
                'struct_id' => rand(0,10),
            ]);
        }
    }
}
