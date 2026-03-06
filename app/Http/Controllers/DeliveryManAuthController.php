<?php
// app/Http/Controllers/DeliveryManAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;  // Add this
use App\Models\DeliveryMan;
use App\Models\Delivery;

class DeliveryManAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.deliveryManLogin');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // First, authenticate against the users table
        if (Auth::attempt($credentials)) {
            // User authenticated successfully
            $user = Auth::user();
            
            // Check if this user is a delivery man
            $deliveryMan = DeliveryMan::where('user_id', $user->id)->first();
            
            if ($deliveryMan) {
                // User is a delivery man - log them into delivery guard
                // Log in the DeliveryMan model instance into the deliveryMan guard
                Auth::guard('deliveryMan')->login($deliveryMan);
                
                // Store delivery man ID in session
                session(['delivery_man_id' => $deliveryMan->id]);
                session(['user_id' => $user->id]);
                
                // Regenerate session
                $request->session()->regenerate();
                
                // Redirect to deliveries page
                return redirect()->intended(route('deliveryMan.my-deliveries'));
            } else {
                // User exists but is not a delivery man
                Auth::logout(); // Log them out from user guard
                return back()->withErrors([
                    'email' => 'This account is not registered as a delivery man.',
                ])->onlyInput('email');
            }
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('deliveryMan')->logout();
        Auth::logout(); // Also logout from user guard
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('landing.page.home');
    }
    
    public function index()
    {
        // Get the authenticated DeliveryMan (guard returns DeliveryMan model)
        $deliveryMan = Auth::guard('deliveryMan')->user();

        if (!$deliveryMan) {
            return redirect()->route('deliveryMan.login')
                ->withErrors(['error' => 'Please login first.']);
        }

        // Load related User for display (if needed)
        $user = User::find($deliveryMan->user_id);

        // Fetch deliveries using delivery_man id
        $deliveries = Delivery::where('delivery_man_id', $deliveryMan->id)->get();

        return view('landing.landDelivery', [
            'deliveryMan' => $deliveryMan,
            'user' => $user,
            'deliveries' => $deliveries
        ]);
    }
}