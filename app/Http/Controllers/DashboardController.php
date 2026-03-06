<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Delivery;
use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function home(): View
    {
        
        return view('dashboard.layout');
    }

    public function dashboardPage(): View
    {
        $totalDeliveryMen = DeliveryMan::count();
        $totalCustomers = Customer::count();
        $totalDeliveries = Delivery::count();

        $pendingDeliveries = Delivery::where('status', 'pending')->count();
        $completedDeliveries = Delivery::where('status', 'completed')->count();
        $canceledDeliveries = Delivery::where('status', 'canceled')->count();

        return view('dashboard.dashboardPage', compact(
            'totalDeliveryMen',
            'totalCustomers',
            'totalDeliveries',
            'pendingDeliveries',
            'completedDeliveries',
            'canceledDeliveries'
        ));
    }

    public function deliveryList(): View 
    {
        return view('dashboard.deliveryList');
    }

    public function deliveryMan(): View 
    {
        return view('dashboard.deliveryMan');
    }

    public function customers(): View 
    {
        return view('dashboard.customers');
    }

    public function location(): View 
    {
        return view('dashboard.location');
    }


}
