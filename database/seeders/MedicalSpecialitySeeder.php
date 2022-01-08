<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MedicalSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('medical_speciality')->insert(
            [
                'Doctor_id'=>'1',
                'Medical_Speciality_id'=>'1'
            ]);
        DB::table('medical_speciality')->insert(
            [
                'Doctor_id'=>'2',
                'Medical_Speciality_id'=>'1'
            ]);
        DB::table('medical_speciality')->insert(
            [
                'Doctor_id'=>'3',
                'Medical_Speciality_id'=>'2'
            ]);
        DB::table('medical_speciality')->insert(
            [
                'Doctor_id'=>'4',
                'Medical_Speciality_id'=>'4'
            ]);
        DB::table('medical_speciality')->insert(
            [
                'Doctor_id'=>'5',
                'Medical_Speciality_id'=>'3'
            ]);
    }
}
