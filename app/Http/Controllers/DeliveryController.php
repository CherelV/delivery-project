<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Customer;
use App\Models\DeliveryMan;
use App\Models\User;
use App\Models\Quarter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index()
   {
       $deliveries = Delivery::with(['customer', 'deliveryMan','quarter','departureAddress','destinationAddress'])->get();
       //simplePaginate(3);
       
        return view('dashboard.deliveryList',[
       'deliveries'=> $deliveries]);
    }
    public function create()
{
         $customers = Customer::all();
         $delivery_men = DeliveryMan::all();
         $quarters= Quarter::all();

    return view('delivery.create', compact('customers', 'delivery_men','quarters'));

   }
   public function store(Request $request)
   { 
        $attributes = $request->validate([
        'customer_id' =>['required','exists:customers,id'],
        'delivery_man_id' =>['required','exists:delivery_men,id'],
        'departure_address_id'=>['required','exists:quarters,id'],
        'destination_address_id'=>['required','exists:quarters,id'],
        'fee'=>['required'],
        'status'=>['required'],
        'item_description'=>['required'],
        'delivered_on'=>['required'],
      ]); 
    
        Delivery::create($attributes);
    
   return redirect('/dashboard/delivery-list');
    }

    public function show(Delivery $delivery)
    {
        return view('delivery.show',[ 'delivery'=> $delivery]);
    }

    public function edit(Delivery $delivery)
    {
        $customers = Customer::all();
        $delivery_men = DeliveryMan::all();
        $quarters= Quarter::all();
        return view('delivery.edit', ['delivery'=> $delivery], compact('customers', 'delivery_men','quarters')); 
    }

    public function update(Request $request, Delivery $delivery)
    {
        
        $attributes = $request->validate([
        'customer_id' =>['required','exists:customers,id'],
        'delivery_man_id' =>['required','exists:delivery_men,id'],
        'departure_address_id'=>['required','exists:quarters,id'],
        'destination_address_id'=>['required','exists:quarters,id'],
        'fee'=>['required'],
        'status'=>['required'],
        'item_description'=>['required'],
        'delivered_on'=>['required'],
        ]);
        $delivery->update([
            'customer_id'=>$attributes['customer_id'],
            'delivery_man_id'=>$attributes['delivery_man_id'],
            'departure_address_id'=>$attributes['departure_address_id'],
            'destination_address_id'=>$attributes['destination_address_id'],
            'fee'=>$attributes['fee'],
            'status'=>$attributes['status'],
            'item_description'=>$attributes['item_description'],
            'delivered_on'=>$attributes['delivered_on'],
        ]);
         return redirect('/dashboard/delivery-list');
        //return view('dashboard.deliveryList');
    }
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect(('/dashboard/delivery-list'));
    }



    public function index1()
   { 
       
        return view('landing.landDelivery');
    }
    public function index2()
   {  $delivery_men = DeliveryMan::all();
        $delivery_men = DeliveryMan::all();
        $user = User::all();
       $deliveries = Delivery::with(['customer', 'deliveryMan','quarter','departureAddress','destinationAddress'])
       ->where('status', 'pending')
       ->get();
       //simplePaginate(3);
       
        return view('landing.landCustomer',
        ['deliveries'=> $deliveries], ['delivery_men'=> $delivery_men], ['user'=>$user]);
    }
    public function index3()
   {  $delivery_men = DeliveryMan::all();
        $user = User::all();
       $deliveries = Delivery::with(['customer', 'deliveryMan','quarter','departureAddress','destinationAddress'])
       ->where('status', 'pending')
       ->get();
       //simplePaginate(3);
       
        return view('landing.landDelivery',
        ['deliveries'=> $deliveries], ['delivery_men'=> $delivery_men], ['user'=>$user]);
    }
}
