<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SurgeryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('surgery')->insert(
            [
                'Doctor_id'=>'1',
                'Institution_name'=>'Gabinety Lekarskie RENOVATIO-MED',
                'Street'=>'Milczańska',
                'Building_number'=>'50A/3',
                'City'=>'Poznań',
                'Postal_code'=>'61-131'
            ]);
        DB::table('surgery')->insert(
            [
                'Doctor_id'=>'2',
                'Institution_name'=>'Amedeus Centrum Medyczne',
                'Street'=>'Jackowskiego',
                'Building_number'=>'27/2a',
                'City'=>'Poznań',
                'Postal_code'=>'60-509'
            ]);
        DB::table('surgery')->insert(
            [
                'Doctor_id'=>'3',
                'Institution_name'=>'Centrum Medyczne ZWIERZYNIECKA',
                'Street'=>'Zwierzyniecka',
                'Building_number'=>'30/28',
                'City'=>'Poznań',
                'Postal_code'=>'60-814'
            ]);
        DB::table('surgery')->insert(
            [
                'Doctor_id'=>'4',
                'Institution_name'=>'AM MEDIC Specjalistyczne Gabinety Lekarskie',
                'Street'=>'Pokrzywno',
                'Building_number'=>'26b',
                'City'=>'Poznań',
                'Postal_code'=>'61-315'
            ]);
        DB::table('surgery')->insert(
            [
                'Doctor_id'=>'5',
                'Institution_name'=>'Gabinety Lekarskie Medicor',
                'Street'=>'Powstańców Wielkopolskich',
                'Building_number'=>'4',
                'City'=>'Poznań',
                'Postal_code'=>'61-891'
            ]);
    }
}
