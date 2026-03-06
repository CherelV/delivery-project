<?php
// app/Http/Controllers/CustomerAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\DeliveryMan;
use App\Models\Delivery;
use App\Models\Customer;


class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            
            // Store customer ID in session for later use
            session(['customer_id' => Auth::guard('customer')->id()]);
            
            // Redirect to intended page or default
            return redirect(session('redirect_after_login', route('customer.schedule')));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('landing.page.home');
    }

    public function index()
    {
        // Get customer ID from session
        $customerId = session('customer_id');
        
        // Fetch customer details
        $customer = Customer::find($customerId);
        
        // Fetch his schedules
        $schedules = Delivery::where('customer_id', $customerId)->get();
        
        return view('customer.schedule', [
            'customer' => $customer,
            'schedules' => $schedules
        ]);
    }
}