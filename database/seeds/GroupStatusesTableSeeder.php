<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_statuses')->insert([
            'id'=> '1',
            'name'          => 'wait',
            'description'   => 'menunggu semua data terisi'
        ]);

        DB::table('group_statuses')->insert([
            'id'=> '2',
            'name'          => 'done    ',
            'description'   => 'semua data telah terisi'
        ]);

    }
}
