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
        

        DB::table('users')->insert([
            'id'       => 1,
            'name'          => 'Super Admin', 
            'email'       => 'admin@gmail.com', 
            'email_verified_at'      => null,
            'role_id'       => 1, 
            'password'      => bcrypt('asdasd'), 
            'remember_token'=> null, 
            'created_at'    => '2018-11-08 14:17:59', 
            'updated_at'    => NULL
        ]);
        
        DB::table('users')->insert([
            'id'       => 2,
            'name'          => 'asdasd', 
            'email'       => 'asd@gmail.com', 
            'email_verified_at'      => null,
            'role_id'       => 4, 
            'password'      => bcrypt('asdasdasd'), 
            'remember_token'=> null, 
            'created_at'    => '2018-11-08 14:17:59', 
            'updated_at'    => NULL
        ]);

        DB::table('users')->insert([
            'id'       => 3,
            'name'          => 'mario', 
            'email'       => 'mario@gmail.com', 
            'email_verified_at'      => null,
            'role_id'       => 4, 
            'password'      => bcrypt('asdasd'), 
            'remember_token'=> null, 
            'created_at'    => '2018-11-08 14:17:59', 
            'updated_at'    => NULL
        ]);
    }
}