<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('/customer/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.'
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.customer-register');
    }

    // Handle the registration request
    public function register(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers', // Make sure to use the right table (users/customers)
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new customer or merchant based on the controller
        $customer = Customer::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Log the customer in
        Auth::guard('customer')->login($customer); // or 'merchant'

        // Redirect to the customer dashboard or other location
        return redirect()->route('customer.dashboard'); // Or merchant.dashboard
    }
}
