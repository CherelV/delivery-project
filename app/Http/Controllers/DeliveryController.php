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
        dd($request->all());
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
    public function index2($customerId)
   {  $customers = Customer::all();
        $user = User::all();

        $customer = Customer::with('user')
        ->where('id', $customerId)
        ->first();

       $allDeliveries = Delivery::with(['customer', 'deliveryMan','quarter','departureAddress','destinationAddress'])
       ->where('customer_id', $customerId)
            ->orderByRaw("
                CASE 
                    WHEN status = 'pending' THEN 1
                    WHEN status = 'completed' THEN 2
                    WHEN status = 'canceled' THEN 3
                    ELSE 4
                END
            ")
            ->orderBy('created_at', 'desc')
            ->get();
       //simplePaginate(3);
       
        // Simple counts by status
        $pendingCount = $allDeliveries->where('status', 'pending')->count();
        $completedCount = $allDeliveries->where('status', 'completed')->count();
        $canceledCount = $allDeliveries->where('status', 'canceled')->count();

        return view('landing.landCustomer',compact(
        'customers',
        'user',
        'customer',
        'allDeliveries',
        'pendingCount',
        'completedCount',
        'canceledCount'));
    }
    public function index3($deliveryManId)
   {  $delivery_men = DeliveryMan::all();
        $user = User::all();

        $deliveryMan = DeliveryMan::with('user')
        ->where('id', $deliveryManId)
        ->first();

       $allDeliveries = Delivery::with(['customer', 'deliveryMan','quarter','departureAddress','destinationAddress'])
       ->where('delivery_man_id', $deliveryManId)
            ->orderByRaw("
                CASE 
                    WHEN status = 'pending' THEN 1
                    WHEN status = 'completed' THEN 2
                    WHEN status = 'canceled' THEN 3
                    ELSE 4
                END
            ")
            ->orderBy('created_at', 'desc')
            ->get();

       //simplePaginate(3);
        
        // Simple counts by status
        $pendingCount = $allDeliveries->where('status', 'pending')->count();
        $completedCount = $allDeliveries->where('status', 'completed')->count();
        $canceledCount = $allDeliveries->where('status', 'canceled')->count();

        // Return view with all data
       
        return view('landing.landDelivery', compact(
        'delivery_men',
        'user',
        'deliveryMan',
        'allDeliveries',
        'pendingCount',
        'completedCount',
        'canceledCount'
    ));

}
  public function createDelivery($customerId)
{
         $customers = Customer::all();
         $delivery_men = DeliveryMan::all();
         $quarters= Quarter::all();

        $customers = Customer::with('user')->get();

        $selectedDeliveryMan = DeliveryMan::with('user')
        ->withCount(['deliveries as pending_count' => function($query) {
            $query->where('status', 'pending');
        }])
        ->orderBy('pending_count', 'asc')
        ->first();

        $selectedCustomer = Customer::with('user')->find($customerId);

        if (!$selectedCustomer) {
        return redirect()->back()->with('error', 'Customer not found');
    }

        return view('delivery.createDelivery', compact(
            'customers', 
            'selectedDeliveryMan', 
            'selectedCustomer', 
            'quarters',
            'delivery_men'
        ));
   }

    public function storeDelivery(Request $request)
   { 
        $attributes = $request->validate([
        'customer_id' =>['required','exists:customers,id'],
        'delivery_man_id' =>['required','exists:delivery_men,id'],
        'departure_address_id'=>['required','exists:quarters,id'],
        'destination_address_id'=>['required','exists:quarters,id'],
        'fee'=>['required','numeric'],
        'status'=>['required'],
        'item_description'=>['required'],
        'delivered_on'=>['required'],
      ]); 
    
        Delivery::create($attributes);
    
   return redirect()->route('custpage', ['customerId' => $request->customer_id])
        ->with('success', 'Delivery created successfully!');
    }
}
