<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert(
            [
                'Role_name'=>'Admin'
            ]
            );
        DB::table('roles')->insert(
            [
                'Role_name'=>'User'
            ]
            );
        DB::table('roles')->insert(
            [
                'Role_name'=>'Doctor'
            ]
            );
    }
}
