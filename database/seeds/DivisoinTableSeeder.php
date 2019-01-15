<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            'id'         => 1,
            'name'          => "Amoeba Inkubato",
            'created_at'    =>  '2018-11-25 09:26:17',
            'updated_at'    => '2018-11-25 17:52:39',
        ]);

        DB::table('divisions')->insert([
            'id'         => 2,
            'name'          => "Amoeba Bushido",
            'created_at'    =>  '2018-11-25 09:26:17',
            'updated_at'    => '2018-11-25 17:52:39',
        ]);
        
        DB::table('divisions')->insert([
            'id'         => 3,
            'name'          => "Amoeba Caeros",
            'created_at'    =>  '2018-11-25 09:26:17',
            'updated_at'    => '2018-11-25 17:52:39',
        ]);
        
        DB::table('divisions')->insert([
            'id'         => 4,
            'name'          => "Amoeba Accelerator",
            'created_at'    =>  '2018-11-25 09:26:17',
            'updated_at'    => '2018-11-25 17:52:39',
        ]);
    }
}
