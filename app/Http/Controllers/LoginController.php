<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
    public function registration()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }

        return view('auth.register', ["title" => "Create an account"]);
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
            'user_type' => 'required|in:vendor,reviewer'

        ]);

        $data = $request->all();

        $user = $this->create($data);

        if($user) {
            if($user->user_type == 'vendor') {
                $user->assignRole('vendor');
            } else {
                $user->assignRole('reviewer');
            }
        }

        event(new Registered($user));

        return redirect("login")->with('msg', '<p>Please confirm your email to complete the sign up process. </p> <p>We have emailed you a verification</p> <p>Thank you</p> <p>Team Scorng</p>');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'user_type' => $data['user_type'],
        'password' => Hash::make($data['password'])
      ]);
    }
}