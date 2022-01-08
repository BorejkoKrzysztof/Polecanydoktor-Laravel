<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //

    public function DashboardHandle(Request $request)
    {
         $userInfo = User::where('Email', '=', $request->session()->get('userEmail'))->first();

        if ($userInfo->updated_info == false)
        {
             $request->session()->put('notUpdated', 'true');

            return redirect()->to('dashboard/admin/editprofile');
        }
        else
        {
            return redirect()->to('dashboard/admin');
        }
    }

    public function Dashboard(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '1')
        {
            $user = User::where('Email', '=', $request->session()->get('userEmail'))->first();
            
            return View('Dashboard/adminDashboard', compact('user'));
        }
        return View('Forbidden');
    }

    public function Makeadmin(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '1')
        {
            $users = User::where("Role_id", '2')
            ->select('Id', 'Email', 'First_name', 'Last_name')
            ->get();

            return View('Dashboard/makeadmin', compact('users'));
        }
        return View('Forbidden');
    }

    public function MakeAdminProcess($id, Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '1')
        {
            User::where('Id', $id)->update(["Role_id" => '1']);

            return redirect()->to('dashboard/admin/makeadmin');
        }
        return View('Forbidden');
    }

    public function EditProfile(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '1')
        {
            return View('Dashboard/adminDashboardEdit');
        }
        return View('Forbidden');
    }

    public function EditProfileProcess(Request $request)
    {
        if($request->session()->has('role') && $request->session()->get('role') == '1')
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
