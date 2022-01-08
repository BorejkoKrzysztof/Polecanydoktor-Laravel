<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ratings')->insert(
            [
                'User_id'=>'7',
                'Doctor_id'=>'1',
                'Comment'=>'Super podejście do pacjenta, dokładny wywiad, szczegółowe wyjaśnienia podczas wizyty. Polecam!',
                'Rating'=>'5',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'9',
                'Doctor_id'=>'1',
                'Comment'=>'Lekarz kompetentny i zaangażowany, wszystko dokładnie omówione, profesjonalne podejście do pacjenta.',
                'Rating'=>'5',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'7',
                'Doctor_id'=>'2',
                'Comment'=>'Wizyta o czasie, badanie poszło sprawnie, ale zbyt ogólne objaśnienia dla pacjenta.',
                'Rating'=>'4',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'8',
                'Doctor_id'=>'2',
                'Comment'=>'Wizyta odbyła się punktualnie, doktor uprzejmy.',
                'Rating'=>'4.5',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'7',
                'Doctor_id'=>'3',
                'Comment'=>'Lekarz na odpowiednim poziomie, lecz mało tłumaczy.',
                'Rating'=>'3',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'10',
                'Doctor_id'=>'3',
                'Comment'=>'Dobry specjalista, ale brakuje dobrej komunikacji z pacjentem.',
                'Rating'=>'3.5',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'7',
                'Doctor_id'=>'4',
                'Comment'=>'Świetny lekarz, wszystko zostało dokładnie wyjaśnione.',
                'Rating'=>'5',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'12',
                'Doctor_id'=>'4',
                'Comment'=>'Kompetentny, zaangażowany lekarz. Ze spokojem wszystko wyjaśnił.',
                'Rating'=>'4.5',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'7',
                'Doctor_id'=>'5',
                'Comment'=>'Niezwykle sympatyczny lekarz, który rzeczywiście słucha, co pacjent ma do powiedzenia. Dokładna diagnostyka i wytłumaczenie. Szczerze polecam.',
                'Rating'=>'5',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
        DB::table('ratings')->insert(
            [
                'User_id'=>'8',
                'Doctor_id'=>'5',
                'Comment'=>'Skuteczna wizyta, ale za szybko została zakończona. Nie mogłem zadać własnych pytań. Chyba trafiłem na gorszy dzień.',
                'Rating'=>'3.5',
                'updated_at'=>'2021-12-06',
                'created_at'=>'2021-11-24'
            ]);
    }
}
