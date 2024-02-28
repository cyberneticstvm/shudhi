<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\District;
use App\Models\LocalBody;
use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->latest()->get();
        return view('index', compact('products'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function account()
    {
        if (Auth::user()->role == 'Admin') :
            return redirect()->route('admin.dashboard');
        elseif (Auth::user()->role == 'Staff') :
            return redirect()->route('staff.dashboard');
        else :
            return redirect()->route('user.account');
        endif;
    }

    public function admindashboard()
    {
        return view('admin.dashboard');
    }

    public function staffdashboard()
    {
        return view('staff.dashboard');
    }

    public function userdashboard()
    {
        return view('index');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|numeric|digits:10',
            'password' => 'required|min:6',
        ]);
        try {
            $credentials = $request->only('mobile', 'password');
            $credentials['status'] = 1;
            if (Auth::attempt($credentials)) {
                return redirect()->route('account')
                    ->with("success", "User logged in successfully");
            }
            return redirect()->back()->with("error", "Invalid Credentials")->withInput($request->all());
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with("success", "User logged out successfully");
    }

    public function signup(Request $request)
    {
        //
    }

    public function districts()
    {
        $districts = District::all();
        return view('admin.district.index', compact('districts'));
    }

    public function localbodies()
    {
        $lbs = LocalBody::all();
        return view('admin.lb.index', compact('lbs'));
    }
}
