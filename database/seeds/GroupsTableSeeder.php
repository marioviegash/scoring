<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'id'      => 1,
            'name'          => 'Testing',
            'description'   => 'testing',
            'logo'          => 'img/upload/group/5bfa5772c10c3kibu.png',
            'creator_id'    => 1,
            'approve_at'    => '2018-11-25 15:46:46',
            'created_at'    => '2018-11-25 08:04:02',
            'updated_at'    => '2018-11-25 08:18:55',
            'group_status_id'=> 2
        ]);

    }
}
