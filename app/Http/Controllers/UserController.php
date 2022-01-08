<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visits;
use App\Models\Ratings;
use App\Models\Doctor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function DashboardHandle(Request $request)
    {
         $userInfo = User::where('Email', '=', $request->session()->get('userEmail'))->first();

        if ($userInfo->updated_info == false)
        {
             $request->session()->put('notUpdated', 'true');

            return redirect()->to('dashboard/user/editprofile');
        }
        else
        {
            return redirect()->to('dashboard/user');
        }
    }

    public function Dashboard(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '2')
        {
            $user = User::where('Email', '=', $request->session()->get('userEmail'))->first();
            return View('Dashboard/userDashboard', compact('user'));
        }
        return View('Forbidden');
    }


    public function Ratedoctor(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '2')
            {
                $sessionEmail = $request->session()->get('userEmail');
                $userId = User::where('Email', "{$sessionEmail}")->first()->Id;

                $usersDoctors = DB::table('visits')
                                ->join('doctors', 'visits.Doctor_id', '=', 'doctors.Id')
                                ->join('users', 'doctors.User_id', '=', 'users.Id')
                                ->select('visits.Id', 'users.First_name', 'users.Last_name', 'users.Image_path', 'doctors.Id')
                                ->where([
                                    ['visits.User_id', '=', "{$userId}"],
                                    ['visits.Rated', '=', 'false']])
                                ->get()
                                ->unique('users.Last_name');

                return View('rateDoctor', compact('usersDoctors'));
            }
        return View('Forbidden');
    }

    public function RateDoctorProcess($id, Request $request)
    {
    if($request->session()->has('role') && $request->session()->get('role') == '2')
        {

            $sessionEmail = $request->session()->get('userEmail');
            $userId = User::where('Email', "{$sessionEmail}")->first()->Id;

            Ratings::create([
                'User_id'=> $userId,
                'Doctor_id' => $id,
                'Comment' => $request->Comment,
                'Rating' => $request->Rate
            ]);

            Visits::where([
                ['User_id', '=', "{$userId}"],
                ['Doctor_id', '=', "{$id}"]
            ])->update(['Rated' => true]);

            $doctorRatingsAmount = Doctor::where('Id', "{$id}")->first()->Amount_ratings;
            $doctorRatingsAmount++;
            Doctor::where('Id', "{$id}")->update(['Amount_ratings' => $doctorRatingsAmount]);

            return redirect()->to('dashboard/user/ratedoctor');
        }
    return View('Forbidden');
    }

    public function Visits(Request $request)
    {
    if($request->session()->has('role') && $request->session()->get('role') == '2')
    {
        $sessionEmail = $request->session()->get('userEmail');
        $userId = User::where('Email', "{$sessionEmail}")->first()->Id;
        

        $mytime = Carbon::today()->todateString();

        $userVisits = DB::table('visits')
                    ->join('doctors', 'visits.Doctor_id', '=', 'doctors.Id')
                    ->join('users', 'doctors.User_id', '=', 'users.Id')
                    ->join('surgery', 'doctors.Id', '=', 'surgery.Doctor_id')
                    ->select('visits.Visit_time', 'visits.Visit_date', 'users.First_name', 'users.Last_name', 'surgery.Institution_name', 'surgery.Street', 'surgery.Building_number', 'surgery.City', 'surgery.Postal_code')
                    ->where([
                        ['visits.User_id', '=', "{$userId}"],
                        ['visits.Visit_date', '>=', "{$mytime}"]
                        ])
                    ->orderby('visits.Visit_date')
                    ->get();      
        
         return View('Dashboard/myVisits', compact('userVisits'));
        }
        return View('Forbidden');
    }

    public function EditProfile(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '2')
        {
            return View('Dashboard/userDashboardEdit');
        }
        return View('Forbidden');
    }

    public function EditProfileProcess(Request $request)
    {
    if($request->session()->has('role') && $request->session()->get('role') == '2')
    {
        $validator = Validator::make($request->all(), [
            'First_name'=>'required',
            'Last_name'=>'required',
            'Plec'=>'required',
            'birthday'=>'required',
            'Photo' => 'image | mimes:jpg,png,jpeg'
        ],
        [
            'First_name.required' => 'Pole Imie jest wymagane',
            'Last_name.required' => 'Pole Nazwisko jest wymagane',
            'Plec.required' => 'Pole Płeć jest wymagane',
            'birthday.required' => 'Pole Data Urodzin jest wymagane',
            'Photo.image' => 'Plik powinien być obrazem',
            'Photo.mimes' => 'Plik powinien być w formacie:jpg,png,jpeg'
        ]);

        if ($validator->fails())
        {
            return redirect()->to('dashboard/user/editprofile')->withErrors($validator, 'editError');
        }

         $userEmail = $request->session()->get('userEmail');

         User::where('Email', "{$userEmail}")->update(["First_name"=>"{$request->First_name}",
                                                       "Last_name"=>"{$request->Last_name}",
                                                       "Sex"=>"{$request->Plec}",
                                                       "Birthday"=>"{$request->birthday}",
                                                       "updated_info"=> 1]);

        if(!is_null($request->Photo))
        {
            $id = User::where('Email', '=', "{$userEmail}")->first()->Id;
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



        return redirect()->to('dashboard/user/handle');
    }
    return View('Forbidden');
    }
}
