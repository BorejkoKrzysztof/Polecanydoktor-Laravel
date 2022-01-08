<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visits;
use App\Models\User;
use DB;
use App\Http\Controllers\DatePeriod;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{
    public function Index()
    {
        return View("Home/index");
    }

    public function Search()
    {
        $doctorsInfo = DB::table('users')
                        ->join('doctors', 'doctors.User_id', '=', 'users.Id')
                        ->join('ratings', 'ratings.Doctor_id', '=', 'doctors.Id')
                        ->select('doctors.Id','users.Image_path AS img', 'users.First_name', 
                                 'users.Last_name', 'doctors.Description AS Description',
                                 'doctors.Amount_ratings')
                        ->get();


        foreach($doctorsInfo as $di){

            $ratings = DB::table('ratings')
                       ->where('Doctor_id', '=', $di->Id)
                       ->select(DB::raw('SUM(Rating) AS Rating'))
                       ->get();

            $di->sumOfRatings = $ratings->first()->Rating;
        }


        return View("Home/searchdoctor", compact('doctorsInfo'));
    }

    public function searchProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Od'=>'date',
            'Do'=>'after_or_equal:Od'
        ],
        [
            'Do.after_or_equal' => 'Data końcowa musi być późniejsza lub równa dacie początkowej',
        ]);

        if ($validator->fails())
        {
            return redirect()->to('home/search')->withErrors($validator, 'dateError');
        }

        $request->session()->flash('Od', $request->Od);
        $request->session()->flash('Do', $request->Do);

        $doctorsInfo = DB::table('users')
                        ->join('doctors', 'doctors.User_id', '=', 'users.Id')
                        ->join('ratings', 'ratings.Doctor_id', '=', 'doctors.Id')
                        ->join('surgery', 'surgery.Doctor_id', '=', 'doctors.Id')
                        ->join('medical_speciality', 'medical_speciality.Doctor_id', '=', 'doctors.Id')
                        ->join('medical_speciality_types', 'medical_speciality_types.Id', '=', 'medical_speciality.Medical_Speciality_id')
                        ->select('doctors.Id','users.Image_path AS img', 'users.First_name', 
                                 'users.Last_name', 'doctors.Description AS Description',
                                 'doctors.Amount_ratings', 'surgery.City', 'medical_speciality_types.Speciality_name')
                        ->get();
         if(!is_null($request->Specjalizacja)){
            $doctorsInfo = $doctorsInfo->where('Speciality_name', '=', $request->Specjalizacja);
        }

        if(!is_null($request->Miasto)){
            $doctorsInfo = $doctorsInfo->where('City', '=', $request->Miasto);
        }

        foreach($doctorsInfo as $di){

            $ratings = DB::table('ratings')
                       ->where('Doctor_id', '=', $di->Id)
                       ->select(DB::raw('SUM(Rating) AS Rating'))
                       ->get();

            $di->sumOfRatings = $ratings->first()->Rating;
        }


        return View("Home/searchdoctor", compact('doctorsInfo'));
    }

    public function Aboutus()
    {
        return View('Home/aboutUs');
    }

    public function DoctorProfile($id, Request $request)
    {
        $doctor = DB::table('users')
                        ->join('doctors', 'doctors.User_id', '=', 'users.Id')
                        ->join('surgery', 'surgery.Doctor_id', '=', 'doctors.Id')
                        ->join('ratings', 'ratings.Doctor_id', '=', 'doctors.Id')
                        ->join('medical_speciality', 'medical_speciality.Doctor_id', '=', 'doctors.Id')
                        ->join('medical_speciality_types', 'medical_speciality_types.Id', '=', 'medical_speciality.medical_speciality_id')
                        ->where('doctors.Id', '=', $id)
                        ->select('users.First_name', 'users.Last_name', 'users.Image_path AS img', 'doctors.Description',
                                    'doctors.Amount_ratings', 'surgery.Institution_name', 'surgery.Street',
                                    'surgery.Building_number', 'surgery.City', 'surgery.Postal_code',
                                    'medical_speciality_types.Speciality_name', 'doctors.Id')
                        ->get();

        $doctorRating = DB::table('ratings')
                            ->where('Doctor_id', '=', $id)
                            ->select(DB::raw('SUM(Rating) AS Rating'))
                            ->get();

        $doctorComments = DB::table('ratings')
                            ->where('Doctor_id', '=', $id)
                            ->select('Comment')
                            ->get();

        $doctor->first()->sumOfRatings = $doctorRating->first()->Rating;
        $doctor->first()->Comments = $doctorComments;

        $doctor = $doctor->first();

        if($request->session()->has('Od') && $request->session()->has('Do'))
        {
        $request->session()->flash('Od', $request->Od);
        $request->sesion()->flash('Do', $request->Do);
        }

        return View('Home/DoctorProfile', compact('doctor'));
    }

    public function RegisterVisit($id, Request $request)
    {
        $request->session()->put('startDate', $request->session()->get('Od'));
        $request->session()->put('endDate', $request->session()->get('Do'));

        if(!$request->session()->has('logged'))
        {
            $request->session()->put('registerTO', 'home/doctor/registervisit/'."{$id}");
            return redirect()->to('login');
        }
        else{
            $info = DB::table('users')
                    ->join('doctors', 'doctors.User_id', '=', 'users.Id')
                    ->where('doctors.Id', '=', $id)
                    ->select('users.First_name', 'users.Last_name', 'doctors.Id')
                    ->get()
                    ->first();

            $visits = DB::table('visits')
                    ->join('doctors', 'doctors.Id', '=', 'visits.Doctor_id')
                    ->select('visits.Visit_date', 'visits.Visit_time')
                    ->get();

                $numbers = array(10,20,30,40,50,0);
             if($request->session()->has('startDate'))
             {
                 $startDate = $request->session()->get('startDate');
                 $endDate = $request->session()->get('endDate');

                 $period = CarbonPeriod::create($startDate, $endDate)->toArray();

                 foreach($period as $date){
                    $date->setTime(rand(7,20), $numbers[rand(0,count($numbers)-1)], 0);
                 }
               
                $info->dates = $period;
             }
             else
             {
                $period = CarbonPeriod::create(Carbon::now(), Carbon::now()->addDays(10))->toArray();
                foreach($period as $date){
                    $date->setTime(rand(7,20), $numbers[rand(0,count($numbers)-1)], 0);
                }

                $info->dates = $period;
             }


            return View('Home/RegisterVisit', compact('info'));
        }
    }

    public function RegisterVisitProcess($id, Request $request)
    {
        $userEmail = $request->session()->get('userEmail');
                    
        $userId = $id = User::where('Email', '=', "{$userEmail}")->first()->Id;

        $doctorId = $id;
        $visitDatetimeVar = $request->visitDatetime;
        $visitDate = Carbon::parse($visitDatetimeVar)->format('Y-m-d');
        $visitTime = Carbon::parse($visitDatetimeVar)->format('H:i:s');
        
        Visits::create([
            'User_id' => "{$userId}",
            'Doctor_id' => "{$doctorId}",
            'Visit_time' => "{$visitTime}",
            'Visit_date' => "{$visitDate}"
        ]);

        return redirect()->to('/');
    }
}
