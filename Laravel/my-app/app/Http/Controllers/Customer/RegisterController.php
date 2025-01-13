<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('customers.customerregister');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'username' => 'required',
            'password' => 'required|min:6',
            'phone' => 'required|max:12',
            'address' => 'required',
        ]);

        $customer = Customer::create($request->all());
        $customer->password = bcrypt($request->password);
        return redirect()->route('home')->with('success', 'Registration Successful');
    }

}
