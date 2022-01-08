<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UpdateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')
        // ->where('Id', '=', '2')
        // ->update(['Image_path' => public_path().'/Images/2/User_Id2.jpg']);

        // DB::table('users')
        // ->where('Id', '=', '3')
        // ->update(['Image_path' => public_path().'/Images/3/User_Id3.jpg']);

        // DB::table('users')
        // ->where('Id', '=', '4')
        // ->update(['Image_path' => public_path().'/Images/4/User_Id4.jpg']);

        // DB::table('users')
        // ->where('Id', '=', '5')
        // ->update(['Image_path' => public_path().'/Images/5/User_Id5.jpg']);

        // DB::table('users')
        // ->where('Id', '=', '6')
        // ->update(['Image_path' => public_path().'/Images/6/User_Id6.jpg']);


        DB::table('users')
        ->where('Id', '=', '2')
        ->update(['Image_path' => '/images/2/User_Id2.jpg']);

        DB::table('users')
        ->where('Id', '=', '3')
        ->update(['Image_path' => '/images/3/User_Id3.jpg']);

        DB::table('users')
        ->where('Id', '=', '4')
        ->update(['Image_path' => '/images/4/User_Id4.jpg']);

        DB::table('users')
        ->where('Id', '=', '5')
        ->update(['Image_path' => '/images/5/User_Id5.jpg']);

        DB::table('users')
        ->where('Id', '=', '6')
        ->update(['Image_path' => '/images/6/User_Id6.jpg']);
    }
}
