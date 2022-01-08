<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('doctors')->insert(
            [
                'User_Id'=>'2',
                'Price_hour'=>'150',
                'NFZ_collaborations'=>'1',
                'Description'=>'Asystent i wykładowca w Klinice Hipertensjologii, Angiologii i Chorób Wewnętrznych w Szpitalu Klinicznym im. Przemienienia Pańskiego w Poznaniu przy ul. Długiej 1/2.',
                'Amount_ratings' => '2',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('doctors')->insert(
            [
                'User_Id'=>'3',
                'Price_hour'=>'140',
                'NFZ_collaborations'=>'0',
                'Description'=>'Specjalista reumatolog oraz chorób wewnętrznych. Starszy wykładowca w Katedrze i Klinice Reumatologii, Rehabilitacji i Fizjoterapii.',
                'Amount_ratings' => '2',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('doctors')->insert(
            [
                'User_Id'=>'4',
                'Price_hour'=>'160',
                'NFZ_collaborations'=>'0',
                'Description'=>'Ukończyłam Uniwersytet Medyczny im. Karola Marcinkowskiego w Poznaniu. Specjalista w dziedzinie Ginekologii i Położnictwa.',
                'Amount_ratings' => '2',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('doctors')->insert(
            [
                'User_Id'=>'5',
                'Price_hour'=>'150',
                'NFZ_collaborations'=>'1',
                'Description'=>'Doktor nauk medycznych, specjalista ortopedii i traumatologii narządu ruchu. Absolwent Uniwersytetu Medycznego im. Karola Marcinkowskiego w Poznaniu.',
                'Amount_ratings' => '2',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('doctors')->insert(
            [
                'User_Id'=>'6',
                'Price_hour'=>'160',
                'NFZ_collaborations'=>'0',
                'Description'=>'Jestem absolwentką Akademii Medycznej w Poznaniu. Szkolenie specjalizacyjne odbyłam w Klinice Okulistyki Uniwersytetu Medycznego w Poznaniu, uzyskując tytuł specjalisty chorób oczu.',
                'Amount_ratings' => '2',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
    }
}
