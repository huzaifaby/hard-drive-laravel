<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;


class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            session()->put('user_id', Auth::guard('customer')->user()->id);
            return redirect()->intended('user/dashboard');
        }
        return redirect()->back()->withInput($request->only('email'))->with('error', 'Invalid Email or Password');
    }
    
    public function showRegistrationForm()
    {
        return view('customer.register');
    }

    public function register(Request $request)
    {
      
        $validator = $this->validate($request, [
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',
        ]);

       

        $customers = Customers::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::guard('customer')->login($customers);
        session()->put('user_id', $customers->id);
        return redirect()->intended(route('customer.dashboard'));
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('account.show');
    }
}
