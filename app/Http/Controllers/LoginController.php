<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function Index()
    {
        return View('Login/index');
    }

    public function Check(Request $request)
    {
        $userInfo = User::where('Email', '=', $request->email)->first();

        if(!$userInfo)
        {
            return back()->with('fail', 'Niepoprawny login lub Hasło');
        }
        else{
            if(Hash::check($request->password, $userInfo->Password))
            {
                 $request->session()->put('role', "{$userInfo->Role_id}");
                 $request->session()->put('logged', "yes");
                 $request->session()->put('userEmail', "{$userInfo->Email}");
                
                if ($request->session()->has('registerTO'))
                {
                    $path = $request->session()->get('registerTO');

                    $request->session()->forget('registerTO');
                    return redirect()->to($path);
                }
                switch ($userInfo->Role_id) {
                    case 1:
                        return redirect()->to('dashboard/admin/handle');
                        break;
                    case 2:
                        return redirect()->to('dashboard/user/handle');
                        break;
                    case 3:
                        return redirect()->to('dashboard/doctor/handle');
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
            else{
                return back()->with('fail', 'Niepoprawny login lub Hasło');
            }
        }
    }
    
    public function Destroy(Request $request)
    {
         $request->session()->forget('role');
         $request->session()->forget('logged');
         $request->session()->forget('userEmail');
         $request->session()->flash('loggedout');

        return redirect()->to('/');
    }


    public function CheckRole(Request $request)
    {
         $role = $request->session()->get('role');
        

        switch ($role) {
            case 1:
                return redirect()->to('dashboard/admin');
                break;
            case 2:
                return redirect()->to('dashboard/user');
                break;
            case 3:
                return redirect()->to('dashboard/doctor');
                break;
            
            default:
                # code...
                break;
        }
    }

    public function RemoveProfile(Request $request)  // See on editprofile Page
    {
        if($request->session()->has('role'))
        {
            return View('Dashboard/deletingAccount');
        }
        return View('Forbidden');
    }

    public function RemoveProfileProces(Request $request)
    {
        $userEmail = $request->session()->get('userEmail');
        User::where("Email", "{$userEmail}")->delete();

        $request->session()->forget('role');
        $request->session()->forget('logged');
        $request->session()->forget('userEmail');
        $request->session()->flash('loggedout');

        return redirect()->to('/');
    }
}
