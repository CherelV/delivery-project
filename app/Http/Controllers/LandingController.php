<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Delivery;
use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }

     public function home(): View
    {
        
        return view('landing.landingPage');
    }
     public function schedule(): View
    {
        
        return view('landing.landCustomer');
    }
     public function myDeliveries(): View
    {
        
        return view('landing.landDelivery');
    }


    public function index($deliveryManId)
    {
        $user = Auth::user();
        
        // Get the delivery man from the database
        $deliveryMan = DeliveryMan::find($deliveryManId);
        
        // If delivery man doesn't exist
        if (!$deliveryMan) {
            return view('landing.access-denied', [
                'message' => 'Delivery man not found.',
                'userType' => 'unknown'
            ]);
        }
        
        // Check if the logged-in user is the owner of this delivery man profile
        $isOwner = $user->id === $deliveryMan->user_id;
        
        // Check user type
        if ($user->customer) {
            // Customer trying to access delivery man page - show error
            return view('landing.access-denied', [
                'message' => 'This page is reserved for delivery personnel only.',
                'userType' => 'customer'
            ]);
        }
        
        if ($user->deliveryMan && $isOwner) {
            // Valid delivery man accessing their own page
            $deliveries = Delivery::where('delivery_man_id', $deliveryManId)
                ->orderBy('created_at', 'desc')
                ->get();
            
            return view('landing.landDelivery', compact('deliveryMan', 'deliveries'));
        }
        
        // User is neither the owner nor a delivery man (or trying to access someone else's page)
        if ($user->deliveryMan && !$isOwner) {
            return view('landing.access-denied', [
                'message' => 'You can only access your own delivery dashboard.',
                'userType' => 'delivery_man'
            ]);
        }
        
        // Admin or other user types
        return view('landing.access-denied', [
            'message' => 'Access denied. This area is for delivery personnel only.',
            'userType' => 'other'
        ]);
    }
    
    // Alternative: Simple version without checking ownership
 // public function simpleIndex($deliveryManId)
 // {
 //     $user = Auth::user();
 //     
 //     // Check if user is a delivery man
 //     if ($user->deliveryMan) {
 //         // Get the delivery man
 //         $deliveryMan = DeliveryMan::findOrFail($deliveryManId);
 //         
 //         // Get deliveries
 //         $deliveries = Delivery::where('delivery_man_id', $deliveryManId)
 //             ->orderBy('created_at', 'desc')
 //             ->get();
 //         
 //         return view('landing.landDelivery', compact('deliveryMan', 'deliveries'));
 //     }
 //     
 //     // User is not a delivery man
 //     if ($user->customer) {
 //         return view('landing.access-denied', [
 //             'message' => 'This page is reserved for delivery personnel only. Customers should use the customer dashboard.',
 //             'userType' => 'customer',
 //             'redirectUrl' => route('delivery-list.create')
 //         ]);
 //     }
 //     
 //     // Other users (admin, staff, etc.)
 //     return view('landing.access-denied', [
 //         'message' => 'Access restricted to delivery personnel.',
 //         'userType' => 'other',
 //         'redirectUrl' => url('/dashboard/page')
 //     ]);
 // }
    
  //// Alternative: Middleware-based approach (recommended)
  //public function middlewareIndex($deliveryManId)
  //{
  //    // This assumes you have middleware that checks if user is a delivery man
  //    $deliveryMan = DeliveryMan::findOrFail($deliveryManId);
  //    
  //    // Get deliveries
  //    $deliveries = Delivery::where('delivery_man_id', $deliveryManId)
  //        ->orderBy('created_at', 'desc')
  //        ->get();
  //    
  //    return view('landing.landDelivery', compact('deliveryMan', 'deliveries'));
  //}

}