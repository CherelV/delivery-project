<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\error;

class DeliveryManController extends Controller
{
   public function index()
   {
       $delivery_men = DeliveryMan::all();
       //simplePaginate(3);
        return view('dashboard.deliveryMan',[
       'delivery_men'=> $delivery_men]);
   }
   public function create()
   {
      return view('deliveryman.create');
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
         'license_number'=>['required'],
         'license_class'=>['required'],
         'vehicle_type'=>['required'],
         'number_plate'=>['required'],
      ]);
      
      $attributes['user_id'] = Auth::user()->id;

      $user = User::create($attributes);
      DeliveryMan::create([
         'user_id'=>$user->id,
         'license_number' => $attributes['license_number'],
         'license_class' => $attributes['license_class'],
         'vehicle_type' => $attributes['vehicle_type'],
         'number_plate' => $attributes['number_plate'],
      ]);
       return redirect('/dashboard/delivery-man');
   }

   public function show(DeliveryMan $delivery_man)
   {
      return view('deliveryman.show',[ 'delivery_man'=> $delivery_man]);
   }

   public function edit(DeliveryMan $delivery_man)
   {
      return view('deliveryman.edit', [ 'delivery_man'=> $delivery_man]);
   }

   public function update(Request $request, DeliveryMan $delivery_man)
   {

      $attributes = $request->validate([
         'name' =>['required'],
         'email'=> ['required', 'email'],
         'address'=>['required'],
         'password'=>['required', Password::min(6)],
         'mobile'=>['required'],
         'national_id'=>['required'],
         'license_number'=>['required'],
         'license_class'=>['required'],
         'vehicle_type'=>['required'],
         'number_plate'=>['required'],
      ]);
   
      $attributes['user_id'] = Auth::user()->id;

      $delivery_man->user->update([
         'name' => $attributes['name'],
         'email' => $attributes['email'],
         'address' => $attributes['address'],
         'password' => $attributes['password'],
         'mobile' => $attributes['mobile'],
         'national_id' => $attributes['national_id'],
      
      ]);
      $delivery_man->update([
         
         'license_number' => $attributes['license_number'],
         'license_class' => $attributes['license_class'],
         'vehicle_type' => $attributes['vehicle_type'],
         'number_plate' => $attributes['number_plate'],
         
     
      ]);
       return redirect('/dashboard/delivery-man');
   }

   public function destroy(DeliveryMan $delivery_man)
   {
      $delivery_man->delete();
      return redirect('/dashboard/delivery-man');

   }
 
   
}

