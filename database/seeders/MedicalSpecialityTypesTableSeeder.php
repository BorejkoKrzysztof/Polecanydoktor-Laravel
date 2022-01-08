<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class MedicalSpecialityTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('medical_speciality_types')->insert(
            [
                'Speciality_name'=>'Internista'
            ]);
        DB::table('medical_speciality_types')->insert(
            [
                'Speciality_name'=>'Ginekolog'
            ]);
        DB::table('medical_speciality_types')->insert(
            [
                'Speciality_name'=>'Okulista'
            ]);
        DB::table('medical_speciality_types')->insert(
            [
                'Speciality_name'=>'Ortopeda'
            ]);
        DB::table('medical_speciality_types')->insert(
            [
                'Speciality_name'=>'Dentysta'
            ]);
        DB::table('medical_speciality_types')->insert(
            [
                'Speciality_name'=>'Gastrolog'
            ]);
    }
}
