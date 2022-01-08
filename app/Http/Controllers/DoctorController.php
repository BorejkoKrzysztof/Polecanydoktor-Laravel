<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\MedicalSpeciality;
use App\Models\Surgery;
use App\Models\BuisnessHours;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;

class DoctorController extends Controller
{
    //

    public function DashboardHandle(Request $request)
    {
            $userInfo = User::where('Email', '=', $request->session()->get('userEmail'))->first();

            if ($userInfo->updated_info == false)
            {
                $request->session()->put('notUpdated', 'true');

                return redirect()->to('dashboard/doctor/editprofile');
            }
            else
            {
                return redirect()->to('dashboard/doctor');
            }
    }

    public function Dashboard(Request $request)
    {
        // return $request;
         if(Session::has('role') and Session::get('role') == '3')
         {
            $user = User::where('Email', '=', $request->session()->get('userEmail'))->first();
            return View('Dashboard/Doctor/doctorDashboard', compact('user'));
         }
         return View('Forbidden');
     }
    
    public function Visits(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '3')
        {
            $sessionEmail = $request->session()->get('userEmail');
            $userId = User::where('Email', "{$sessionEmail}")->first()->Id;
            $mytime = Carbon::today()->todateString();

            $userVisits = DB::table('visits')
                        ->join('doctors', 'visits.Doctor_id', '=', 'doctors.Id')
                        ->join('users', 'visits.User_id', '=', 'users.Id')
                        ->join('surgery', 'doctors.Id', '=', 'surgery.Doctor_id')
                        ->select('visits.Visit_time', 'visits.Visit_date', 'users.First_name', 'users.Last_name', 'surgery.Institution_name', 'surgery.Street', 'surgery.Building_number', 'surgery.City', 'surgery.Postal_code')
                        ->orderby('visits.Visit_date')
                        ->get();      
            
            return View('Dashboard/Doctor/myVisitsDoctor', compact('userVisits'));
        }
        return View('Forbidden');
    }

    public function EditProfile(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '3')
        {
            return View('Dashboard/Doctor/doctorDashboardEditProfile');
        }
        return View('Forbidden');
    }

    public function EditProfileProcess(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '3')
        {
        $validator = Validator::make($request->all(), [
            'First_name'=>'required',
            'Last_name'=>'required',
            'Plec'=>'required',
            'birthday'=>'required',
            'Photo' => 'image | mimes:jpg,png,jpeg',
            'Price' => 'required',
            'NFZ' => 'required',
            'Speciality' => 'required',
            'Instytution_name' => 'required',
            'Street' => 'required',
            'Building_number' => 'required',
            'Postal_code' => 'required',
            'City' => 'required'
        ],
        [
            'First_name.required' => 'Pole Imie jest wymagane',
            'Last_name.required' => 'Pole Nazwisko jest wymagane',
            'Plec.required' => 'Pole Płeć jest wymagane',
            'birthday.required' => 'Pole Data Urodzin jest wymagane',
            'Photo.image' => 'Plik powinien być obrazem',
            'Photo.mimes' => 'Plik powinien być w formacie:jpg,png,jpeg',
            'Price.required' => 'Cena za godzinę jest wymagana',
            'NFZ.required' => 'To pole jest wymagane',
            'Speciality.required' => 'Musisz wybrać swoją specjalizację',
            'Instytution_name.required' => 'Podaj nazwę jednostki, w której pracujesz',
            'Street.required' => 'Pełny adres jest wymagany',
            'Building_number.required' => 'Pełny adres jest wymagany',
            'Postal_code.required' => 'Pełny adres jest wymagany',
            'City.required' => 'Pełny adres jest wymagany',
            'Description.required' => 'Opis działalności jest wymagany'
        ]);

        if ($validator->fails())
        {
            return redirect()->to('dashboard/doctor/editprofile')->withErrors($validator, 'editError');
        }

         $userEmail = $request->session()->get('userEmail');

         User::where('Email', "{$userEmail}")->update(["First_name"=>"{$request->First_name}",
                                                       "Last_name"=>"{$request->Last_name}",
                                                       "Sex"=>"{$request->Plec}",
                                                       "Birthday"=>"{$request->birthday}",
                                                       "updated_info"=> 1]);

        $id = User::where('Email', '=', "{$userEmail}")->first()->Id; // Czy powinno byc insert?
        Doctor::create([
            "User_id"=>"{$id}",
            "Price_hour"=>"{$request->Price}",
            "NFZ_collaboration" => "{$request->NFZ}",
            "Description" => "{$request->Description}"
        ]);

        $doctorId = Doctor::where('User_id', '=', "{$id}")->first()->Id;
        MedicalSpeciality::create([
            'Doctor_id' => "{$doctorId}",
            'Medical_Speciality_id' => "{$request->Speciality}"
        ]);

        Surgery::create([
            'Doctor_id' => "{$doctorId}",
            'Institution_name' => "{$request->Instytution_name}",
            'Street' => "{$request->Street}",
            'Building_number' => "$Building_number",
            'City' => "{$request->City}",
            'Postal_code' => "{$Postal_code}"
        ]);

        //Monday
        BuissnesHours::create([
            'Doctor_id' => "{$doctorId}",
            'Day' => 1,
            'Open_hour' => "{$request->MonOpen}",
            'Close_hour' => "{$request->MonClose}"
        ]);

        //Tuesday
        BuissnesHours::create([
            'Doctor_id' => "{$doctorId}",
            'Day' => 2,
            'Open_hour' => "{$request->TueOpen}",
            'Close_hour' => "{$request->TueClose}"
        ]);
        //Wednesday
        BuissnesHours::create([
            'Doctor_id' => "{$doctorId}",
            'Day' => 3,
            'Open_hour' => "{$request->WedOpen}",
            'Close_hour' => "{$request->WedClose}"
        ]);
        //Thursday
        BuissnesHours::create([
            'Doctor_id' => "{$doctorId}",
            'Day' => 4,
            'Open_hour' => "{$request->ThuOpen}",
            'Close_hour' => "{$request->ThuClose}"
        ]);
        //Friday
        BuissnesHours::create([
            'Doctor_id' => "{$doctorId}",
            'Day' => 5,
            'Open_hour' => "{$request->FriOpen}",
            'Close_hour' => "{$request->FriClose}"
        ]);
        //Saturday
        BuissnesHours::create([
            'Doctor_id' => "{$doctorId}",
            'Day' => 6,
            'Open_hour' => "{$request->SatOpen}",
            'Close_hour' => "{$request->SatClose}"
        ]);
        //Sunday
        BuissnesHours::create([
            'Doctor_id' => "{$doctorId}",
            'Day' => 7,
            'Open_hour' => "{$request->SunOpen}",
            'Close_hour' => "{$request->SunClose}"
        ]);

        if(!is_null($request->Photo))
        {
            $strid = strval($id);
            $file = $request->file('Photo');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $path = public_path()."/images/".$strid."/";
            if (! File::exists($path)) {
                File::makeDirectory($path);
            }
            $file->move($path, $filename);

            User::where('Email', "{$userEmail}")->update(["Image_path"=>"{$path}"."{$filename}"]);
        }

         $request->session()->forget('notUpdated');



        return redirect()->to('dashboard/doctor/handle');
    }
    return View('Forbidden');
    }
}
