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
      
      //$attributes['user_id'] = Auth::user()->id;

      $user = User::create([
            'name'        => $attributes['name'],
            'email'       => $attributes['email'],
            'address'     => $attributes['address'],
            'password'    => bcrypt($attributes['password']),
            'mobile'      => $attributes['mobile'],
            'national_id' => $attributes['national_id'],
      ]);
      // return redirect()->route('landing.page.home');
       DeliveryMan::create([
            'user_id'        => $user->id,
            'license_number' => $attributes['license_number'],
            'license_class'  => $attributes['license_class'],
            'vehicle_type'   => $attributes['vehicle_type'],
            'number_plate'   => $attributes['number_plate'],
            'status'         => 'pending',
        ]);
      return redirect()->route('deliveryman.pending');
   }

   public function show(DeliveryMan $delivery_man)
   {
      return view('deliveryman.show',[ 'delivery_man'=> $delivery_man]);
   }

   public function edit(DeliveryMan $delivery_man)
   {
      // dd($delivery_man->user->national_id);
      //$delivery_man->load('user');
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
   
    //  $attributes['user_id'] = Auth::user()->id;

      $delivery_man->user->update([
         'name' => $attributes['name'],
         'email' => $attributes['email'],
         'address' => $attributes['address'],
         'password' => $attributes['password'],
         'mobile' => $attributes['mobile'],
         'national_id' => $attributes['national_id'],
         
      ]);

      if (!empty($attributes['password'])) {
        $delivery_man->user->update(['password' => bcrypt($attributes['password'])]);
    }

         $delivery_man->update([
            'license_number' => $attributes['license_number'],
            'license_class'  => $attributes['license_class'],
            'vehicle_type'   => $attributes['vehicle_type'],
            'number_plate'   => $attributes['number_plate'],
        ]);
        
       return redirect('/dashboard/delivery-man')->with('success',  'DeliveryMan has been Updated.');
   }

   public function destroy(DeliveryMan $delivery_man)
   {
      $delivery_man->delete();
      return redirect('/dashboard/delivery-man')->with('delete',  'DeliveryMan has been deleted.');

   }
   public function pending()
   {
      return view('deliveryman.pending');
   }
   public function approve(DeliveryMan $delivery_man)
   {
      $delivery_man->update(['status' => 'approved']);
      return redirect('/dashboard/delivery-man')->with('success', $delivery_man->user->name . ' has been approved.');
   }

   public function reject(DeliveryMan $delivery_man)
   {
      $delivery_man->update(['status' => 'rejected']);
      return redirect('/dashboard/delivery-man')->with('success', $delivery_man->user->name . ' has been rejected.');
   }
   
}

