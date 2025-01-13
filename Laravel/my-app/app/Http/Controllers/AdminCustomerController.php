<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(5);
        return view('viewcustomer', compact('customers'));
    }

    // Search Function for customers
    public function search(Request $request)
    {
        $search = $request->get('search');
        $query = Customer::query();
        $query->whereAny(['name', 'address', 'phone', 'email'], 'LIKE', "%$search%");
        $customers = $query->paginate(10);
        return view('viewcustomer', compact('customers'));
    }

}
