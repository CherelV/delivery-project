<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
       public function create( )
        {
           return view('auth.register');
        }

        public function store( )
        {
            $attributes= request()->validate([
            'name' =>['required'],
            'email'=> ['required', 'email'],
            'mobile'=>['required'],
            'address'=>['required'],
            'password'=>['required', Password::min(6), 'confirmed'] //confirmed is usde to check password_confimation
         ]);

        $user = User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'mobile'=> $attributes['mobile'],
            'address'=> $attributes['address'],
            'password' => Hash::make($attributes['password']),
        ]);

         Auth::login($user);

         return redirect('dashboard/page');
        }
   
}
