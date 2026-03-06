<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class CustomerController extends Controller
{
    public function index()
    {
       $customers = Customer::with('user')->get();
       //simplePaginate(3);
        return view('dashboard.customers',[
       'customers'=> $customers]);
    }
    public function create()
    {
         return view('customer.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' =>['required'],
            'email'=> ['required', 'email'],
            'address'=>['required'],
            'password'=>['required', Password::min(6)],
            'mobile'=>['required'],
            'national_id'=>['required'],
        ]);
        

        $attributes['user_id'] = Auth::user()->id;

        $user = User::create($attributes);
        Customer::create([
            'user_id'=>$user->id,
        ]);
        
        return redirect('/dashboard/customers');
    }

    public function show(Customer $customer)
    {
        return view('customer.show',['customer' => $customer]);
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit',['customer' => $customer]);
    }

    public function update(Request $request,Customer $customer)
    {
       $attributes = $request->validate([
            'name' =>['required'],
            'email'=> ['required', 'email'],
            'address'=>['required'],
            'password'=>['required', Password::min(6)],
            'mobile'=>['required'],
            'national_id'=>['required'],
        ]); 
        $attributes['user_id'] = Auth::user()->id;

        $customer->user->update([
         'name' => $attributes['name'],
         'email' => $attributes['email'],
         'address' => $attributes['address'],
         'password' => $attributes['password'],
         'mobile' => $attributes['mobile'],
         'national_id' => $attributes['national_id'],
      
      ]);

      return redirect('/dashboard/customers');

    }
     public function destroy(Customer $customer)
    {
       $customer->delete();
       return redirect('/dashboard/customers');
    }
    public function makeDelivery()
   {
       
        return view('auth.login');
    }
    
}