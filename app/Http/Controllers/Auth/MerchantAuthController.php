    <?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Merchant;

class MerchantAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.merchant-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('merchant')->attempt($credentials)) {
            return redirect()->intended('/merchan/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.'
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.merchant-register');
    }

    // Handle the registration request
    public function register(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new merchant
        $merchant = Merchant::create([
            'company_name' => $validatedData['company_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Log the merchant in after registration
        Auth::guard('merchant')->login($merchant); // or 'merchant'

        // Redirect to the merchant dashboard (or wherever you want)
        return redirect()->route('merchant.dashboard');
    }
}
