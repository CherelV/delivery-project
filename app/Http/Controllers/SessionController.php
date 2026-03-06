<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller


{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            session (
                ["userID" => $user->id,
                "name" => $user->name
                ]
            );

            // Load the relationships (optional, but can be more efficient if you are going to use them)
            $user->load('customer', 'deliveryMan');

            // Check if the user has a customer record
            if ($user->customer) {
                $customer = $user->customer->id;
            
                return redirect()->route('custpage', ['customer' => $customer]);
            }
           
             elseif ($user->deliveryMan) {
               
            //     print_r($user->deliveryMan);
            // exit;
                 $deliveryManId = $user->deliveryMan->id;
                 print_r($deliveryManId);

                return redirect()->route('dManpage', ['deliveryManId' => $deliveryManId]);
                //view('landing.landDelivery');
                
            } else {
                return redirect('/dashboard/page');
            }
        }

        return back()->withErrors([
            'email' => 'The credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function destroy()
    {
        Auth::logout();
         request()->session()->invalidate(); // Invalidates the current session
        request()->session()->regenerateToken();
        return redirect('/login');
    }
   //public function check()
   //{
   //    $credentials = request()->validate([
   //        'email' => ['required', 'email'],
   //        'password' => ['required'],
   //    ]);
   //    $customer = Customer::where('email', $credentials['eamil'])->first();

   //    if($customer && Hash::check($credentials['password'], $customer->password)){
   //        Auth::login($customer);
   //        request()->session()->regenerate();
   //        return view('delivery.create');
   //    }
   // //   if (Auth::attempt($credentials)) {
   // //       request()->session()->regenerate();
   // //       return view('delivery.create');
   // //       //redirect()->intended('/delivery-list/create');
   // //   }

   //    return back()->withErrors([
   //        'email' => 'The credentials do not match our customers records.',
   //    ])->onlyInput('email');
   //}
}
