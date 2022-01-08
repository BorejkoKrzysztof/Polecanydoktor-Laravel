<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BuisnessHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'1',
                'Day'=>'0',
                'Open_time'=>'07:00',
                'Close_time'=>'15:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'1',
                'Day'=>'1',
                'Open_time'=>'07:00',
                'Close_time'=>'15:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'1',
                'Day'=>'2',
                'Open_time'=>'07:00',
                'Close_time'=>'15:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'2',
                'Day'=>'2',
                'Open_time'=>'12:00',
                'Close_time'=>'20:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'2',
                'Day'=>'3',
                'Open_time'=>'12:00',
                'Close_time'=>'20:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'2',
                'Day'=>'4',
                'Open_time'=>'12:00',
                'Close_time'=>'20:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'2',
                'Day'=>'5',
                'Open_time'=>'12:00',
                'Close_time'=>'20:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'3',
                'Day'=>'0',
                'Open_time'=>'11:00',
                'Close_time'=>'19:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'3',
                'Day'=>'5',
                'Open_time'=>'11:00',
                'Close_time'=>'19:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'4',
                'Day'=>'4',
                'Open_time'=>'10:00',
                'Close_time'=>'18:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'4',
                'Day'=>'5',
                'Open_time'=>'10:00',
                'Close_time'=>'18:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'5',
                'Day'=>'3',
                'Open_time'=>'10:00',
                'Close_time'=>'18:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'5',
                'Day'=>'4',
                'Open_time'=>'10:00',
                'Close_time'=>'18:00'
            ]);
        DB::table('buisness_hours')->insert(
            [
                'Doctor_id'=>'5',
                'Day'=>'5',
                'Open_time'=>'10:00',
                'Close_time'=>'18:00'
            ]);
    }
}