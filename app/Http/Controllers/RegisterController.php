<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Cookie;

class RegisterController extends Controller
{
    //
    public function Register()
    {
        return View('Login/register');
    }
    
    public function CreateUser(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'Email'=>'required | email',
            'Password'=>'required_with:ConfirmPassword | min:5 | max:18',
            'ConfirmPassword'=>'min:5 | max:18 | same:Password'
        ],
        [
            'Email.required' => 'Pole Email jest wymagane',
            'Email.email' => 'Pole Email musi być poprawnym adresem Email',
            'Password.required_with' => 'Pole hasło jest wymagane razem z potwierdzeniem hasła',
            'ConfirmPassword.same' => 'Pola Hasło i Potwierdź hasło muszą być takie same',
            'Password.min' => 'Pole Hasło musi posiadać min. 5 znaków',
            'Password.max' => 'Pole Hasło może posiadać maks. 18 znaków',
            'ConfirmPassword.min' => 'Pole Potwierdź hasło musi posiadać min. 5 znaków',
            'ConfirmPassword.max' => 'Pole Potwierdź hasło może posiadać maks. 18 znaków'
        ]);

        if ($validator->fails())
        {
            return redirect('/login/register')->withErrors($validator, 'userError');
        }
            $user = User::create([
                'Email' => $req->Email,
                'Password' => $req->Password,
                'Role_id' => 2,
            ]);

            auth()->login($user);

              $req->session()->put('role', "{$user->Role_id}");
              $req->session()->put('logged', "yes");
              $req->session()->put('userEmail', "{$user->Email}");


            return redirect('dashboard/user/handle');
    }
    

    public function CreateDoctor(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'DoctorEmail'=>'required | email',
            'DoctorPassword'=>'required_with:DoctorConfirmPassword | min:5 | max:18',
            'DoctorConfirmPassword'=>'min:5 | max:18 | same:DoctorPassword'
        ],
        [
            'DoctorEmail.required' => 'Pole Email jest wymagane',
            'DoctorEmail.email' => 'Pole Email musi być poprawnym adresem Email',
            'DoctorPassword.required_with' => 'Pole hasło jest wymagane razem z potwierdzeniem hasła',
            'DoctorConfirmPassword.same' => 'Pola Hasło i Potwierdź hasło muszą być takie same',
            'DoctorPassword.min' => 'Pole Hasło musi posiadać min. 5 znaków',
            'DoctorPassword.max' => 'Pole Hasło może posiadać maks. 18 znaków',
            'DoctorConfirmPassword.min' => 'Pole Potwierdź hasło musi posiadać min. 5 znaków',
            'DoctorConfirmPassword.max' => 'Pole Potwierdź hasło może posiadać maks. 18 znaków'
        ]);

        if ($validator->fails())
        {
            return redirect('/login/register')->withErrors($validator, 'doctorError');
        }

        $user = User::create([
            'Email' => $req->DoctorEmail,
            'Password' => $req->DoctorPassword,
            'Role_id' => 3,
        ]);

        auth()->login($user);

         $req->session()->put('role', "{$user->Role_id}");
         $req->session()->put('logged', "yes");
         $req->session()->put('userEmail', "{$user->Email}");

        return redirect('dashboard/doctor/editprofile');
    }
}
