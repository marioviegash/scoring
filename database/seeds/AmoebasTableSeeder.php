<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmoebasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('amoebas')->insert([
        'id'         => 1,
            'user_id'          => 1,
            'group_id'      => 1,
            'NIK'           => '12312312313',
            'picture'       => 'img/upload/profile/5bfae0c16c9a7kibu.png',
            'loker'    => 'asd',
            'work_place'    => 'asd',
            'c_level'       => 'asd',
            'verified'      => 1,
            'created_at'    =>  '2018-11-25 09:26:17',
            'updated_at'    => '2018-11-25 17:52:39',
        ]);

        DB::table('amoebas')->insert([
            'id'         => 2,
                'user_id'          => 2,
                'group_id'      => 1,
                'NIK'           => null,
                'picture'       => null,
                'loker'    => 'asd',
                'work_place'    => null,
                'c_level'       => null,
                'verified'      => 0,
                'created_at'    =>  '2018-11-25 09:26:17',
                'updated_at'    => null,
            ]);
    }
}
