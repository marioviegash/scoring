<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'            => 1,
            'name'          => 'Super Admin'
        ]);

        DB::table('roles')->insert([
            'id'            => 2,
            'name'          => 'Admin Amoeba'
        ]);
        
        DB::table('roles')->insert([
            'id'            => 3,
            'name'          => 'Juri'
        ]);
        
        DB::table('roles')->insert([
            'id'            => 4,
            'name'          => 'Amoeba'
        ]);
    }
}
